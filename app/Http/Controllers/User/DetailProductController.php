<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function index($id)
    {
        $kategori = kategori::all();
        $buku = buku::find($id);
        $relate_buku = buku::where('kategori_id', $buku->kategori_id)->where('id', '!=', $buku->id)->get();
        return view('landing.pages.detail-product', [
            'buku' => $buku,
            'kategori' => $kategori,
            'relate_buku' => $relate_buku
        ]);
    }
}
