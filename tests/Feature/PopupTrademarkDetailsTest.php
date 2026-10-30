<?php

use App\Mail\LeadMail;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

function popupDetails(array $changes = []): array
{
    return array_replace(['first_name' => 'Jane', 'last_name' => 'Smith', 'customer_email' => 'jane@example.test', 'customer_phone' => '+14155552671', 'trademark_types' => ['name', 'slogan'], 'trademark_name' => 'Sample Brand', 'trademark_slogan' => 'Made for testing', 'selected_plan' => 'premium', 'g-recaptcha-response' => 'test-token'], $changes);
}

beforeEach(function () {
    Mail::fake();
    Storage::fake('local');
    Http::fake(fn () => Http::response(['success' => ! config('testing.captcha_reject', false), 'score' => 0.9, 'action' => 'modal_form']));
});

it('saves multiple trademark selections and sends their details in the lead email', function () {
    $this->postJson(route('modal.form.submit'), popupDetails())->assertOk()->assertJson(['success' => true]);
    $lead = Lead::firstOrFail();
    expect($lead->name)->toBe('Jane Smith')->and($lead->trademark_types)->toBe(['name', 'slogan'])
        ->and($lead->trademark_name)->toBe('Sample Brand')->and($lead->trademark_slogan)->toBe('Made for testing')->and($lead->phone)->toBe('+14155552671');
    Mail::assertSent(LeadMail::class, fn ($mail) => str_contains($mail->render(), 'Sample Brand') && str_contains($mail->render(), 'Made for testing') && str_contains($mail->envelope()->subject, 'Premium'));
});

it('requires at least one type and only the fields for selected types', function () {
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => []]))->assertUnprocessable()->assertJsonValidationErrors('trademark_types');
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_name' => null, 'trademark_slogan' => null]))->assertUnprocessable()->assertJsonValidationErrors(['trademark_name', 'trademark_slogan']);
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['name'], 'trademark_slogan' => 'Ignore this']))->assertOk();
    expect(Lead::first()->trademark_slogan)->toBeNull();
});

it('requires a valid bounded image for logo selection', function () {
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['logo']]))->assertUnprocessable()->assertJsonValidationErrors('logo');
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['logo'], 'logo' => UploadedFile::fake()->create('logo.svg', 1, 'image/svg+xml')]))->assertUnprocessable()->assertJsonValidationErrors('logo');
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['logo'], 'logo' => UploadedFile::fake()->image('large.png')->size(5121)]))->assertUnprocessable()->assertJsonValidationErrors('logo');
    $this->assertDatabaseCount('leads', 0);
    Mail::assertNothingSent();
});

it('stores logos privately and attaches them to the email', function () {
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['name', 'logo', 'slogan'], 'logo' => UploadedFile::fake()->image('brand.png')]))->assertOk();
    $lead = Lead::firstOrFail();
    Storage::disk('local')->assertExists($lead->logo_path);
    Mail::assertSent(LeadMail::class, function ($mail) use ($lead) {
        $mail->render();

        return count($mail->attachments()) === 1 && $mail->hasAttachedData(Storage::disk('local')->get($lead->logo_path), 'trademark-logo.png', ['mime' => 'image/png']);
    });
    $this->get(route('admin.leads.logo', $lead))->assertRedirect(route('login'));
    $this->actingAs(User::factory()->create())->get(route('admin.leads.logo', $lead))->assertRedirect()->assertSessionHas('error');
    $this->actingAs(User::factory()->create(['role' => 'admin']))->get(route('admin.leads.logo', $lead))->assertDownload('trademark-logo.png');
});

it('rejects invalid types, duplicate types, bad phones and failed verification', function () {
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['other']]))->assertUnprocessable();
    $this->postJson(route('modal.form.submit'), popupDetails(['trademark_types' => ['name', 'name']]))->assertUnprocessable();
    $this->postJson(route('modal.form.submit'), popupDetails(['customer_phone' => '123']))->assertUnprocessable();
    config(['testing.captcha_reject' => true]);
    $this->postJson(route('modal.form.submit'), popupDetails())->assertUnprocessable();
    $this->assertDatabaseCount('leads', 0);
});

it('renders the new popup for visitors with its original package checkout links', function () {
    $this->get('/')->assertOk()->assertSee('name="first_name"', false)->assertSee('name="last_name"', false)
        ->assertSee('name="trademark_types[]"', false)->assertSee('name="logo"', false)
        ->assertSee('data-plan="premium"', false)->assertSee('collectcheckout.com')
        ->assertSee('enctype="multipart/form-data"', false);
});
