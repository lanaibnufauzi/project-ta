<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'id_role',
        'nisn',
        'name',
        'email',
        'password',
        'no_handphone',
        'alamat',
    ];

    // encrypt aes 128 nisn
    public function setNisnAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['nisn'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getNisnAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt aes 128 name
    public function setNameAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['name'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getNameAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt aes 128 email
    public function setEmailAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['email'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getEmailAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt aes 128 no_handphone
    public function setNoHandphoneAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['no_handphone'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getNoHandphoneAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    // encrypt aes 128 alamat
    public function setAlamatAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        $this->attributes['alamat'] = openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    public function getAlamatAttribute($value)
    {
        $iv = '1234567890123456';
        $key = '1234567890123456';
        return openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }
}
