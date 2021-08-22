<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Kelola_ikanController;

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

Route::get('/', function () {
    return view('tampilan.user');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::POST('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [AuthController::class, 'admin'])->name('admin');
    Route::get('pimpinan', [AuthController::class, 'pimpinan'])->name('pimpinan');
    Route::POST('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('kelola_akun')->group(function () {
        Route::get('dashboard', [AkunController::class, 'dashboard'])->name('dashboard');
        Route::get('index', [AkunController::class, 'index'])->name('kelola_akun');
        Route::get('tambah', [AkunController::class, 'create'])->name('akun_tambah');
        Route::POST('tambah', [AkunController::class, 'store'])->name('akun_tambah');
        Route::get('edit/{id}', [AkunController::class, 'edit'])->name('akun_edit');
        Route::POST('edit/{id}', [AkunController::class, 'update'])->name('akun_edit');
        Route::DELETE('hapus/{id}', [AkunController::class, 'destroy'])->name('akun_delete');
    });

    Route::prefix('kelola_ikan')->group(function () {
        Route::get('index', [Kelola_ikanController::class, 'index'])->name('kelola_ikan');
        Route::get('tambah', [Kelola_ikanController::class, 'create'])->name('ikan_tambah');
        Route::POST('tambah', [Kelola_ikanController::class, 'store'])->name('ikan_tambah');
        Route::get('edit/{id_kelola_ikan}', [Kelola_ikanController::class, 'edit'])->name('ikan_edit');
        Route::POST('edit/{id_kelola_ikan}', [Kelola_ikanController::class, 'update'])->name('ikan_edit');
        Route::DELETE('hapus/{id_kelola_ikan}', [Kelola_ikanController::class, 'destroy'])->name('ikan_delete');
    });

    Route::prefix('master_stok')->group(function () {
        Route::get('index', [StokController::class, 'index'])->name('kelola_stok');
        Route::get('histori', [StokController::class, 'histori'])->name('histori');
        Route::get('tambah', [StokController::class, 'create'])->name('stok_tambah');
        Route::POST('tambah', [StokController::class, 'store'])->name('stok_tambah');
        Route::POST('ajax', [StokController::class, 'ajax_stok'])->name('ajax_stok');
        Route::get('edit/{id_stok}', [StokController::class, 'edit'])->name('stok_edit');
        Route::POST('edit/{id_stok}', [StokController::class, 'update'])->name('stok_edit');
        Route::DELETE('hapus/{id_stok}', [StokController::class, 'destroy'])->name('stok_delete');
    });

    Route::prefix('penjualan')->group(function () {
        Route::get('index', [PenjualanController::class, 'index'])->name('kelola_penjualan');
        Route::get('jual', [PenjualanController::class, 'create'])->name('jual');
        Route::POST('jual', [PenjualanController::class, 'store'])->name('jual');
        Route::POST('ajax', [PenjualanController::class, 'ajax_jual'])->name('ajax_jual');
        Route::get('histori', [PenjualanController::class, 'histori'])->name('histori_penjualan');
    });

    Route::prefix('laporan')->group(function () {
        Route::get('laporan', [LaporanController::class, 'laporan'])->name('laporan');
        Route::get('detail/{id_user}', [LaporanController::class, 'detail'])->name('detail');
    });
});
