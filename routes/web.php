<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AngsuranController;

Route::get('/', function () {
    return view('welcome');
});

// Resource Routes untuk Sistem Koperasi
Route::resource('anggotas', AnggotaController::class);
Route::resource('simpanans', SimpananController::class);
Route::resource('pinjamans', PinjamanController::class);
Route::resource('angsurans', AngsuranController::class);