<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)

    {
        $kategori = kategori::all();
        $id_kategori = $request->id_kategori;
        $nama_buku = $request->nama_buku;

        if ($id_kategori != null && $nama_buku != null) {
            $buku = buku::where('kategori_id', $id_kategori)->where('judul_buku', 'like', '%' . $nama_buku . '%')->get();
            $jumlah_data = buku::where('kategori_id', $id_kategori)->where('judul_buku', 'like', '%' . $nama_buku . '%')->count();
        } elseif ($id_kategori != null) {
            $buku = buku::where('kategori_id', $id_kategori)->paginate(10);
            $jumlah_data = buku::where('kategori_id', $id_kategori)->count();
        } elseif ($nama_buku != null) {
            $buku = buku::where('judul_buku', 'like', '%' . $nama_buku . '%')->paginate(10);
            $jumlah_data = buku::where('judul_buku', 'like', '%' . $nama_buku . '%')->count();
        } else {
            $buku = buku::paginate(10);
            $jumlah_data = buku::count();
        }

        if ($request->ajax()) {
            $view = view('landing.data.landing', [
                'buku' => $buku,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.landing', [
            'buku' => $buku,
            'kategori' => $kategori,
            'jumlah_data' => $jumlah_data
        ]);
    }
}
