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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email_verified_at == null) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'verifikasi');
                return redirect('login');
            }

            if (Auth::user()->id_role == 1) {
                $request->session()->regenerate();
                Session::flash('status', 'success');
                session()->flash('success', 'Login Sukses');
                return redirect()->intended('/dashboard');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Akun tidak ditemukan');
        return redirect('login')->withInput();
    }

    public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('login');
        }

}
    // public function logout(Request $request)
    // {
    //     Login::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('login');
    // }

