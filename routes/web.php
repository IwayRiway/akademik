<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestController;

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

Route::resource('test', 'TestController');

Route::get('siswa', 'SiswaController@index')->name('siswa.index');
Route::get('siswa/show/{id}', 'SiswaController@show')->name('siswa.show');

Route::resource('mapel', 'MapelController');
Route::get('mapel/destroy/{id}', 'MapelController@destroy')->name('mapel.destroy');

Route::resource('guru', 'GuruController');
Route::get('guru/destroy/{id}', 'GuruController@destroy')->name('guru.destroy');

Route::resource('jam-pelajaran', 'JamPelajaranController');
Route::get('jam-pelajaran/destroy/{id}', 'JamPelajaranController@destroy')->name('jam-pelajaran.destroy');

Route::resource('jadwal', 'JadwalController');
Route::get('jadwal/destroy/{id}', 'JadwalController@destroy')->name('jadwal.destroy');

Route::resource('jadwal-pelajaran', 'JadwalPelajaranController');
Route::post('jadwal-pelajaran/jadwal', 'JadwalPelajaranController@jadwal')->name('jadwal-pelajaran.jadwal');
Route::get('jadwal-pelajaran/detail/{id}', 'JadwalPelajaranController@detail')->name('jadwal-pelajaran.detail');
Route::post('jadwal-pelajaran/store-detail', 'JadwalPelajaranController@store_detail')->name('jadwal-pelajaran.store-detail');
