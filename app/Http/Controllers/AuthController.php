<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(Request $request) {
        $request->validate([
            'nip'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nip', 'password');


        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/dashboard'); // Ganti dengan rute yang sesuai
        }

        return back()->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }
}
