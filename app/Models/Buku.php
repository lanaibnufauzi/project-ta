<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'jumlah_halaman',
        'stok'
    ];

    // encrypt isbn aes 128
    public function setIsbnAttribute($value)
    {
        $this->attributes['isbn'] = Crypt::encryptString($value);
    }

    public function getIsbnAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt judul_buku aes 128
    public function setJudulBukuAttribute($value)
    {
        $this->attributes['judul_buku'] = Crypt::encryptString($value);
    }

    public function getJudulBukuAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt deskripsi aes 128
    public function setDeskripsiAttribute($value)
    {
        $this->attributes['deskripsi'] = Crypt::encryptString($value);
    }

    public function getDeskripsiAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt tema aes 128
    public function setTemaAttribute($value)
    {
        $this->attributes['tema'] = Crypt::encryptString($value);
    }

    public function getTemaAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt penerbit aes 128
    public function setPenerbitAttribute($value)
    {
        $this->attributes['penerbit'] = Crypt::encryptString($value);
    }

    public function getPenerbitAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt tgl_terbit aes 128
    public function setTglTerbitAttribute($value)
    {
        $this->attributes['tgl_terbit'] = Crypt::encryptString($value);
    }

    public function getTglTerbitAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt cover_buku aes 128
    public function setCoverBukuAttribute($value)
    {
        $this->attributes['cover_buku'] = Crypt::encryptString($value);
    }

    public function getCoverBukuAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt jumlah_halaman aes 128
    public function setJumlahHalamanAttribute($value)
    {
        $this->attributes['jumlah_halaman'] = Crypt::encryptString($value);
    }

    public function getJumlahHalamanAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // encrypt stok aes 128
    public function setStokAttribute($value)
    {
        $this->attributes['stok'] = Crypt::encryptString($value);
    }

    public function getStokAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
