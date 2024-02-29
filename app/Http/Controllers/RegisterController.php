<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datauser = User::where('id_role', '2')->get();
        return view('auth.register', compact('datauser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|email|unique:users,email',
        //     'password' => 'required|string|min:8',
        // ], [
        //     'name.required' => 'Nama tidak boleh kosong',
        //     'name.string' => 'Nama harus berupa huruf',
        //     'email.required' => 'Email tidak boleh kosong',
        //     'email.unique' => 'Email telah terdaftar',
        //     'email.email' => 'Email harus berupa alamat email yang valid',
        //     'password.required' => 'Password tidak boleh kosong',
        //     'password.string' => 'Password harus berupa teks',
        //     'password.min' => 'Password harus memiliki setidaknya 8 karakter',
        // ]);


            // $request->validate([
            //     'password' => [
            //         'required',
            //         'string',
            //         'min:8',
            //         'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]+$/',
            //     ],
            // ], [
            //     'password.required' => 'Password tidak boleh kosong',
            //     'password.string' => 'Password harus berupa teks',
            //     'password.min' => 'Password harus memiliki setidaknya 8 karakter',
            //     'password.regex' => 'Password harus terdiri dari 8 karakter, 1 huruf besar, dan 1 huruf kecil',
            // ]);



        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_handpone' => $request->no_handpone,
            'id_role' => 2,
        ]);

        return redirect('/login')->with(['status' => 'success', 'message' => 'Pendaftaran berhasil']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
