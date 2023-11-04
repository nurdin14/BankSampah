<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampahController;
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

Route::get('/', function () {
    return view('welcome');
});

// pemasuk_sampah
Route::get('/sampah', [SampahController::class, 'index'])->name('sampah');
Route::post('/insertTrash', [SampahController::class, 'insertTrash'])->name('insertTrash');
Route::get('/editSampah/{id_sampah}', [SampahController::class, 'editSampah'])->name('editSampah');
Route::post('/updateSampah/{id_sampah}', [SampahController::class, 'updateSampah'])->name('updateSampah');
Route::get('/deleteSampah/{id_sampah}', [SampahController::class, 'deleteSampah'])->name('deleteSampah');

//transaksi_sampah
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');


