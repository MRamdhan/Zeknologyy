<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/detail{produk}', [UserController::class, 'detail'])->name('detail');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar');
Route::post('/postdaftar', [AuthController::class, 'postdaftar'])->name('postdaftar');

Route::middleware('auth')->group(function(){
    Route::get('/homeAdmin', [AdminController::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('/tambah', [AdminController::class, 'tambah'])->name('tambah');
    Route::post('posttambah', [AdminController::class, 'posttambah'])->name('posttambah');
    Route::get('/edit{produk}', [AdminController::class, 'edit'])->name('edit');
    Route::post('postedit{produk}', [AdminController::class, 'postedit'])->name('postedit');
    Route::get('hapus{produk}', [AdminController::class, 'hapus'])->name('hapus');
    Route::get('/kategori', [AdminController::class, 'kategori'])->name('kategori');
    Route::post('postkategori', [AdminController::class, 'postkategori'])->name('postkategori');
    
    Route::get('bayar{detailtransaksi}', [UserController::class, 'bayar'])->name('bayar');
    Route::post('bayar{detailtransaksi}', [UserController::class, 'postbayar'])->name('postbayar');
    Route::get('/keranjang', [UserController::class, 'keranjang'])->name('keranjang');
    Route::post('/postkeranjang{produk}', [UserController::class, 'postkeranjang'])->name('postkeranjang');
    Route::get('/summary', [UserController::class, 'summary'])->name('summary');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});