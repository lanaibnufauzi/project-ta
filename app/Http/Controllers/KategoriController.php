<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakategori = Kategori::all();
        return view('admin.pages.kategori', compact('datakategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama tidak boleh kosong',
        ]);

        Kategori::create($request->all());

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan');
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
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
        ]);

        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect('/kategori')->with('error', 'Kategori tidak ditemukan');
        }

        $kategori->nama_kategori = $request->nama;

        if ($kategori->save()) {
            dd('Kategori berhasil diperbarui');
        } else {
            dd('Gagal menyimpan kategori');
        }
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
        Kategori::find($id)->delete();

        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
