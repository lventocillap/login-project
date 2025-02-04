<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException\CredentialInvalid;
use App\Exceptions\AuthException\UserNotFound;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            throw new UserNotFound;
        }
        if (!Hash::check($request->password, $user->password)) {
            throw new CredentialInvalid;
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        $cookie = Cookie::make('auth', $token, 10);
        return response()->json(['Authenticable'])->withCookie($cookie);
    }
    public function logout(Request $request):JsonResponse
    {
        $token = $request->cookie('auth');
        PersonalAccessToken::findToken($token)->delete();
        return new JsonResponse(['logout']);
    }
    public function prueba():JsonResponse
    {
        return new JsonResponse(['message' => 'success']);
    }
}
