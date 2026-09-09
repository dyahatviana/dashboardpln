<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


// LANDING PAGE
Route::get('/', function () {
    return view('landingpage.index');
});


// LOGIN - TAMPILAN
Route::get('/login', function () {
    return view('auth.login');
});


// LOGIN - PROSES
Route::post('/login', function () {
    return redirect('/dashboard');
});


// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index']);


// DATA PENGADUAN
Route::get('/data-pengaduan', [DashboardController::class, 'data']);


// REKAPITULASI
Route::get('/rekapitulasi', [DashboardController::class, 'rekapitulasi']);


// PROFIL
Route::get('/profil-pelanggan', function () {
    return view('profil-pelanggan');
});
