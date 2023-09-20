<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmail
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->email_verified_at) {
            return $next($request);

        }
        return response()->json([
            'status' => false,
            'errors' => ['Email not verified']
        ], 403);

    }
}
