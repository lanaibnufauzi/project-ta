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
    public function create(request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama tidak boleh kosong',
        ]);

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();


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
    $request->validate([
        'nama_kategori' => 'required',
    ], [
        'nama_kategori.required' => 'Nama tidak boleh kosong',
    ]);

    $kategori = Kategori::find($id); // Menemukan kategori berdasarkan ID yang diberikan

    if (!$kategori) {
        return redirect('/kategori')->with('error', 'Kategori tidak ditemukan');
    }

    $kategori->nama_kategori = $request->nama_kategori; // Memperbarui nama kategori

    $kategori->save(); // Menyimpan perubahan

    return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui');
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
