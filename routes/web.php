<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaKelasController;
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
    return view('dashboard');
});

Route::resource('siswa', SiswaController::class);
Route::resource('kelas', KelasController::class);


Route::get('/siswa-with-class', [SiswaKelasController::class, 'siswaWithClass'])->name('siswa.withClass');

// Routing untuk menampilkan semua kelas beserta jumlah siswa (LEFT JOIN)
Route::get('/kelas-with-siswa', [SiswaKelasController::class, 'kelasWithSiswa'])->name('kelas.withSiswa');