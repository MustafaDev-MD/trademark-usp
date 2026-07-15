<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Auth\Events\Verified;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\RedirectResponse;

// class VerifyEmailController-old extends Controller
// {
//     /**
//      * Mark the authenticated user's email address as verified.
//      */
//     public function __invoke(EmailVerificationRequest $request): RedirectResponse
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//         // Agar user pehle se verified hai
//         return redirect()->intended(route('trademark.apply').'?verified=1');
//     }

//     if ($request->user()->markEmailAsVerified()) {
//         event(new Verified($request->user()));
//     }

//     // Naye verified user ko trademark apply wale step form par bhejein
//     // return redirect()->intended(route('trademark.apply').'?verified=1');
//     return redirect()->route('trademark.apply', ['verified' => 1]);
//     }
// }


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailCodeController extends Controller
{
    /**
     * Verify submitted email code (OTP)
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'User not found.']);
        }

        // OTP valid and not expired
        if (
            $user->email_verification_code === $request->code &&
            $user->email_verification_expires_at &&
            now()->lessThan($user->email_verification_expires_at)
        ) {
            $user->email_verified_at = now();
            $user->email_verification_code = null;
            $user->email_verification_expires_at = null;
            $user->save();

            return redirect()->route('trademark.apply', ['verified' => 1])
                             ->with('success', 'Email verified successfully!');
        }

        return back()->withErrors(['code' => 'Invalid or expired verification code.']);
    }
    
    public function resend()
    {
        $user = auth()->user(); // currently logged in user
        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'User not found.']);
        }
    
        // Generate 6-digit OTP
        $otp = rand(100000, 999999);
        $user->email_verification_code = $otp;
        $user->email_verification_expires_at = now()->addMinutes(10); // OTP 10 min valid
        $user->save();
    
        // Send OTP email
        \Mail::to($user->email)->send(new \App\Mail\SendOtpMail($user));
    
        return back()->with('success', 'OTP has been resent to your email.');
    }

}