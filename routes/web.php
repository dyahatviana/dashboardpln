<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// LANDING PAGE
Route::get('/', function () {
    return view('landingpage.index');
});


// LOGIN - TAMPILAN
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// LOGIN - PROSES
Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
});


// LOGOUT
Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->middleware('auth');


// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth');


// DATA PENGADUAN
Route::get('/data-pengaduan', [DashboardController::class, 'data']);


// REKAPITULASI
Route::get('/rekapitulasi', [DashboardController::class, 'rekapitulasi']);


// PROFIL
Route::get('/profil-pelanggan', function () {
    return view('profil-pelanggan');
});
