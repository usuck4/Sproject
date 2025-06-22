<?php
namespace App\Http\Middleware;

use Closure;

class EnsurePhoneIsVerified
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->phone_verified_at) {
            return response()->json(['message' => 'Phone not verified'], 403);
        }
        
        return $next($request);
    }
}