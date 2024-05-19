<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = [

        'id_user',
        'id_buku'

    ];

    public function user()
    {
        return $this->belongsTo(Kategori::class, 'id_user', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id');
    }
}
