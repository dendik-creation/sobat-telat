<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);

    // Data Siswa Route
    Route::get('data-siswa', [SiswaController::class, 'index']);
    Route::get('data-siswa/cetak', [SiswaController::class, 'cetak']);
    Route::post('data-siswa/import', [SiswaController::class, 'importData']);
    Route::get('data-siswa/export', [SiswaController::class, 'exportData']);
    Route::post('data-siswa', [SiswaController::class, 'store']);
    Route::delete('data-siswa/{id}', [SiswaController::class, 'destroy']);
    Route::get('data-siswa/{id}', [SiswaController::class, 'show']);
    Route::put('data-siswa/{id}', [SiswaController::class, 'update']);
    Route::post('data-siswa/update-kelas', [SiswaController::class, 'updateKelas']);

    // Data Terlambat (Transaksi) Route
    Route::get('data-terlambat', [TransaksiController::class, 'index']);
    Route::get('tambah-terlambat', [TransaksiController::class, 'tambah']);
    Route::post('send-terlambat', [TransaksiController::class, 'store']);
    Route::get('cetak-terlambat/{id}', [TransaksiController::class, 'print']);
    Route::get('export-terlambat', [TransaksiController::class, 'export']);

    // AJAX Request Routes
    Route::get('kelas', [KelasController::class, 'index']);
    Route::get('check-nis', [TransaksiController::class, 'checkNis']);

    // UserLogin Routes
    Route::get('/my-profile', [AuthController::class, 'whoLogin']);
    Route::get('/check-pw', [AuthController::class, 'checkPw']);
    Route::put('/new-pw', [AuthController::class, 'newPw']);
    Route::put('/my-profile', [AuthController::class, 'update']);
});
