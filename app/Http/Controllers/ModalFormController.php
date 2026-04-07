<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Mail\LeadMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Client\Response;
use Illuminate\Validation\ValidationException;

class ModalFormController extends Controller
{

    public function index()
    {
        // $leads = Lead::latest()->paginate(20);
        $leads = Lead::latest()->get();
        return view('admin.leads.index', compact('leads'));
    }

    // public function submit(Request $request)
    // {
    //     \Log::info('MODAL FORM HIT', $request->all());
    //     try {
    //         $validated = $request->validate([
    //             'customer_full_name' => 'required|string|max:255',
    //             'customer_email' => 'required|email|max:255',
    //             'customer_phone' => ['required', 'regex:/^\+?[0-9\s\-]{10,20}$/'],
    //             'comment' => 'nullable|string|max:1000',
    //         ]);
    //     } catch (ValidationException $e) {
    //         if ($request->ajax()) {
    //             return response()->json([
    //                 'errors' => $e->errors()
    //             ], 422);
    //         }
    //         throw $e;
    //     }

    //     $lead = Lead::create([
    //         'name' => $validated['customer_full_name'],
    //         'email' => $validated['customer_email'],
    //         'phone' => $validated['customer_phone'],
    //         'message' => $validated['comment'] ?? null,
    //     ]);

    //     Mail::to(config('mail.from.address'))->send(new LeadMail($lead));

    //     if ($request->ajax()) {
    //         return response()->json(['success' => true]);
    //     }

    //     return redirect()->route('thank-you')
    //         ->with('success', 'Thank you! We will contact you shortly.');
    // }


    // public function submit(Request $request)
    // {
    //     // \Log::info('MODAL FORM HIT', $request->all());


    //     try {
    //         $validated = $request->validate([
    //             'customer_full_name' => 'required|string|max:255',
    //             'customer_email' => 'required|email|max:255',
    //             'customer_phone' => [
    //                 'required',
    //                 'regex:/^\+?[0-9\s\-]{10,15}$/'
    //             ],
    //             'comment' => 'nullable|string|max:1000',
    //         ], [
    //             'customer_phone.regex' => 'Phone must be 10–15 digits and numbers only',
    //         ]);
    //     } catch (ValidationException $e) {
    //         if ($request->ajax()) {
    //             return response()->json([
    //                 'errors' => $e->errors()
    //             ], 422);
    //         }
    //         throw $e;
    //     }

    //     // Save to database
    //     $lead = Lead::create([
    //         'name' => $validated['customer_full_name'],
    //         'email' => $validated['customer_email'],
    //         'phone' => $validated['customer_phone'],
    //         'message' => $validated['comment'] ?? null,
    //     ]);

    //     // Send email
    //     Mail::to(config('mail.from.address'))->send(new LeadMail($lead));

    //     if ($request->ajax()) {
    //         return response()->json(['success' => true]);
    //     }

    //     return redirect()->route('thank-you')
    //         ->with('success', 'Thank you! We will contact you shortly.');
    // }


    public function submit(Request $request)
    {
        // HONEYPOT
        if ($request->filled('website')) {
            return response()->json(['success' => false, 'message' => 'Invalid submission.'], 422);
        }

        // TIME TRAP
        if ($request->has('form_time') && time() - $request->form_time < 3) {
            return response()->json(['success' => false, 'message' => 'Too fast. Please try again.'], 422);
        }
        
        $phone = preg_replace('/\D/', '', $request->customer_phone);
        $request->merge(['customer_phone' => $phone]);

        try {

            // VALIDATION
            $validated = $request->validate([
                'customer_full_name' => 'required|string|max:255',
                'customer_email' => 'required|email|max:255',
                'customer_phone' => ['required', 'regex:/^[0-9]{10}$/'],
                'comment' => 'required|string|max:1000',
                'g-recaptcha-response' => 'required',
            ], [
                'customer_phone.regex' => 'Phone must be 10–15 digits and numbers only',
                'g-recaptcha-response.required' => 'Please verify you are not a robot',
            ]);
        } catch (ValidationException $e) {

            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        }



        // RECAPTCHA
        $verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('NOCAPTCHA_SECRET'),
            'response' => $validated['g-recaptcha-response'],
            'remoteip' => $request->ip(),
        ]);

        /** @var Response $verify */

        $captcha = $verify->json();
        if (!($captcha['success'] ?? false) || ($captcha['score'] ?? 0) < 0.5) {
            return response()->json(['success' => false, 'message' => 'reCAPTCHA verification failed. Are you a robot?'], 422);
        }

        // DUPLICATE CHECK
        $recentLead = Lead::where('email', $validated['customer_email'])
            ->where('created_at', '>', now()->subMinutes(5))
            ->exists();

        if ($recentLead) {
            return response()->json(['success' => false, 'message' => 'You already submitted recently. Please wait a few minutes.'], 429);
        }

        // SAVE LEADphoneInput.value = phoneI
        $lead = Lead::create([
            'name' => $validated['customer_full_name'],
            'email' => $validated['customer_email'],
            'phone' => $validated['customer_phone'],
            'message' => $validated['comment'] ?? null,
        ]);

        Mail::to(config('mail.from.address'))->send(new LeadMail($lead));

        // ✅ Successful submission: redirect with success message
        // return response()->json([
        //     'success' => true,
        //     'redirect' => route('thank-you'),
        //     'message' => 'Thank you! We will contact you shortly.'
        // ]);
        return response()->json([
            'success' => true,
            'redirect' => route('thank-you')
        ]);
    }
}
