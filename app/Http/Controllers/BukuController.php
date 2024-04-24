<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $databuku = Buku::with('kategori')->get();
        return view('admin.pages.buku', [
            'databuku' => $databuku,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)

    public function create(Request $request, $id = null)
{
    //  dd($request->all());

    $request->validate([
        'isbn' => 'required',
        'judul_buku' => 'required',
        'deskripsi' => 'required',
        'tema' => 'required',
        'penerbit' => 'required',
        'tgl_terbit' => 'required',
        'status' => 'required',
        'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],[
        'isbn.required' => 'ISBN tidak boleh kosong',
        'judul_buku.required' => 'Judul Buku tidak boleh kosong',
        'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        'tema.required' => 'Tema tidak boleh kosong',
        'penerbit.required' => 'Penerbit tidak boleh kosong',
        'tgl_terbit.required' => 'Tanggal Terbit tidak boleh kosong',
        'status.required' => 'Status tidak boleh kosong',
        'cover_buku.image' => 'Cover Buku harus berupa gambar',
        'cover_buku.mimes' => 'Cover Buku harus berupa gambar',
        'cover_buku.max' => 'Cover Buku maksimal 2MB',
    ]);

    if ($id) {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect('/buku')->with('error', 'Buku tidak ditemukan');
        }
    } else {

        $buku = new Buku();
    }

    $buku->isbn = $request->isbn;
    $buku->judul_buku = $request->judul_buku;
    $buku->deskripsi = $request->deskripsi;
    $buku->tema = $request->tema;
    $buku->penerbit = $request->penerbit;
    $buku->tgl_terbit = $request->tgl_terbit;
    $buku->status = $request->status;
    $buku->kategori_id = $request->kategori_id;

    if ($request->hasFile('cover_buku')) {
        $coverFile = $request->file('cover_buku');
        $coverFileName = time() . '_' . $coverFile->getClientOriginalName();
        $coverFile->storeAs('public/cover', $coverFileName);


        $buku->cover_buku = $coverFileName;
    }

    $buku->save();

    // $redirectPath = $id ? '/buku' : '/buku-create';
    $redirectMessage = $id ? 'Buku berhasil diperbarui' : 'Buku berhasil ditambahkan';

    return redirect('buku')->with('store', $redirectMessage);
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
            'isbn' => 'required',
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'tema' => 'required',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
            'status' => 'required',
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'isbn.required' => 'ISBN tidak boleh kosong',
            'judul_buku.required' => 'Judul Buku tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'tema.required' => 'Tema tidak boleh kosong',
            'penerbit.required' => 'Penerbit tidak boleh kosong',
            'tgl_terbit.required' => 'Tanggal Terbit tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'cover_buku.image' => 'Cover Buku harus berupa gambar',
            'cover_buku.mimes' => 'Cover Buku harus berupa gambar',
            'cover_buku.max' => 'Cover Buku maksimal 2MB',

        ]);

        $buku = Buku::find($id);

        if (!$buku) {
            return redirect('/buku')->with('error', 'Buku tidak ditemukan');
        }

        $buku->isbn = $request->isbn;
        $buku->judul_buku = $request->judul_buku;
        $buku->deskripsi = $request->deskripsi;
        $buku->tema = $request->tema;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->status = $request->status;
        $buku->kategori_id = $request->kategori_id;


        if ($request->hasFile('cover_buku')) {
            $coverFile = $request->file('cover_buku');
            $coverFileName = time() . '_' . $coverFile->getClientOriginalName();
            $coverFile->storeAs('public/cover', $coverFileName);


            // if ($buku->cover_buku) {
            //     Storage::delete('public/cover/' . $buku->cover_buku);
            // }


            $buku->cover_buku = $coverFileName;
        }


        $buku->save();

        return redirect('/buku')->with('update', 'Buku berhasil diperbarui');

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
        $buku = Buku::find($id);

        if ($buku) {
            $buku->delete();
            return redirect('/buku')->with('destroy', 'Buku berhasil dihapus');
        } else {
            return redirect('/buku')->with('error', 'Buku tidak ditemukan');
        }
    }

}
