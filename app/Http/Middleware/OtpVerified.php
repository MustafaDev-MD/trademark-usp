<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class OtpVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //  $user = Auth::user();

        // // If user is logged in but not verified
        // if ($user && !$user->hasVerifiedEmail()) {
        //     // Allow these routes without redirect
        //     $allowedRoutes = [
        //         'verify.code',
        //         'verify.code.submit',
        //         'resend.otp',
        //         'logout', // optional if you have logout route
        //     ];

        //     if (!in_array($request->route()->getName(), $allowedRoutes)) {
        //         return redirect()->route('verify.code');
        //     }
        // }

        // return $next($request);
        
        // $user = Auth::user();

        // // If user is logged in AND not verified
        // if ($user && !$user->hasVerifiedEmail()) {

        //     // Only redirect for protected routes
        //     $protectedRoutes = [
        //         'dashboard',
        //         'trademark.apply',
        //         // add more routes here that need email verification
        //     ];

        //     if (in_array($request->route()->getName(), $protectedRoutes)) {
        //         return redirect()->route('verify.code');
        //     }
        // }

        // return $next($request);
        
        // $user = Auth::user();

        // if (!$user || !$user->hasVerifiedEmail()) {
        //     return redirect()->route('verify.code');
        // }

        // return $next($request);
        
        $user = Auth::user();

    // If no user, allow
    if (!$user) return $next($request);

    // If user is not verified and route is not allowed, redirect to OTP
    $allowedRoutes = [
        'login', 'register', 'verify.code', 'verify.code.submit', 'resend.otp', 'logout'
    ];

    if (!$user->hasVerifiedEmail() && !in_array($request->route()->getName(), $allowedRoutes)) {
        return redirect()->route('verify.code');
    }

    return $next($request);
    }
}
