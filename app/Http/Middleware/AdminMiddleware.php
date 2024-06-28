<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken || $accessToken->tokenable_type !== 'App\Models\Admin') {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
