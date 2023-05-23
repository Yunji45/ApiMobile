<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PengirimanController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//new
Route::post('login', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout']);
Route::post('/register', [RegisterController::class, 'register']);

//user
Route::get('/user/list' , [UserController::class,'index']);
Route::post('/user/tambah', [UserController::class,'store']);
Route::post('user/update/{id}', [UserController::class,'update']);
Route::post('/user/hapus/{id}',[UserController::class,'destroy']);

//barang
Route::get('/barang/list' , [BarangController::class,'index']);
Route::post('/barang/tambah', [BarangController::class,'store']);
Route::post('/barang/update/{id}', [BarangController::class,'update']);
Route::post('/barang/hapus/{id}',[BarangController::class,'destroy']);

//lokasi
Route::get('/lokasi/list' , [LokasiController::class,'index']);
Route::post('/lokasi/tambah', [LokasiController::class,'store']);
Route::post('/lokasi/update/{id}', [LokasiController::class,'update']);
Route::post('/lokasi/hapus/{id}',[LokasiController::class,'destroy']);

//pengiriman
Route::get('/pengiriman/list' , [PengirimanController::class,'index']);
Route::post('/pengiriman/tambah', [PengirimanController::class,'store']);

//verifikasi
Route::get('/pengiriman/kirim/{id}' , [PengirimanController::class,'confirmasi']);


