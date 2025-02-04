<?php

namespace App\Http\Middleware;

use App\Exceptions\AuthException\TokenExpired;
use App\Exceptions\AuthException\TokenNotFound;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('auth');
        if(!$token){
            throw new TokenNotFound;
        }
        $validateToken = PersonalAccessToken::findToken($token);
        if(!$validateToken){
            throw new TokenExpired;
        }
        return $next($request);
    }
}
