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
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Peminjaman extends Controller
{
    public function pinjam()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->get();
        $id_anggota = Anggota::where('users_id', Auth::user()->id)->first()->id;

        $pinjaman = new Pinjaman();
        $pinjaman->id_anggota = $id_anggota;
        $pinjaman->status = 'Pending';
        $pinjaman->confirmation_deadline = Carbon::now()->addMinutes(15);
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

            $jumlah_buku_pending = DB::table('pinjaman')
                ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                ->where('detail_pinjaman.buku_id', $item->id_buku)
                ->where('pinjaman.status', 'Pending')
                ->count();

            $jumlah_buku_dipinjam = $jumlah_buku_dipinjam + $jumlah_buku_pending;
            $sisa_buku = $cek_buku->jumlah_buku - $jumlah_buku_dipinjam;

            if ($sisa_buku < 0) {
                return redirect()->back()->with('stoktidakada', 'Stok buku tidak mencukupi');
            }

            $detailPinjaman = new DetailPinjaman();
            $detailPinjaman->pinjaman_id = $pinjaman->id;
            $detailPinjaman->buku_id = $item->id_buku;
            $detailPinjaman->kondisi_buku = 'Baik';
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

    public function tambahbukuketikapending()
    {
        $cart = Cart::where('id_user', Auth::user()->id)->get();
        $id_anggota = Anggota::where('users_id', Auth::user()->id)->first()->id;

        $pinjaman = Pinjaman::where('id_anggota', $id_anggota)->where('status', 'Pending')->first();

        foreach ($cart as $item) {
            $cek_buku = buku::where('id', $item->id_buku)->first();
            $jumlah_buku_dipinjam = DB::table('pinjaman')
                ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                ->where('detail_pinjaman.buku_id', $item->id_buku)
                ->where('pinjaman.status', 'Pinjam')
                ->count();

            $jumlah_buku_pending = DB::table('pinjaman')
                ->join('detail_pinjaman', 'pinjaman.id', '=', 'detail_pinjaman.pinjaman_id')
                ->where('detail_pinjaman.buku_id', $item->id_buku)
                ->where('pinjaman.status', 'Pending')
                ->count();

            $jumlah_buku_dipinjam = $jumlah_buku_dipinjam + $jumlah_buku_pending;
            $sisa_buku = $cek_buku->jumlah_buku - $jumlah_buku_dipinjam;

            if ($sisa_buku < 0) {
                return redirect()->back()->with('stoktidakada', 'Stok buku tidak mencukupi');
            }

            $detailPinjaman = new DetailPinjaman();
            $detailPinjaman->pinjaman_id = $pinjaman->id;
            $detailPinjaman->buku_id = $item->id_buku;
            $detailPinjaman->kondisi_buku = 'Baik';
            $detailPinjaman->save();
        }

        // delete cart
        foreach ($cart as $item) {
            $item->delete();
        }

        return redirect()->back()->with('tambahanbuku', 'Berhasil menambahkan buku ketika status peminjaman pending');
    }

    public function batal($id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->status = 'Gagal';
        $pinjaman->save();

        return redirect()->back()->with('batalpinjam', 'Berhasil membatalkan peminjaman');
    }
}
