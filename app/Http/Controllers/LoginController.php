<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        
        $iv = '1234567890123456';
        $key = '1234567890123456';

        $email_encypt = openssl_encrypt($request->email, 'AES-128-CBC', $key, 0, $iv);

        $credentials = [
            'email' => $email_encypt,
            'password' => $request->password
        ];


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('login', 'Login Berhasil');
        }


        return redirect('login')->with('error', 'Login Gagal, Silahkan cek email dan password anda');
    }
}
