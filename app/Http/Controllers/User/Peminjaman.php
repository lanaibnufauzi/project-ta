<?php

namespace App\Http\Controllers\User;

use App\Models\buku;
use App\Models\Cart;
use App\Models\Anggota;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Models\DetailPinjaman;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Peminjaman extends Controller
{
    public function pinjam()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->get();
        $id_anggota = Anggota::where('users_id', Auth::user()->id)->first()->id;

        $pinjaman = new Pinjaman();
        $pinjaman->id_anggota = $id_anggota;
        $pinjaman->status = 'Pinjam';
        $pinjaman->tgl_pinjam = date('Y-m-d');
        $pinjaman->tgl_kembali = date('Y-m-d', strtotime('+3 days'));
        $pinjaman->save();

        foreach ($cart as $item) {

            $cek_buku = buku::where('id', $item->id_buku)->first();
            $jumlah_buku_dipinjam = DB::table('pinjaman')
                ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                ->where('detail_pinjaman.buku_id', $item->id_buku)
                ->where('pinjaman.status', 'Pinjam')
                ->count();

            if ($cek_buku->stok <= $jumlah_buku_dipinjam) {
                return redirect()->back()->with('stoktidakada', 'Stok buku tidak mencukupi');
            }

            $detailPinjaman = new DetailPinjaman();
            $detailPinjaman->pinjaman_id = $pinjaman->id;
            $detailPinjaman->buku_id = $item->id_buku;
            $detailPinjaman->save();
        }

        // delete cart
        foreach ($cart as $item) {
            $item->delete();
        }

        // update status dibuku
        foreach ($cart as $item) {
            $buku = Buku::find($item->id_buku);
            // $buku->status = 'Di Pinjam';
            $buku->save();
        }

        return redirect()->back()->with('pinjam', 'Berhasil melakukan peminjaman');
    }
}
