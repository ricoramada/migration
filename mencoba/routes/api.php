<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/simpan_petugas','petugascontroller@store');
Route::post('/simpan_siswa','siswacontroller@store');
Route::post('/simpan_pelanggaran','pelanggarancontroller@store');

Route::put('/update/{id}','petugascontroller@update');
Route::put('/update_pelanggaran/{id}','pelanggarancontroller@update');
Route::put('/update_siswa/{id}','siswacontroller@update');

Route::delete('/hapus/{id}','petugascontroller@destroy');
Route::delete('/hapus_pelanggaran/{id}','pelanggarancontroller@destroy');
Route::delete('/hapus_siswa/{id}','siswacontroller@destroy');

Route::get('/tampil','petugascontroller@tampil_petugas');
Route::get('/tampil_siswa','siswacontroller@tampil_siswa');
Route::get('/tampil_pelanggaran','pelanggarancontroller@tampil_pelanggaran');

//poin
Route::get('/poin','siswacontroller@poin');
//dashboard
Route::get('/dashboard','dashboard@data');
//Create poin
Route::get('/detail','poincontroller@store');
//Lihat poin
Route::get('/lihat','pelanggarancontroller@lihatpoin');
