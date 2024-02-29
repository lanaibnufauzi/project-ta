<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dateail_buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'halaman',
        'isi_buku',

    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
}

