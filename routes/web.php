<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

//Route untuk menampilkan daftar pasien
Route::get('/pasien', [PasienController::class, 'index']);

// Route untuk menampilkan form tambah pasien
Route::get('/pasien/create', [PasienController::class, 'create']);

// Route untuk memproses form tambah pasien
Route::post('/pasien', [PasienController::class, 'store']);

// Route untuk menampilkan daftar dokter
Route::get('/dokter', [DokterController::class, 'index']);

// Route untuk menampilkan form tambah dokter
Route::get('/dokter/create', [DokterController::class, 'create']);

// Route untuk memproses form tambah dokter
Route::post('/dokter', [DokterController::class, 'store']);

//Route untuk mengedit pasien  
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);

// Route untuk memproses edit pasien
Route::put('/pasien/{id}', [PasienController::class, 'update']);

// route delete
Route::delete('/pasien', [PasienController::class, 'destroy']);

// main menu
Route::get('/', [DashboardController::class, 'index']);