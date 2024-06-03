<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    protected $fillable = [
        'id_anggota',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_kembali_real',
        'status',
        'confirmation_deadline',
        'no_transaksi',
        'bank',
        'no_va',
        'expired_date',
        'status_pembayaran'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }
}
