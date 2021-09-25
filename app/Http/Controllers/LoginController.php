<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function validateUser()
    {
        $credenciales = request()->validate([
             'email' => 'required|email|string',
             'password' => 'required|string'
        ]);
        
        $remember = request()->filled('remember');

        if (Auth::attempt($credenciales, $remember)) {
            request()->session()->regenerate();
            return redirect('/');
        }

        throw ValidationException::withMessages(['error_validacion' => __('auth.failed')]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
