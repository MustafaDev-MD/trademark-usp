<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureFormIsSubmitted

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }
    
        if ($user->role === 'admin') {
            return $next($request);
        }
    
        if (!$user->is_applied && !$request->routeIs('trademark.apply')) {
            return redirect()->route('trademark.apply');
        }
    
        return $next($request);
    }
}