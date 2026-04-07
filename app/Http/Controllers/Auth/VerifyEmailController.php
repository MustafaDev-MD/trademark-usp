<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;

class VerifyEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'User not found.']);
        }

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
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'User not found.']);
        }

        $otp = rand(100000, 999999);
        $user->email_verification_code = $otp;
        $user->email_verification_expires_at = now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new SendOtpMail($user));

        return back()->with('success', 'OTP has been resent to your email.');
    }
    
    // public function verify(Request $request)
    // {
    //     $request->validate([
    //         'code' => 'required|digits:6',
    //     ]);
    
    //     $user = Auth::user();
    
    //     if (!$user) {
    //         return redirect()->route('login')->withErrors(['email' => 'User not found.']);
    //     }
    
    //     if (
    //         $user->email_verification_code === $request->code &&
    //         $user->email_verification_expires_at &&
    //         now()->lessThan($user->email_verification_expires_at)
    //     ) {
    //         $user->email_verified_at = now();
    //         $user->email_verification_code = null;
    //         $user->email_verification_expires_at = null;
    //         $user->save();
    
    //         return redirect()->route('trademark.apply', ['verified' => 1])
    //                          ->with('success', 'Email verified successfully!');
    //     }
    
    //     return back()->withErrors(['code' => 'Invalid or expired verification code.']);
    // }
}
