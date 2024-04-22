<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::middleware('only_sign_in')->group(function () {
//     Route::get('login', [AuthController::class, 'login'])->name('login');
//     Route::post('login', [AuthController::class, 'loginProcess']);
// });

Route::get('/', function () {
    return view('landing.pages.index');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginProcess'])->name('login.process');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register.create');

// Route::get('/', [LoginController::class, 'index'])->name('/');

// Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');

Route::get('/pengguna', [AnggotaController::class, 'index'])->middleware('auth')->name('pengguna');
Route::post('/pengguna-add', [AnggotaController::class, 'create'])->middleware('auth')->name('pengguna.create');
Route::delete('/pengguna-delete/{id}', [AnggotaController::class, 'destroy']);
Route::put('/pengguna-edit/{id}', [AnggotaController::class, 'edit']);


Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
});

Route::get('/buku', [BukuController::class, 'index'])->middleware('auth')->name('buku');
Route::post('/buku-add', [BukuController::class, 'create'])->middleware('auth')->name('buku.create');
Route::delete('/buku-delete/{id}', [BukuController::class, 'destroy']);
Route::put('/buku-edit/{id}', [BukuController::class, 'edit']);


Route::get('/kategori', [KategoriController::class, 'index'])->middleware('auth')->name('kategori');
Route::post('/kategori-add', [KategoriController::class, 'create'])->middleware('auth')->name('kategori.create');
Route::delete('/kategori-delete/{id}', [KategoriController::class, 'destroy']);
Route::put('/kategori-edit/{id}', [KategoriController::class, 'edit']);

