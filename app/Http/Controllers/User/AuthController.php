<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\kategori;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function indexLogin()
    {
        $kategori = kategori::all();
        return view(
            'landing.auth.login',
            [
                'kategori' => $kategori
            ]
        );
    }

    public function indexRegister()
    {
        $kategori = kategori::all();
        return view('landing.auth.register', [
            'kategori' => $kategori
        ]);
    }

    public function postLogin(Request $request)
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

        if (auth()->attempt($credentials)) {
            return redirect('/')->with('login', 'Selamat datang di dashboard');
        } else {
            return redirect('/user/login')->with('logingagal', 'Email atau password salah');
        }
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'no_handphone' => 'required',
            'alamat' => 'required',
            'password' => 'required',
            'repassword' => 'required|same:password'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_handphone.required' => 'No handphone tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Konfirmasi password tidak boleh kosong',
            'repassword.same' => 'Konfirmasi password tidak sama dengan password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_handphone = $request->no_handphone;
        $user->alamat = $request->alamat;
        $user->password = bcrypt($request->password);
        $user->id_role = '2';
        $user->save();

        $new = new Anggota();
        $new->users_id = $user->id;
        $new->save();

        return redirect('/user/register')->with('register', 'Registrasi berhasil, silahkan login');
    }

    public function updateprofil(Request $request)
    {
        if ($request->password != null) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                'no_handphone' => 'required',
                'alamat' => 'required',
                'password' => 'required',
                'repassword' => 'required|same:password'
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'no_handphone.required' => 'No handphone tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'repassword.required' => 'Konfirmasi password tidak boleh kosong',
                'repassword.same' => 'Konfirmasi password tidak sama dengan password'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                'no_handphone' => 'required',
                'alamat' => 'required',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'no_handphone.required' => 'No handphone tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
            ]);
        }

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_handphone = $request->no_handphone;
        $user->alamat = $request->alamat;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('/user/account#account-detail')->with('updateprofil', 'Profil berhasil diupdate');
    }

    public function userLogout()
    {
        auth()->logout();
        return redirect('/')->with('logout', 'Anda telah logout');
    }
}
