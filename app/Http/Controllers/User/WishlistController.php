<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        $wishlist = Wishlist::with('buku')->where('id_user', Auth::user()->id)->get();
        return view('landing.pages.wishlist', [
            'wishlist' => $wishlist,
            'kategori' => $kategori
        ]);
    }

    public function wishlist($id)
    {
        $id_buku = $id;
        $id_user = Auth::user()->id;

        $cek_status = buku::where('id', $id_buku)->first();

        if ($cek_status->status == 'Di Pinjam') {
            return redirect()->back()->with('gagalwish', 'Buku sedang dipinjam');
        }

        $cek = Wishlist::where('id_user', $id_user)->where('id_buku', $id_buku)->first();

        if ($cek) {
            Wishlist::where('id_user', $id_user)->where('id_buku', $id_buku)->delete();
            return redirect()->back()->with('deletewish', 'Buku berhasil dihapus dari wishlist');
        } else {
            $wishlist = new Wishlist();
            $wishlist->id_user = $id_user;
            $wishlist->id_buku = $id_buku;
            $wishlist->save();

            return redirect('/user/wishlist')->with('storewish', 'Buku berhasil ditambahkan ke wishlist');
        }
    }

    public function delete($id)
    {
        Wishlist::where('id', $id)->delete();
        return redirect()->back()->with('deletewish', 'Buku berhasil dihapus dari wishlist');
    }
}
