<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    // pemasuk_sampah
    Route::get('/sampah', [SampahController::class, 'index'])->name('sampah');
    Route::post('/insertTrash', [SampahController::class, 'insertTrash'])->name('insertTrash');
    Route::get('/editSampah/{id_sampah}', [SampahController::class, 'editSampah'])->name('editSampah');
    Route::post('/updateSampah/{id_sampah}', [SampahController::class, 'updateSampah'])->name('updateSampah');
    Route::get('/deleteSampah/{id_sampah}', [SampahController::class, 'deleteSampah'])->name('deleteSampah');

    //transaksi_sampah
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::post('/insertTransaksi', [TransaksiController::class, 'insertTransaksi'])->name('insertTransaksi');
    Route::get('/deleteTransaksi/{id_transaksi}', [TransaksiController::class, 'deleteTransaksi'])->name('deleteTransaksi');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    //client
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::post('/insertTransaksi', [PenggunaController::class, 'insertTransaksi'])->name('insertTransaksi');

});