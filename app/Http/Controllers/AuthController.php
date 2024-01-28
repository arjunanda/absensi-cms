<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'nip'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nip', 'password');

        // dd(Auth::attempt($credentials));


        if (Auth::attempt($credentials)) {
            // Login berhasil
            // dd(Auth::user()->role);

            if (Auth::user()->role_id == 3) {

                return redirect()->intended('/dashboard-owner'); // Ganti dengan rute yang sesuai
            }

            return redirect()->intended('/dashboard'); // Ganti dengan rute yang sesuai
        }

        return back()->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }

    public function login_karyawan(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nip'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            if (Auth::user()->hasRoleName('karyawan')) {

                return redirect()->intended('/'); // Ganti dengan rute yang sesuai
            }
        }

        return back()->withErrors([
            'login' => 'These credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth'); // Ganti dengan URL tujuan setelah logout
    }
}
