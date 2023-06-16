<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Route untuk menampilkan daftar pasien
Route::get('/pasien', [PasienController::class, 'index'])->middleware('auth');

// Route untuk menampilkan form tambah pasien
Route::get('/pasien/create', [PasienController::class, 'create'])->middleware('auth');

// Route untuk memproses form tambah pasien
Route::post('/pasien', [PasienController::class, 'store'])->middleware('auth');

// Route untuk menampilkan daftar dokter
Route::get('/dokter', [DokterController::class, 'index'])->middleware('auth');

// Route untuk menampilkan form tambah dokter
Route::get('/dokter/create', [DokterController::class, 'create'])->middleware('auth');

// Route untuk memproses form tambah dokter
Route::post('/dokter', [DokterController::class, 'store'])->middleware('auth');

//Route untuk mengedit dokter
Route::get('/dokter/edit/{id}', [DokterController::class, 'edit'])->middleware('auth');

// Route untuk memproses edit dokter
Route::put('/dokter/{id}', [DokterController::class, 'update'])->middleware('auth');

// route delete dokter
Route::delete('/dokter', [DokterController::class, 'destroy'])->middleware('auth');


//Route untuk mengedit pasien  
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->middleware('auth');

// Route untuk memproses edit pasien
Route::put('/pasien/{id}', [PasienController::class, 'update'])->middleware('auth');

// route delete
Route::delete('/pasien', [PasienController::class, 'destroy'])->middleware('auth');

// main menu
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Auth::routes();

