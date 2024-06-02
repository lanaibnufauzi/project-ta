<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\kategori;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
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
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&])[A-Za-z\d#@$!%*?&]{8,}$/',
            ],
            'repassword' => 'required|same:password'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_handphone.required' => 'No handphone tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol',
            'repassword.required' => 'Konfirmasi password tidak boleh kosong',
            'repassword.same' => 'Konfirmasi password tidak sama dengan password'
        ]);

        // email harus @gmail.com
        $email = $request->email;
        $email_explode = explode('@', $email);
        if ($email_explode[1] != 'gmail.com') {
            return redirect('/user/register')->with('harusgmail', 'Email harus menggunakan @gmail.com');
        }


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

    public function linkresetpassword()
    {
        $kategori = kategori::all();
        return view('landing.auth.forgot-password', [
            'kategori' => $kategori

        ]);
    }

    public function changepassword($code)
    {
        $kategori = kategori::all();
        $user = User::where('code', $code)->where('status_code', 'aktif')->where('id_role', '2')->first();
        if ($user) {
            return view('landing.auth.change-password', [
                'user' => $user,
                'kategori' => $kategori
            ]);
        } else {
            return redirect('/')->with('linkkadaluarsa', 'Reset Password Gagal');
        }
    }

    public function changepasswordpost(Request $request)
    {
        $user = User::where('code', $request->code)->where('status_code', 'aktif')->where('id_role', '2')->first();
        $request->validate([
            'password' => 'required',
            'repassword' => 'required|same:password',
        ], [
            'password.required' => 'Password tidak boleh kosong',
            'repassword.required' => 'Re-Password tidak boleh kosong',
            'repassword.same' => 'Re-Password tidak sama dengan Password',
        ]);

        $user->password = bcrypt($request->password);
        $user->code = null;
        $user->status_code = "tidak_aktif";
        $user->save();

        return redirect('/')->with('resetpasswordberhasil', 'Reset Password Berhasil');
    }

    public function sendlinkresetpassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ], [
            'email.required' => 'Email tidak boleh kosong',
        ]);

        $user = User::where('email', $request->email)->where('id_role', '2')->first();

        if ($user) {
            try {
                $mail = new PHPMailer(true);

                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.semnasjkgsby.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'admin@semnasjkgsby.com';                     //SMTP username
                $mail->Password   = '%CQw$!a@@#%U';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('admin@semnasjkgsby.com', 'Admin KPA');
                $mail->addAddress($request->email);     //Add a recipient

                $Code = substr((str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")), 0, 10);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Password Reset';
                $mail->Body    = 'To reset your password, please click the link below:<br><br><a href="http://127.0.0.1:8000/user/reset-password/' . $Code . '">Reset Password</a>';
                $updatecode = User::where('email', '=', $request->email)->first();
                $updatecode->code = $Code;
                $updatecode->status_code = 'aktif';
                $updatecode->save();

                $mail->send();

                return redirect('/user/reset-password')->with('linkresetpassword', 'Link reset password telah dikirim ke email');
            } catch (Exception $e) {
            }
        } else {
            return redirect()->back()->with('emailtidakditemukan', 'Email tidak ditemukan');
        }
    }
}
