<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureFormIsSubmitted
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Guest users
        if (! $user) {
            return $next($request);
        }

        // Admin users
        if ($user->role === 'admin') {
            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Routes that must always be accessible
        |--------------------------------------------------------------------------
        |
        | These routes should NOT require is_applied = true.
        |
        */

        if (
            $request->routeIs([
                'profile.edit',
                'profile.update',
                'profile.destroy',

                'verification.notice',
                'verification.verify',
                'verification.send',

                'verify.code',
                'verify.code.submit',
                'resend.otp',

                'logout',
                'password.confirm',
                'password.update',
                'password.request',
                'password.email',
                'password.reset',

                'trademark.apply',
            ])
        ) {
            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Require application submission
        |--------------------------------------------------------------------------
        */

        if (! $user->is_applied) {
            return redirect()->route('trademark.apply');
        }

        return $next($request);
    }
}
