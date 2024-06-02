<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User\Peminjaman;

class DashboardController extends Controller
{
    public function index()

    {
        $jumlah_kategori = Kategori::count();
        $jumlah_buku = Buku::count();
        $jumlah_user = User::where('id_role', 2)->count();
        $total_peminjaman = Pinjaman::where('status', 'Pinjam')->count();

        // Ambil data pinjaman per hari dari database
        $chart_pinjaman_per_hari = Pinjaman::select(DB::raw('DATE(created_at) as date, count(*) as total'))
            ->where('status', 'Pinjam')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        // Inisialisasi array untuk menyimpan data pinjaman per hari
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $pinjamanPerHari = array_fill_keys($daysOfWeek, 0);

        // Isi array dengan data dari database
        foreach ($chart_pinjaman_per_hari as $data) {
            $dayName = date('l', strtotime($data->date)); // Ambil nama hari dalam bahasa Inggris
            $pinjamanPerHari[$dayName] = $data->total;
        }

        // Urutkan array sesuai dengan urutan hari
        $pinjamanPerHariOrdered = [];
        foreach ($daysOfWeek as $day) {
            $pinjamanPerHariOrdered[] = $pinjamanPerHari[$day];
        }


        return view('admin.pages.dashboard', [
            'jumlah_kategori' => $jumlah_kategori,
            'jumlah_buku' => $jumlah_buku,
            'jumlah_user' => $jumlah_user,
            'total_peminjaman' => $total_peminjaman,
            'pinjamanPerHariOrdered' => $pinjamanPerHariOrdered,
            'daysOfWeek' => $daysOfWeek,
        ]);
    }
}
