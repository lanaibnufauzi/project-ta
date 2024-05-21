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
        'name',
        'email',
        'password',
        'no_handphone',
        'alamat',
    ];

    // // encrypt aes 128 name
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = Crypt::encryptString($value);
    // }

    // public function getNameAttribute($value)
    // {
    //     return Crypt::decryptString($value);
    // }

    // // encrypt aes 128 email
    // public function setEmailAttribute($value)
    // {
    //     $this->attributes['email'] = Crypt::encryptString($value);
    // }

    // public function getEmailAttribute($value)
    // {
    //     return Crypt::decryptString($value);
    // }

    // // encrypt aes 128 no_handphone
    // public function setNoHandphoneAttribute($value)
    // {
    //     $this->attributes['no_handphone'] = Crypt::encryptString($value);
    // }

    // public function getNoHandphoneAttribute($value)
    // {
    //     return Crypt::decryptString($value);
    // }



    // // encrypt aes 128 alamat
    // public function setAlamatAttribute($value)
    // {
    //     $this->attributes['alamat'] = Crypt::encryptString($value);
    // }

    // public function getAlamatAttribute($value)
    // {
    //     return Crypt::decryptString($value);
    // }

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
