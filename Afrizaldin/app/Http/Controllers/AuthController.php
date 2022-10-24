<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login()
    {
        return view('login');
    }

    public function register(){

        return view('register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
       
        public function logout(Request $request){
        Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect()->route('login');
    }
    
}
