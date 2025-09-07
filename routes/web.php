<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\presensi\PresensiController;
use App\Http\Controllers\QrController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // kasih nama biar redirect auth otomatis tahu
Route::post('/login', [loginController::class, 'userLogin'])->name('login.user');
// Semua route di bawah hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {

    Route::get('/', [PresensiController::class, 'index']);

    Route::get('/riwayat-absen', [PresensiController::class, 'riwayat']);
    Route::get('/profile', [KaryawanController::class, 'profile']);
    // FORM
    Route::post('checkin', [PresensiController::class, 'checkIn'])->name('presensi.checkin');
    Route::get('/download-qr', [QrController::class, 'download'])->name('download.qr');
});

// admin
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function(){
        return view('admin.index');
    });
    Route::get('/karyawan', [KaryawanController::class, 'index']);
    Route::get('/karyawan/create', function(){
        return view('admin.karyawan.store');
    });

    // FORM
    Route::post('/karyawn/create', [KaryawanController::class,'create'])->name('karyawan.store');
});

