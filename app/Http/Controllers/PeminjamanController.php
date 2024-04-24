<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjaman;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $pinjaman = DB::table('pinjaman')
            ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
            ->join('users', 'anggota.users_id', '=', 'users.id')
            ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name', 'pinjaman.created_at as date')
            ->get();
        return view('admin.pages.peminjaman', [
            'pinjaman' => $pinjaman
        ]);
    }

    public function editstatus(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->status = $request->status;
        $pinjaman->save();

        if ($request->status == 'Dikembalikan') {
            $detailbuku = DetailPinjaman::where('pinjaman_id', $id)->get();
            foreach ($detailbuku as $detail) {
                $detail->buku->status = 'Tersedia';
                $detail->buku->save();
            }
        }

        return redirect()->back();
    }
}
