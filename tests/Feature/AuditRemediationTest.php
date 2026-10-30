<?php

use App\Models\TrademarkApplication;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

it('renders every public canonical page with SEO, headings and hardening', function () {
    foreach (array_keys(config('seo')) as $path) {
        $response = $this->get('/'.$path)->assertOk();
        $html = $response->getContent();
        expect($html)->toContain('name="description"', 'rel="canonical"', 'property="og:title"', 'application/ld+json');
        expect(preg_match('/<h1[\s>]/', $html))->toBe(1);
        $response->assertHeader('X-Content-Type-Options', 'nosniff')->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        expect($html)->not->toContain('trademarkengine.com', 'FULL DETAILED PRIVACY POLICY TEXT GOES HERE');
    }
});

it('lists only canonical public pages in valid sitemap XML', function () {
    $response = $this->get('/sitemap.xml')->assertOk();
    $xml = simplexml_load_string($response->getContent());
    expect($xml)->not->toBeFalse();
    expect(count($xml->url))->toBe(count(config('seo')));
    expect($response->getContent())->not->toContain('/login', '/dashboard', '/payment/');
});

it('restores the original package popup and keeps the privacy box separate', function () {
    $this->get('/')->assertOk()->assertSee('Start Your Trademark Application')
        ->assertSee('Get Started Now')->assertSee('Pay Now')
        ->assertSee('data-payment-url="https://collectcheckout.com/', false)
        ->assertDontSee('Continue to application and review pricing')
        ->assertSee('id="privacy-settings"', false);
});

it('saves the selected package only after valid captcha', function () {
    Mail::fake();
    Http::fake(['www.google.com/recaptcha/*' => Http::response(['success' => true, 'score' => 0.9, 'action' => 'modal_form'])]);
    $this->postJson(route('modal.form.submit'), ['customer_full_name' => 'Audit Test', 'customer_email' => 'audit@example.test', 'customer_phone' => '6503840370', 'comment' => 'Brand support', 'selected_plan' => 'premium', 'g-recaptcha-response' => 'test-token'])->assertOk()->assertJson(['success' => true]);
    $this->assertDatabaseHas('leads', ['email' => 'audit@example.test', 'message' => "Selected package: premium\nBrand support"]);
});

function auditWebhook($test, array $changes = [], string $eventId = 'evt_test')
{
    config(['services.stripe.webhook_secret' => 'whsec_audit_test']);
    $object = array_replace_recursive(['id' => 'cs_audit', 'object' => 'checkout.session', 'payment_status' => 'paid', 'mode' => 'payment', 'amount_total' => 34900, 'currency' => 'usd', 'metadata' => ['application_id' => 1, 'user_id' => 1]], $changes);
    $payload = json_encode(['id' => $eventId, 'object' => 'event', 'type' => 'checkout.session.completed', 'data' => ['object' => $object]]);
    $timestamp = time();
    $signature = hash_hmac('sha256', $timestamp.'.'.$payload, 'whsec_audit_test');

    return $test->call('POST', '/api/stripe/webhook', [], [], [], ['CONTENT_TYPE' => 'application/json', 'HTTP_STRIPE_SIGNATURE' => "t=$timestamp,v1=$signature"], $payload);
}

function auditCheckout()
{
    $user = User::factory()->create(['id' => 1]);
    $application = TrademarkApplication::create(['user_id' => $user->id, 'plan' => 'premium', 'total' => 349, 'discount' => 50, 'status' => 'draft', 'payment_status' => 'pending', 'paid_amount' => 0]);
    DB::table('payment_checkouts')->insert(['trademark_application_id' => $application->id, 'session_id' => 'cs_audit', 'amount_cents' => 34900, 'currency' => 'usd', 'created_at' => now(), 'updated_at' => now()]);

    return $application;
}

it('verifies payment amount and applies repeated callbacks exactly once without double discount', function () {
    $application = auditCheckout();
    auditWebhook($this)->assertOk();
    auditWebhook($this, [], 'evt_repeat')->assertOk()->assertJson(['status' => 'already_processed']);
    expect((float) $application->fresh()->paid_amount)->toBe(349.0);
    expect($application->fresh()->payment_status)->toBe('paid');
    expect($application->fresh()->status)->toBe('draft');
});

it('rejects mismatched amounts and defers unpaid checkout events', function () {
    $application = auditCheckout();
    auditWebhook($this, ['amount_total' => 1])->assertStatus(422);
    auditWebhook($this, ['payment_status' => 'unpaid'])->assertOk()->assertJson(['status' => 'pending']);
    expect((float) $application->fresh()->paid_amount)->toBe(0.0);
});

it('requires signature and ownership for payment confirmation', function () {
    config(['services.stripe.webhook_secret' => 'whsec_test']);
    $this->postJson('/api/stripe/webhook', [])->assertStatus(400);
    $application = auditCheckout();
    $this->actingAs(User::factory()->create())->get('/payment/success?session_id=cs_audit')->assertForbidden();
    $this->actingAs($application->user)->get('/payment/success?session_id=cs_audit')->assertOk()->assertSee('Payment confirmation pending');
});

it('preserves a selected package through registration and rejects unknown packages', function () {
    $this->get('/start-application/premium')->assertRedirect(route('register'))->assertSessionHas('selected_package', 'premium');
    $this->get('/start-application/unknown')->assertNotFound();
});

it('rejects failed captcha without saving a lead', function () {
    Http::fake(['www.google.com/recaptcha/*' => Http::response(['success' => false])]);
    $this->postJson(route('modal.form.submit'), ['customer_full_name' => 'Test', 'customer_email' => 'test@example.test', 'customer_phone' => '6503840370', 'comment' => 'Test', 'g-recaptcha-response' => 'bad'])->assertStatus(422);
    $this->assertDatabaseCount('leads', 0);
});

it('renders valid schema JSON without compiled Blade text on public pages', function () {
    foreach (array_keys(config('seo')) as $path) {
        $html = $this->get('/'.$path)->assertOk()->getContent();
        preg_match('~<script type="application/ld\+json">(.*?)</script>~s', $html, $match);
        $schema = json_decode($match[1], true, 512, JSON_THROW_ON_ERROR);
        expect($schema['@context'])->toBe('https://schema.org');
        expect($schema['@type'])->toBe('WebPage');
        expect($match[1])->not->toContain('<?php', '$__contextArgs');
    }
});

it('uses the same business hours and legal name on contact and footer', function () {
    $this->get('/contact')->assertOk()->assertSee(config('business.support_hours'))
        ->assertSee(config('business.legal_name'))->assertDontSee('9AM-6PM CST')->assertDontSee('USP of Trademarks, LLC');
});

it('loads the primary GTM container before consent on public and login pages exactly once', function () {
    foreach (['/', '/contact', '/trademark-registration', '/login', '/register'] as $path) {
        $html = $this->get($path)->assertOk()->getContent();
        expect(substr_count($html, "})(window,document,'script','dataLayer','GTM-TSBJ4J7T');"))->toBe(1);
        expect(substr_count($html, 'ns.html?id=GTM-TSBJ4J7T'))->toBe(1);
        expect(strpos($html, '<!-- Google Tag Manager -->'))->toBeLessThan(strpos($html, '</head>'));
        expect(preg_match('/<body[^>]*>\s*<!-- Google Tag Manager \(noscript\) -->/', $html))->toBe(1);
    }
});
