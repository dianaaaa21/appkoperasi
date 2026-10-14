<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AngsuranController;
>>>>>>> 0fa895ae36902599827d3e588e0a2695905a5ba7

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======

// Resource Routes untuk Sistem Koperasi
Route::resource('anggotas', AnggotaController::class);
Route::resource('simpanans', SimpananController::class);
Route::resource('pinjamans', PinjamanController::class);
Route::resource('angsurans', AngsuranController::class);
>>>>>>> 0fa895ae36902599827d3e588e0a2695905a5ba7
