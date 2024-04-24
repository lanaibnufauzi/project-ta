<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPinjaman;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjaman = DB::table('pinjaman')
            ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
            ->join('users', 'anggota.users_id', '=', 'users.id')
            ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name', 'pinjaman.created_at as date')
            ->where('users.id', Auth::user()->id)
            ->get();
        return view('admin.pages.user.peminjaman', [
            'pinjaman' => $pinjaman
        ]);
    }

    public function storepinjaman()
    {
        $id_anggota = Anggota::where('users_id', Auth::user()->id)->first()->id;

        $pinjaman = new Pinjaman();
        $pinjaman->id_anggota = $id_anggota;
        $pinjaman->save();

        return redirect()->back();
    }


    public function detailpeminjaman($id)
    {
        $buku = Buku::where('status', 'Tersedia')->get();
        $pinjaman_id = $id;
        $detail_pinjaman = DetailPinjaman::with('buku')->where('pinjaman_id', $pinjaman_id)->get();

        return view('admin.pages.user.detail-peminjaman', [
            'detail_pinjaman' => $detail_pinjaman,
            'pinjaman_id' => $pinjaman_id,
            'buku' => $buku,
        ]);
    }

    public function storebuku(Request $request)
    {
        $pinjaman_id = $request->pinjaman_id;
        $buku_id = $request->buku_id;

        $detail_pinjaman = new DetailPinjaman();
        $detail_pinjaman->pinjaman_id = $pinjaman_id;
        $detail_pinjaman->buku_id = $buku_id;
        $detail_pinjaman->save();

        $buku = Buku::find($buku_id);
        $buku->status = 'Di Pinjam';
        $buku->save();

        return redirect()->back();
    }

    public function deletebuku($id)
    {
        $detail_pinjaman = DetailPinjaman::find($id);
        $buku = Buku::find($detail_pinjaman->buku_id);
        $buku->status = 'Tersedia';
        $buku->save();
        $detail_pinjaman->delete();

        return redirect()->back();
    }
}
