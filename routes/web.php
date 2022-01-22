<?php

use App\Models\Rak;
use App\Models\Buku;
use App\Models\User;
use App\Models\Anggotum;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// dd(\Hash::make('p'));
Route::get('/', function () {

    return redirect()->route('login');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        
        return redirect('buku');
    })->name('dashboard');

    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::post('buku/laporan/print', ['App\Http\Controllers\BukuController', 'print'])->name('buku.print');
        Route::get('buku/laporan', ['App\Http\Controllers\BukuController', 'laporan'])->name('buku.laporan.index');
        Route::get('buku/hapus_semua', ['App\Http\Controllers\BukuController', 'hapus_semua'])->name('buku.hapus_semua');
        Route::resource('buku', 'App\Http\Controllers\BukuController')->parameters(['buku' => 'buku']);

    Route::post('user/laporan/print', ['App\Http\Controllers\UserController', 'print'])->name('user.print');
            Route::get('user/laporan', ['App\Http\Controllers\UserController', 'laporan'])->name('user.laporan.index');
            Route::get('user/hapus_semua', ['App\Http\Controllers\UserController', 'hapus_semua'])->name('user.hapus_semua');
            Route::resource('user', 'App\Http\Controllers\UserController')->parameters(['user' => 'user']);
});