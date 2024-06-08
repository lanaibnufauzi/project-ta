<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // Pada controller, sesuaikan pencarian buku
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $id_kategori = $request->id_kategori;
        $nama_buku = $request->nama_buku;

        $query = Buku::query();

        if ($id_kategori != null) {
            $query->where('kategori_id', $id_kategori);
        }

        // Paginate the results
        $buku = $query->paginate(10);

        $decrypted_buku = [];

        foreach ($buku as $item) {
            $item->judul_buku_decrypted = $item->judul_buku; // Dekripsi judul buku
            $decrypted_buku[] = $item;
        }

        if ($nama_buku != null) {
            $decrypted_buku = array_filter($decrypted_buku, function ($item) use ($nama_buku) {
                return stripos($item->judul_buku_decrypted, $nama_buku) !== false;
            });
        }

        $jumlah_data = count($decrypted_buku);

        if ($request->ajax()) {
            $view = view('landing.data.landing', [
                'buku' => $decrypted_buku,
            ])->render();
            return response()->json(['html' => $view]);
        }

        return view('landing.pages.landing', [
            'buku' => $decrypted_buku,
            'kategori' => $kategori,
            'jumlah_data' => $jumlah_data
        ]);
    }
}
