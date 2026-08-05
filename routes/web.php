<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Mengarahkan halaman utama (/) ke DashboardController
Route::get('/', [DashboardController::class, 'index']);
Route::get('/data-pengaduan', [App\Http\Controllers\DashboardController::class, 'data']);
Route::get('/rekapitulasi', [App\Http\Controllers\DashboardController::class, 'rekapitulasi']);
Route::get('/profil-pelanggan', function () {
    return view('profil-pelanggan');
});
