<?php

namespace App\Http\Controllers\User;

use App\Models\buku;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\kategori;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        $cart = Cart::with('buku')->where('id_user', Auth::user()->id)->get();
        return view('landing.pages.cart', [
            'cart' => $cart,
            'kategori' => $kategori
        ]);
    }

    public function cart($id)
    {
        $id_buku = $id;
        $id_user = Auth::user()->id;

        $cek_buku = buku::where('id', $id_buku)->first();

        $jumlah_buku_dipinjam = DB::table('pinjaman')
            ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
            ->where('detail_pinjaman.buku_id', $id_buku)
            ->where('pinjaman.status', 'Pinjam')
            ->count();

        if ($cek_buku->stok <= $jumlah_buku_dipinjam) {
            return redirect()->back()->with('stoktidakada', 'Stok buku tidak mencukupi');
        }

        $id_anggota = Anggota::where('users_id', $id_user)->first()->id;

        $cek_apakah_user_sudah_meminjam_buku = DB::table('pinjaman')
            ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
            ->where('detail_pinjaman.buku_id', $id_buku)
            ->where('pinjaman.id_anggota', $id_anggota)
            ->where('pinjaman.status', 'Pinjam')
            ->count();

        $cek_apakah_user_sudah_meminjam_buku_pending = DB::table('pinjaman')
            ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
            ->where('detail_pinjaman.buku_id', $id_buku)
            ->where('pinjaman.id_anggota', $id_anggota)
            ->where('pinjaman.status', 'Pending')
            ->count();

        if ($cek_apakah_user_sudah_meminjam_buku_pending > 0) {
            return redirect()->back()->with('sudahmeminjampending', 'Anda sudah meminjam buku ini');
        }

        if ($cek_apakah_user_sudah_meminjam_buku > 0) {
            return redirect()->back()->with('sudahmeminjam', 'Anda sudah meminjam buku ini');
        }

        $cek = Cart::where('id_user', $id_user)->where('id_buku', $id_buku)->first();

        if ($cek) {
            Cart::where('id_user', $id_user)->where('id_buku', $id_buku)->delete();
            return redirect()->back()->with('deletecart', 'Buku berhasil dihapus dari wishlist');
        } else {
            $wishlist = new Cart();
            $wishlist->id_user = $id_user;
            $wishlist->id_buku = $id_buku;
            $wishlist->save();

            return redirect('/user/cart')->with('storecart', 'Buku berhasil ditambahkan ke wishlist');
        }
    }
}
