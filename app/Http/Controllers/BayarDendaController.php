<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\Peminjaman;
use App\Models\Anggota;
use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;

class BayarDendaController extends Controller
{
    public function bayardenda($id)
    {

        $pinjaman = Pinjaman::find($id);

        if ($pinjaman->status_pembayaran == 'paid') {

            $tanggal_kembali = strtotime($pinjaman->tgl_kembali);
            $tanggal_sekarang = strtotime(date('Y-m-d'));
            $telat = ($tanggal_sekarang - $tanggal_kembali) / (60 * 60 * 24);

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $telat = 0;
                // jika telat sama dengan 0 dan kurang dari 0 dan statusnya pinjam maka akan di tampilkan 0
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $telat = 0;
            } else {
                $telat;
            }

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $denda_telat = 0;
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $denda_telat = 0;
            } else {
                $jumlah_hari_telat = $telat;
                $jumlah_buku_yang_di_pinjam = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->count();
                $denda = \App\Models\KategoriDenda::where('nama_kategori', 'Telat')->first()->harga_kategori;

                $denda_telat = $jumlah_hari_telat * $jumlah_buku_yang_di_pinjam * $denda;
            }

            $buku_rusak = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Rusak')->count();
            $buku_hilang = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Hilang')->count();

            $denda_rusak = \App\Models\KategoriDenda::where('nama_kategori', 'Rusak')->first()->harga_kategori;
            $denda_hilang = \App\Models\KategoriDenda::where('nama_kategori', 'Hilang')->first()->harga_kategori;

            $total_denda_rusak = $buku_rusak * $denda_rusak;
            $total_denda_hilang = $buku_hilang * $denda_hilang;

            if ($denda_telat == 0) {
                $total_denda = $total_denda_rusak + $total_denda_hilang;
            } else {
                $total_denda = $denda_telat + $total_denda_rusak + $total_denda_hilang;
            }

            return view('admin.pages.bayardenda', [
                'total_denda' => $total_denda,
                'transaksi' => $pinjaman,
                'snapToken' => ''
            ]);
        } elseif ($pinjaman->bank != null && $pinjaman->no_va != null && $pinjaman->status_pembayaran == 'pending') {

            $tanggal_kembali = strtotime($pinjaman->tgl_kembali);
            $tanggal_sekarang = strtotime(date('Y-m-d'));
            $telat = ($tanggal_sekarang - $tanggal_kembali) / (60 * 60 * 24);

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $telat = 0;
                // jika telat sama dengan 0 dan kurang dari 0 dan statusnya pinjam maka akan di tampilkan 0
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $telat = 0;
            } else {
                $telat;
            }

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $denda_telat = 0;
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $denda_telat = 0;
            } else {
                $jumlah_hari_telat = $telat;
                $jumlah_buku_yang_di_pinjam = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->count();
                $denda = \App\Models\KategoriDenda::where('nama_kategori', 'Telat')->first()->harga_kategori;

                $denda_telat = $jumlah_hari_telat * $jumlah_buku_yang_di_pinjam * $denda;
            }

            $buku_rusak = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Rusak')->count();
            $buku_hilang = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Hilang')->count();

            $denda_rusak = \App\Models\KategoriDenda::where('nama_kategori', 'Rusak')->first()->harga_kategori;
            $denda_hilang = \App\Models\KategoriDenda::where('nama_kategori', 'Hilang')->first()->harga_kategori;

            $total_denda_rusak = $buku_rusak * $denda_rusak;
            $total_denda_hilang = $buku_hilang * $denda_hilang;

            if ($denda_telat == 0) {
                $total_denda = $total_denda_rusak + $total_denda_hilang;
            } else {
                $total_denda = $denda_telat + $total_denda_rusak + $total_denda_hilang;
            }

            return view('admin.pages.bayardenda', [
                'total_denda' => $total_denda,
                'transaksi' => $pinjaman,
                'snapToken' => ''
            ]);
        } elseif ($pinjaman->status_pembayaran == 'expired') {
            $no_transaksi = $pinjaman->id . time();
            $pinjaman->no_transaksi = $no_transaksi;
            $pinjaman->status_pembayaran = 'Belum Pilih Pembayaran';
            $pinjaman->save();

            $user = Anggota::find($pinjaman->id_anggota);
            $data_user = User::find($user->users_id);

            $tanggal_kembali = strtotime($pinjaman->tgl_kembali);
            $tanggal_sekarang = strtotime(date('Y-m-d'));
            $telat = ($tanggal_sekarang - $tanggal_kembali) / (60 * 60 * 24);

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $telat = 0;
                // jika telat sama dengan 0 dan kurang dari 0 dan statusnya pinjam maka akan di tampilkan 0
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $telat = 0;
            } else {
                $telat;
            }

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $denda_telat = 0;
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $denda_telat = 0;
            } else {
                $jumlah_hari_telat = $telat;
                $jumlah_buku_yang_di_pinjam = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->count();
                $denda = \App\Models\KategoriDenda::where('nama_kategori', 'Telat')->first()->harga_kategori;

                $denda_telat = $jumlah_hari_telat * $jumlah_buku_yang_di_pinjam * $denda;
            }

            $buku_rusak = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Rusak')->count();
            $buku_hilang = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Hilang')->count();

            $denda_rusak = \App\Models\KategoriDenda::where('nama_kategori', 'Rusak')->first()->harga_kategori;
            $denda_hilang = \App\Models\KategoriDenda::where('nama_kategori', 'Hilang')->first()->harga_kategori;

            $total_denda_rusak = $buku_rusak * $denda_rusak;
            $total_denda_hilang = $buku_hilang * $denda_hilang;

            if ($denda_telat == 0) {
                $total_denda = $total_denda_rusak + $total_denda_hilang;
            } else {
                $total_denda = $denda_telat + $total_denda_rusak + $total_denda_hilang;
            }

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;

            // \Midtrans\Config::$isProduction = true;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $no_transaksi,
                    'gross_amount' => $total_denda,
                ),
                'customer_details' => array(
                    'first_name' => $data_user->name,
                    'phone' => $data_user->no_handphone,
                    'email' => $data_user->email,
                ),
                'item_details' => array(
                    array(
                        'id' => $no_transaksi,
                        'price' => $total_denda,
                        'quantity' => 1,
                        'name' => 'Denda',
                    ),
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('admin.pages.bayardenda', [
                'transaksi' => $pinjaman,
                'total_denda' => $total_denda,
                'snapToken' => $snapToken
            ]);
        } else {

            $no_transaksi =  $no_transaksi = $pinjaman->id . time();
            $pinjaman->no_transaksi = $no_transaksi;
            $pinjaman->status_pembayaran = 'Belum Pilih Pembayaran';
            $pinjaman->save();

            $user = Anggota::find($pinjaman->id_anggota);
            $data_user = User::find($user->users_id);

            $tanggal_kembali = strtotime($pinjaman->tgl_kembali);
            $tanggal_sekarang = strtotime(date('Y-m-d'));
            $telat = ($tanggal_sekarang - $tanggal_kembali) / (60 * 60 * 24);

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $telat = 0;
                // jika telat sama dengan 0 dan kurang dari 0 dan statusnya pinjam maka akan di tampilkan 0
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $telat = 0;
            } else {
                $telat;
            }

            if ($pinjaman->status == 'Kembali' || $pinjaman->status == 'Pending' || $pinjaman->status == 'Gagal') {
                $denda_telat = 0;
            } elseif ($telat < 0 && $pinjaman->status == 'Pinjam') {
                $denda_telat = 0;
            } else {
                $jumlah_hari_telat = $telat;
                $jumlah_buku_yang_di_pinjam = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->count();
                $denda = \App\Models\KategoriDenda::where('nama_kategori', 'Telat')->first()->harga_kategori;

                $denda_telat = $jumlah_hari_telat * $jumlah_buku_yang_di_pinjam * $denda;
            }

            $buku_rusak = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Rusak')->count();
            $buku_hilang = \App\Models\DetailPinjaman::where('pinjaman_id', $pinjaman->id)->where('kondisi_buku', 'Hilang')->count();

            $denda_rusak = \App\Models\KategoriDenda::where('nama_kategori', 'Rusak')->first()->harga_kategori;
            $denda_hilang = \App\Models\KategoriDenda::where('nama_kategori', 'Hilang')->first()->harga_kategori;

            $total_denda_rusak = $buku_rusak * $denda_rusak;
            $total_denda_hilang = $buku_hilang * $denda_hilang;

            if ($denda_telat == 0) {
                $total_denda = $total_denda_rusak + $total_denda_hilang;
            } else {
                $total_denda = $denda_telat + $total_denda_rusak + $total_denda_hilang;
            }

            if ($total_denda == 0) {
                return redirect()->back()->with('tidakdenda', 'Tidak ada denda yang harus dibayar');
            }

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;

            // \Midtrans\Config::$isProduction = true;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $no_transaksi,
                    'gross_amount' => $total_denda,
                ),
                'customer_details' => array(
                    'first_name' => $data_user->name,
                    'phone' => $data_user->no_handphone,
                    'email' => $data_user->email,
                ),
                'item_details' => array(
                    array(
                        'id' => $no_transaksi,
                        'price' => $total_denda,
                        'quantity' => 1,
                        'name' => 'Denda',
                    ),
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('admin.pages.bayardenda', [
                'transaksi' => $pinjaman,
                'total_denda' => $total_denda,
                'snapToken' => $snapToken
            ]);
        }
    }

    public function callback(Request $request)
    {
        $serverkey = 'SB-Mid-server-aNyMN6S4_am_yDaJ6fpdfrxc';
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverkey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $order = Pinjaman::where('no_transaksi', $request->order_id)->first();
                $order->bank = $request->va_numbers[0]['bank'];
                $order->no_va = $request->va_numbers[0]['va_number'];
                $order->expired_date = $request->expiry_time;
                $order->status_pembayaran = 'paid';
                $order->save();
            } elseif ($request->transaction_status == 'pending') {

                $order = Pinjaman::where('no_transaksi', $request->order_id)->first();
                $order->bank = $request->va_numbers[0]['bank'];
                $order->no_va = $request->va_numbers[0]['va_number'];
                $order->expired_date = $request->expiry_time;
                $order->status_pembayaran = 'pending';
                $order->save();
            } else {
                $order = Pinjaman::where('no_transaksi', $request->order_id)->first();
                $order->bank = $request->va_numbers[0]['bank'];
                $order->no_va = $request->va_numbers[0]['va_number'];
                $order->expired_date = $request->expiry_time;
                $order->status_pembayaran = 'expire';
                $order->save();
            }
        }
    }
}
