<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataanggota = Anggota::all();
        return view('admin.pages.pengguna',[
            'dataanggota' => $dataanggota,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create(Request $request)
        {
            $request->validate([
                'name' => 'required|string',
                'status' => 'required',
                'alamat' => 'required',
                'telpon' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
            ], [
                'name.required' => 'Nama tidak boleh kosong',
                'name.string' => 'Nama harus berupa huruf',
                'status.required' => 'Status tidak boleh kosong',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'telpon.required' => 'Nomor telepon tidak boleh kosong',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            ]);
                Anggota::create([
                    'name' => $request->name,
                    'status' => $request->status,
                    'alamat' => $request->alamat,
                    'telpon' => $request->telpon,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                ]);

            return redirect('/pengguna')->with('success', 'Pengguna berhasil ditambahkan');
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
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $anggota = Anggota::find($id);
        $anggota->name = $request->name;
        $anggota->status = $request->status;
        $anggota->alamat = $request->alamat;
        $anggota->telpon = $request->telpon;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->save();

        return redirect('/pengguna')->with('success', 'Pengguna berhasil diperbarui');
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
        {
            Anggota::find($id)->delete();

            return redirect('/pengguna')->with('success', 'Pengguna berhasil dihapus');
        }
    }
}
