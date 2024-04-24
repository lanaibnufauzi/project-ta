<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'isbn',
        'judul_buku',
        'deskripsi',
        'tema',
        'penerbit',
        'tgl_terbit',
        'cover_buku',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function detailBuku()
    {
        return $this->hasOne(Detail_Buku::class, 'buku_id', 'id');
    }
}
