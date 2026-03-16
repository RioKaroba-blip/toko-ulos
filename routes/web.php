<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UlasanController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/produk', [FrontendController::class, 'produk'])->name('produk');
Route::get('/produk/{id}', [FrontendController::class, 'detailProduk'])->name('detail_produk');
Route::get('/tentang-kami', [FrontendController::class, 'tentangKami'])->name('tentang_kami');
Route::get('/ulasan', [FrontendController::class, 'ulasan'])->name('ulasan');
Route::post('/ulasan/kirim', [FrontendController::class, 'kirimUlasan'])->name('kirim-ulasan');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/tambah', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/laris', [ProdukController::class, 'laris'])->name('produk.laris');
    Route::post('/produk/laris', [ProdukController::class, 'tambahLaris'])->name('produk.laris.tambah');
    Route::delete('/produk/laris/{id}', [ProdukController::class, 'hapusLaris'])->name('produk.laris.hapus');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Ulasan
    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::put('/ulasan/{id}/tampilkan', [UlasanController::class, 'tampilkan'])->name('ulasan.tampilkan');
    Route::put('/ulasan/{id}/sembunyikan', [UlasanController::class, 'sembunyikan'])->name('ulasan.sembunyikan');
    Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');

    // Profile & Password
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::get('/password', [AdminController::class, 'password'])->name('password');
    Route::put('/password', [AdminController::class, 'updatePassword'])->name('password.update');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';