<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::put('user/{id_user}', 'API\UserController@update');

Route::post('test', 'API\LoginController@test');
Route::post('login', 'API\LoginController@login');

Route::get('jadwal/{jadwal_kelas}', 'API\JadwalController@jadwal');
Route::get('siswa/{jadwal_kelas}', 'API\JadwalController@siswa');

Route::get('report/uh/{siswa_id}', 'API\ReportController@reportUH');
Route::get('report/uts/{siswa_id}', 'API\ReportController@reportUTS');
Route::get('report/uas/{siswa_id}', 'API\ReportController@reportUAS');

Route::get('tagihan/{siswa_id}', 'API\TagihanController@tagihan');
Route::get('riwayat/{siswa_id}', 'API\TagihanController@riwayat');


