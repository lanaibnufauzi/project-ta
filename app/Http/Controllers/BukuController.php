<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPinjaman;
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
        $databuku = Buku::with('kategori')->orderBy('id', 'desc')->get();
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

    public function create(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'isbn' => 'required',
            'judul_buku' => 'required',
            'jumlah_halaman' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'tema' => 'required',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
            'cover_buku' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'isbn.required' => 'ISBN tidak boleh kosong',
            'judul_buku.required' => 'Judul Buku tidak boleh kosong',
            'jumlah_halaman.required' => 'Jumlah Halaman tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'tema.required' => 'Tema tidak boleh kosong',
            'penerbit.required' => 'Penerbit tidak boleh kosong',
            'tgl_terbit.required' => 'Tanggal Terbit tidak boleh kosong',
            'cover_buku.image' => 'Cover Buku harus berupa gambar',
            'cover_buku.mimes' => 'Cover Buku harus berupa gambar',
        ]);

        $buku = new Buku();
        $buku->isbn = $request->isbn;
        $buku->judul_buku = $request->judul_buku;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok = $request->stok;
        $buku->deskripsi = $request->deskripsi;
        $buku->tema = $request->tema;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->kategori_id = $request->kategori_id;

        if ($request->hasFile('cover_buku')) {
            $coverFile = $request->file('cover_buku');
            $coverFileName = time() . '_' . $coverFile->getClientOriginalName();
            $coverFile->move('public/cover', $coverFileName);
            $buku->cover_buku = $coverFileName;
        }

        $buku->save();
        return redirect('buku')->with('store', 'Buku berhasil ditambahkan');
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
            'jumlah_halaman' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'tema' => 'required',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
            'cover_buku' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'isbn.required' => 'ISBN tidak boleh kosong',
            'judul_buku.required' => 'Judul Buku tidak boleh kosong',
            'jumlah_halaman.required' => 'Jumlah Halaman tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
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

        if ($request->hasFile('cover_buku')) {

            if ($buku->cover_buku) {
                unlink('public/cover/' . $buku->cover_buku);
            }

            $coverFile = $request->file('cover_buku');
            $coverFileName = time() . '_' . $coverFile->getClientOriginalName();
            $coverFile->move('public/cover', $coverFileName);
        }


        $buku->isbn = $request->isbn;
        $buku->judul_buku = $request->judul_buku;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok = $request->stok;
        $buku->deskripsi = $request->deskripsi;
        $buku->tema = $request->tema;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->kategori_id = $request->kategori_id;
        if ($request->hasFile('cover_buku')) {
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


        // hapus cover
        if ($buku->cover_buku) {
            unlink('public/cover/' . $buku->cover_buku);
        }

        $cek_buku_detail = DetailPinjaman::where('buku_id', $id)->count();
        if ($cek_buku_detail > 0) {
            return redirect('/buku')->with('error', 'Buku tidak bisa dihapus karena sedang dipinjam');
        }

        if ($buku) {
            $buku->delete();
            return redirect('/buku')->with('destroy', 'Buku berhasil dihapus');
        } else {
            return redirect('/buku')->with('error', 'Buku tidak ditemukan');
        }
    }
}
