<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization');

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EksekutifController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\API\PerusahaanMitraController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



Route::group(['middleware' => 'cors'], function () {
    //Eksekutif
    Route::get('get-data-dashboard-eksekutif', [EksekutifController::class, 'getDataDashboardEksekutif']);

    //Penyelenggara
    Route::get('get-data-dashboard-penyelenggara', [PenyelenggaraController::class, 'getDataDashboardPenyelenggara']);
});

//Peserta

//Evaluator

//mitra
Route::get('perusahaan-mitra', [PerusahaanMitraController::class, 'getDataPerusahaanMitra']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::group(['namespace' => 'Galeria', 'prefix' => 'galeria'], function () {
    Route::get('kategori-keahlian', [\App\Http\Controllers\API\GaleriaController::class, 'getKategoriKeahlian']);
    Route::get('kompetensi-keahlian/{id}', [\App\Http\Controllers\API\GaleriaController::class, 'getKompetensiKeahlianFilterById']);
    Route::get('kompetensi-keahlian/{idKategori}', [\App\Http\Controllers\API\GaleriaController::class, 'getKompetensiKeahlianFilterByKategori']);
});

Route::group(['namespace' => 'PelatihanMandiri', 'prefix' => 'pelatihan-mandiri'], function () {
});



//API route for register new user
// Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
// //API route for login user
// Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/profile', function(Request $request) {
//         return auth()->user();
//     });

//     // API route for logout user
//     Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
// });


// Route::resource('/penyelenggara', '\App\Http\Controllers\PenyelenggaraController');
// Route::resource('/user', '\App\Http\Controllers\UserController');
// Route::resource('/eksekutif', '\App\Http\Controllers\EksekutifController');
// Route::resource('/evaluasi', '\App\Http\Controllers\UserController');

// Route::get('/jumlah-diklat', [PenyelenggaraController::class, 'jDiklat'])->name('jDiklat');
// Route::get('/jumlah-diklat-berjalan', [PenyelenggaraController::class, 'jDiklatBerjalan'])->name('jDiklatBerjalan');
// Route::get('/jumlah-diklat-selesai', [PenyelenggaraController::class, 'jDiklatSelesai'])->name('jDiklatSelesai');
// Route::get('/rasio-diklat-berjalan-dan-selesai', [PenyelenggaraController::class, 'rasioPerbandinganDiklat'])->name('rasioPerbandinganDiklat');
// Route::get('/rasio-peserta-per-provinsi', [PenyelenggaraController::class, 'rasioPerbandinganPeserta'])->name('rasioPerbandinganPeserta');

// Route::get('/kegiatan-diklat-yang-telah-diikuti',[UserController::class, 'diklatSelesai'])->name('diklatSelesai');
// Route::get('/sertifikat-pelatihan',[UserController::class, 'sertifikatPelatihan'])->name('sertifikatPelatihan');
// Route::get('/statistik-kehadiran', [UserController::class, 'statistikKehadiran'])->name('statistikKehadiran');