<?php

namespace App\Http\Controllers;

use App\Mail\LeadMail;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ModalFormController extends Controller
{
    public function index()
    {
        return view('admin.leads.index', ['leads' => Lead::latest()->get()]);
    }

    public function logo(Lead $lead)
    {
        abort_unless($lead->logo_path && Storage::disk('local')->exists($lead->logo_path), 404);

        return Storage::disk('local')->download($lead->logo_path, 'trademark-logo.'.pathinfo($lead->logo_path, PATHINFO_EXTENSION));
    }

    public function submit(Request $request)
    {
        if ($request->filled('website')) {
            return response()->json(['success' => false, 'message' => 'Invalid submission.'], 422);
        }
        $request->merge(['customer_phone' => preg_replace('/[^0-9+]/', '', (string) $request->input('customer_phone', ''))]);
        $types = (array) $request->input('trademark_types', []);
        $validated = $request->validate([
            'customer_full_name' => ['required_without:first_name', 'nullable', 'string', 'max:255'],
            'first_name' => ['required_without:customer_full_name', 'nullable', 'string', 'max:100'],
            'last_name' => ['required_with:first_name', 'nullable', 'string', 'max:100'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'regex:/^\+?[1-9][0-9]{6,14}$/'],
            'comment' => ['nullable', 'string', 'max:2000'],
            'selected_plan' => ['nullable', 'in:basic,standard,premium'],
            'trademark_types' => ['required_with:first_name', 'array', 'min:1', 'max:3'],
            'trademark_types.*' => ['required', 'string', 'distinct', 'in:name,logo,slogan'],
            'trademark_name' => [Rule::excludeIf(! in_array('name', $types, true)), 'required', 'string', 'max:255'],
            'trademark_slogan' => [Rule::excludeIf(! in_array('slogan', $types, true)), 'required', 'string', 'max:500'],
            'logo' => [Rule::excludeIf(! in_array('logo', $types, true)), 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'extensions:jpg,jpeg,png,webp', 'max:5120'],
            'g-recaptcha-response' => ['required', 'string'],
        ]);
        try {
            $verify = Http::asForm()->timeout(10)->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('captcha.secret'), 'response' => $validated['g-recaptcha-response'], 'remoteip' => $request->ip(),
            ]);
        } catch (\Illuminate\Http\Client\ConnectionException $exception) {
            return response()->json(['success' => false, 'message' => 'Verification is unavailable. Please try again.'], 503);
        }
        $captcha = $verify->json();
        if (! $verify->successful() || ! ($captcha['success'] ?? false) || ($captcha['score'] ?? 0) < 0.5 || ($captcha['action'] ?? '') !== 'modal_form') {
            return response()->json(['success' => false, 'message' => 'Please verify you are not a robot and try again.'], 422);
        }
        if (Lead::where('email', $validated['customer_email'])->where('created_at', '>', now()->subMinutes(5))->exists()) {
            return response()->json(['success' => false, 'message' => 'You already submitted recently. Please wait a few minutes.'], 429);
        }
        $logoPath = isset($validated['logo']) ? $validated['logo']->store('lead-logos', 'local') : null;
        if (isset($validated['logo']) && ! $logoPath) {
            return response()->json(['success' => false, 'message' => 'Unable to upload your logo. Please try again.'], 503);
        }
        try {
            $lead = DB::transaction(fn () => Lead::create([
                'name' => isset($validated['first_name']) ? trim($validated['first_name'].' '.$validated['last_name']) : $validated['customer_full_name'],
                'first_name' => $validated['first_name'] ?? null, 'last_name' => $validated['last_name'] ?? null,
                'email' => $validated['customer_email'], 'phone' => $validated['customer_phone'],
                'message' => (! empty($validated['selected_plan']) ? 'Selected package: '.$validated['selected_plan']."\n" : '').($validated['comment'] ?? ''),
                'selected_plan' => $validated['selected_plan'] ?? null, 'trademark_types' => $validated['trademark_types'] ?? [],
                'trademark_name' => $validated['trademark_name'] ?? null, 'trademark_slogan' => $validated['trademark_slogan'] ?? null, 'logo_path' => $logoPath,
            ]));
        } catch (\Throwable $exception) {
            if ($logoPath) {
                Storage::disk('local')->delete($logoPath);
            }
            throw $exception;
        }
        try {
            Mail::to(config('mail.from.address'))->send(new LeadMail($lead));
        } catch (\Throwable $exception) {
            report($exception);
        }

        return response()->json(['success' => true, 'redirect' => route('thank-you')]);
    }
}
