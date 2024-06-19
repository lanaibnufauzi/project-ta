<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
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
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['isbn'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getIsbnAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt judul_buku aes 128
    // public function setJudulBukuAttribute($value)
    // {
    //     $iv = '1234567890123456';
    //     $key = '1234567890123456';
    //     $this->attributes['judul_buku'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    // }

    // public function getJudulBukuAttribute($value)
    // {
    //     $iv = '1234567890123456';
    //     $key = '1234567890123456';
    //     return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    // }

    // encrypt deskripsi aes 128
    public function setDeskripsiAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['deskripsi'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getDeskripsiAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt tema aes 128
    public function setTemaAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['tema'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getTemaAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt penerbit aes 128
    public function setPenerbitAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['penerbit'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getPenerbitAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt tgl_terbit aes 128
    public function setTglTerbitAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['tgl_terbit'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getTglTerbitAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt cover_buku aes 128
    public function setCoverBukuAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['cover_buku'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getCoverBukuAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt jumlah_halaman aes 128
    public function setJumlahHalamanAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['jumlah_halaman'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getJumlahHalamanAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt stok aes 128
    public function setStokAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['stok'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getStokAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
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
