<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Models\DetailPinjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class PeminjamanController extends Controller
{
    public function index()
    {
        $pinjaman = DB::table('pinjaman')
            ->join('anggota', 'pinjaman.id_anggota', '=', 'anggota.id')
            ->join('users', 'anggota.users_id', '=', 'users.id')
            ->select('pinjaman.id as id', 'pinjaman.status as status', 'users.name as name',  'pinjaman.tgl_pinjam as tgl_pinjam', 'pinjaman.tgl_kembali as tgl_kembali', 'pinjaman.tgl_kembali_real as tgl_kembali_real')
            ->orderBy('pinjaman.id', 'desc')
            ->get();

        $cek = Pinjaman::where('status', 'Pending')
            ->where('confirmation_deadline', '<', Carbon::now())
            ->get();

        foreach ($cek as $cek_status) {
            $cek_status->status = 'Gagal';
            $cek_status->save();
        }

        return view('admin.pages.peminjaman', [
            'pinjaman' => $pinjaman
        ]);
    }

    public function editstatus(Request $request, $id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->status = $request->status;
        if ($request->status == 'Kembali') {
            $pinjaman->tgl_kembali_real = Carbon::now();
        }
        $pinjaman->save();

        if ($request->status == 'Kembali') {
            $detailbuku = DetailPinjaman::where('pinjaman_id', $id)->get();
            foreach ($detailbuku as $detail) {
                $detail->buku->save();
            }
        } elseif ($request->status == 'Pinjam') {
            if (Carbon::now()->lt($pinjaman->confirmation_deadline)) {
                $pinjaman->status = 'Pinjam';
                $pinjaman->save();
            }
        }

        return redirect()->back()->with('ubahstatus', 'Status peminjaman berhasil diubah');
    }

    public function kembalikan_buku(Request $request)
    {
        $id_peminjaman = Crypt::decryptString($request->peminjaman_id);
        $datapeminjaman = Pinjaman::find($id_peminjaman);

        if ($datapeminjaman->status == 'Pinjam') {
            $datapeminjaman->status = 'Kembali';
            $datapeminjaman->tgl_kembali_real = Carbon::now();
            $datapeminjaman->save();
            return response()->json([
                'success' => 'berhasil-kembali',
                'message' => 'Pengembalian Buku Berhasil'
            ]);
        } elseif ($datapeminjaman->status == 'Pending') {
            $datapeminjaman->status = 'Pinjam';
            $datapeminjaman->save();
            return response()->json([
                'success' => 'berhasil-pinjam',
                'message' => 'Peminjaman Buku Berhasil'
            ]);
        } else {
            return response()->json([
                'success' => 'gagal',
                'message' => 'tidak valid'
            ]);
        }
    }

    public function kondisibuku(Request $request, $id)
    {
        $detailbuku = DetailPinjaman::where('id', $id)->first();
        $detailbuku->kondisi_buku = $request->kondisi_buku;
        $detailbuku->save();

        return redirect()->back()->with('kondisibuku', 'Kondisi buku berhasil diubah');
    }
}
