<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

use App\Http\Controllers\User\LandingController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DetailProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Peminjaman;


# landing
// Route::get('/', function () {
//     return view('landing.pages.index');
// });

// Route::get('/', function () {
//     return view('user.pages.landingUser');
// });



# Auth
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('IsAdmin');

# Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('IsAdmin');

# Pengguna
Route::get('/pengguna', [AnggotaController::class, 'index'])->name('pengguna')->middleware('IsAdmin');
Route::post('/pengguna-add', [AnggotaController::class, 'create'])->name('pengguna.create')->middleware('IsAdmin');
Route::delete('/pengguna-delete/{id}', [AnggotaController::class, 'destroy'])->middleware('IsAdmin');
Route::put('/pengguna-edit/{id}', [AnggotaController::class, 'edit']);

# Buku
Route::get('/buku', [BukuController::class, 'index'])->name('buku')->middleware('IsAdmin');
Route::post('/buku-add', [BukuController::class, 'create'])->name('buku.create')->middleware('IsAdmin');
Route::delete('/buku-delete/{id}', [BukuController::class, 'destroy'])->middleware('IsAdmin');
Route::put('/buku-edit/{id}', [BukuController::class, 'edit'])->middleware('IsAdmin');

# Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori')->middleware('IsAdmin');
Route::post('/kategori-add', [KategoriController::class, 'create'])->name('kategori.create')->middleware('IsAdmin');
Route::delete('/kategori-delete/{id}', [KategoriController::class, 'destroy'])->middleware('IsAdmin');
Route::put('/kategori-edit/{id}', [KategoriController::class, 'edit'])->middleware('IsAdmin');

# Peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman')->middleware('IsAdmin');
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'editstatus'])->middleware('IsAdmin');


# Landing User
Route::get('/', [LandingController::class, 'index']);
Route::get('/user/detail-product/{id}', [DetailProductController::class, 'index']);

# Auth User
Route::get('/user/login', [UserAuthController::class, 'indexLogin']);
Route::get('/user/register', [UserAuthController::class, 'indexRegister']);
Route::post('/user/login', [UserAuthController::class, 'postLogin']);
Route::post('/user/register', [UserAuthController::class, 'postRegister']);


// middleware group
Route::group(['middleware' => 'IsUser'], function () {

    Route::get('/user/logout', [UserAuthController::class, 'userLogout']);
    Route::post('/user/update-profil ', [UserAuthController::class, 'updateprofil']);


    # Cart
    Route::get('/user/cart', [CartController::class, 'index']);
    Route::put('/user/cart/{id}', [CartController::class, 'cart']);

    # Wishlist
    Route::get('/user/wishlist', [WishlistController::class, 'index']);
    Route::put('/user/wishlist/{id}', [WishlistController::class, 'wishlist']);
    Route::delete('/user/wishlist/{id}', [WishlistController::class, 'delete']);

    # Account
    Route::get('/user/account', [AccountController::class, 'index']);

    # Peminjaman
    Route::post('/user/peminjaman', [Peminjaman::class, 'pinjam']);
});
