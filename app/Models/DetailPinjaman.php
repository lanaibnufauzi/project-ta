<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_pinjaman';

    protected $fillable = [
        'pinjaman_id',
        'buku_id',
    ];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class, 'pinjaman_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}
