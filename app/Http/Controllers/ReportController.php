<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $pinjaman = DB::table('pinjaman')
            ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
            ->join('users', 'anggota.users_id', '=', 'users.id')
            ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name',  'pinjaman.tgl_pinjam as tgl_pinjam', 'pinjaman.tgl_kembali as tgl_kembali')
            ->get();

        $cek = Pinjaman::where('status', 'Pending')
            ->where('confirmation_deadline', '<', Carbon::now())
            ->get();

        foreach ($cek as $cek_status) {
            $cek_status->status = 'Gagal';
            $cek_status->save();
        }

        return view('admin.pages.report', [
            'pinjaman' => $pinjaman
        ]);
    }

    public function report(Request $request)
    {
        $status = $request->status;
        $date1 = $request->date1;
        $date2 = $request->date2;

        if ($status == '0') {
            $pinjaman = DB::table('pinjaman')
                ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
                ->join('users', 'anggota.users_id', '=', 'users.id')
                ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name',  'pinjaman.tgl_pinjam as tgl_pinjam', 'pinjaman.tgl_kembali as tgl_kembali')
                ->whereBetween('tgl_pinjam', [$date1, $date2])
                ->get();
        } elseif ($date1 == null && $date2 == null) {
            $pinjaman = DB::table('pinjaman')
                ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
                ->join('users', 'anggota.users_id', '=', 'users.id')
                ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name',  'pinjaman.tgl_pinjam as tgl_pinjam', 'pinjaman.tgl_kembali as tgl_kembali')
                ->where('status', $status)
                ->get();
        } else {
            $pinjaman = DB::table('pinjaman')
                ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
                ->join('users', 'anggota.users_id', '=', 'users.id')
                ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name',  'pinjaman.tgl_pinjam as tgl_pinjam', 'pinjaman.tgl_kembali as tgl_kembali')
                ->where('status', $status)
                ->whereBetween('tgl_pinjam', [$date1, $date2])
                ->get();
        }

        $cek = Pinjaman::where('status', 'Pending')
            ->where('confirmation_deadline', '<', Carbon::now())
            ->get();

        foreach ($cek as $cek_status) {
            $cek_status->status = 'Gagal';
            $cek_status->save();
        }

        return view('admin.pages.report', [
            'pinjaman' => $pinjaman
        ]);
    }
}
