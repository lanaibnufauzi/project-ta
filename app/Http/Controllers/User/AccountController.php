<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\kategori;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        $pinjaman = DB::table('pinjaman')
            ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
            ->join('users', 'anggota.users_id', '=', 'users.id')
            ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name', 'pinjaman.tgl_pinjam as tanggal_pinjam', 'pinjaman.tgl_kembali as tanggal_kembali')
            ->where('users.id', Auth::user()->id)
            ->orderBy('pinjaman.id', 'desc')
            ->get();

        $cek = Pinjaman::where('status', 'Pending')
            ->where('confirmation_deadline', '<', Carbon::now())
            ->get();

        foreach ($cek as $cek_status) {
            $cek_status->status = 'Gagal';
            $cek_status->save();
        }
        
        return view('landing.pages.account3', [
            'pinjaman' => $pinjaman,
            'kategori' => $kategori
        ]);
    }
}
