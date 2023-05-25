<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.form');
    }
    
    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'login' => 'required|email',
                'password' => 'required|string'
            ]
        );
        
        if ( Auth::attempt( ['email' => $data['login'], 'password' => $data['password'] ])){
            $request->session()->regenerate();
            return redirect()->intended('posts');
        }

        return back()->withErrors([
            'login' => 'Login lub hasło nie są poprawne'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('sucess', "Pomyślnie wylogowano");
    }
}
