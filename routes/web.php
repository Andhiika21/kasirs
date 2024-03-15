<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ChartjsController;
use App\Http\Controllers\FaktureController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenjualanDetailController;
use App\Http\Controllers\TransaksidetailController;

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
    Route::get('/home', [AuthController::class, 'home']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/superadmin', [SuperadminController::class, 'index']);
    Route::get('/dashboard', [LaporanController::class, 'dashboard']);
    Route::resource('/laporan', LaporanController::class);
    Route::resource('/user', UserController::class);
});

Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::resource('/barang', BarangController::class);
    Route::get('/search', [BarangController::class, 'search'])->name('search');

});

Route::group(['middleware' => ['auth', 'checkrole:1,3']], function() {
   
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/transaksi/detail/delete', [TransaksidetailController::class, 'delete']);
Route::post('/transaksi/detail/create', [TransaksidetailController::class, 'create']);
Route::post('/transaksi/detail/kirim', [TransaksidetailController::class, 'kirim']);
Route::get('/datatransaksi', [TransaksiController::class, 'datatransaksi']);
Route::resource('/fakture', faktureController::class);
Route::resource('/pengeluaran', PengeluaranController::class);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/pegawai', [PegawaiController::class, 'index']);
});

// untuk kasir
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/kasir', [KasirController::class, 'index']);
});

Route::get('/hh', [KasirController::class, 'hh']);
// Route::get('/barang', [BarangController::class, 'index']);
// Route::get('/barang/create', [BarangController::class, 'create'])->name('barang');
// Route::post('/barang/create', [BarangController::class, 'barangpost'])->name('barang');



// Route::get('/transaksi', [BarangController::class, 'transaksi']);
// Route::post('/transaksi', [BarangController::class, 'transaksipost']);





Route::get('/searcht', [TransaksiController::class, 'searcht'])->name('searcht');

// Route::get('fakture/', [TransaksidetailController::class, 'fakture']);

// Route::get('laporandetail', [LaporanController::class, 'laporandetail']);



Route::get('chart', [ChartjsController::class, 'index']);

Route::get('/registrasi', [SuperadminController::class, 'registrasi']);
Route::post('/registrasi',[SuperadminController::class, 'registrasipost']);
