<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriDenda extends Model
{
    use HasFactory;

    protected $table = 'kategori_denda';

    protected $fillable = [
        'nama_kategori',
        'harga_kategori',
    ];
}
