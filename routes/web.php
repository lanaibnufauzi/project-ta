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
use App\Http\Controllers\DashboardUserController;

# landing
// Route::get('/', function () {
//     return view('landing.pages.index');
// });

Route::get('/', function () {
    return view('user.pages.landingUser');
});



# Auth
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('IsAdmin');

# Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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


# User
Route::get('/user/peminjaman', [PinjamController::class, 'index']);
Route::post('/user/peminjaman/store', [PinjamController::class, 'storepinjaman']);
Route::get('/user/peminjaman/detail/{id}', [PinjamController::class, 'detailpeminjaman']);
Route::post('/user/peminjaman/storebuku', [PinjamController::class, 'storebuku']);
Route::delete('/user/peminjaman/delete/{id}', [PinjamController::class, 'deletebuku']);
