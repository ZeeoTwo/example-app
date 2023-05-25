<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    //

    public function login(ApiLoginRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if (empty($user) || Hash::check($request->input('password'), $user->password) == false) {
            return response()->json([
                'message' => 'Podany login lub hasło nie są prawidłowe.'
            ], 422);
        }
        $token = $user->createToken('auth-token');
        return response()->json([
            'message' => 'OK',
            'token' => $token->plainTextToken
        ]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        if (empty($user) === false) {
            $user->tokens()->delete();
        }
        return response()->json([
            'message' => 'Pomyślnie wylogowano z systemu.',
        ]);
    }
}
