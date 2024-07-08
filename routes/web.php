<?php

use App\Http\Controllers\DataACController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('halaman');
});

// Routes for account
Route::prefix('account')->group(function () {
    // Guest middleware
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    // Authenticated middleware
    Route::middleware('auth')->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
});
Route::resource('alternatif', AlternatifController::class)->except([
    'store', 'edit', 'update', 'destroy'
]);

Route::get('alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
Route::post('alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::get('alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
Route::put('alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::delete('alternatif/{id}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

// perhitugan routes
Route::get('perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
Route::get('perhitungan/normalisasi', [PerhitunganController::class, 'normalisasi'])->name('perhitungan.normalisasi');
Route::get('perhitungan/terbobot', [PerhitunganController::class, 'terbobot'])->name('perhitungan.terbobot');
Route::get('perhitungan/solusi-ideal', [PerhitunganController::class, 'solusiIdeal'])->name('perhitungan.solusi_ideal');
Route::get('perhitungan/jarak-solusi-ideal', [PerhitunganController::class, 'jarakSolusiIdeal'])->name('perhitungan.jarak_solusi_ideal');
Route::get('perhitungan/nilai-preferensi', [PerhitunganController::class, 'nilaiPreferensi'])->name('perhitungan.nilai_preferensi');

// Routes for Kriteria
Route::resource('kriteria', KriteriaController::class)->except([
    'store', 'edit', 'update', 'destroy'
]);
Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('kriteria/{id}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::put('kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::delete('kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
