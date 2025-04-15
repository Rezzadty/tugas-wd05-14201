<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/login', [DashboardController::class, 'login']);
Route::get('/register', [DashboardController::class, 'register']);
Route::get('/dokter', [DashboardController::class, 'dokter']);
//Route::get('/dokter/obat', [DashboardController::class, 'obat']);
Route::get('/dokter/periksa', [DashboardController::class, 'dokterperiksa']);
Route::get('/pasien', [DashboardController::class, 'pasien']);
Route::get('/pasien/periksa', [DashboardController::class, 'pasienperiksa']);
Route::get('/pasien/riwayat', [DashboardController::class, 'pasienriwayat']);
Route::get('/dokter/obat', [ObatController::class, 'index'])->name('dokter.obat');
Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
Route::get('/dokter/obat/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
Route::delete('/dokter/obat/{id}', [ObatController::class, 'delete'])->name('dokter.obat.delete');