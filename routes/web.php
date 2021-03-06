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
    return redirect()->route('login.index');
});

Route::get('login/signout', 'LoginController@signout')->name('login.signout');
Route::resource('login', 'LoginController');

Route::resource('dashboard', 'DashboardController');

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

Route::resource('jadwal-siswa', 'JadwalSiswaController');
Route::post('jadwal-siswa/siswa', 'JadwalSiswaController@siswa')->name('jadwal-siswa.siswa');
Route::get('jadwal-siswa/destroy/{id}', 'JadwalSiswaController@destroy')->name('jadwal-siswa.destroy');

Route::resource('report', 'ReportController');
Route::get('report/report/{mapel_id}', 'ReportController@report')->name('report.report');
Route::post('report/kelas', 'ReportController@kelas')->name('report.kelas');
Route::post('report/siswa', 'ReportController@siswa')->name('report.siswa');

Route::resource('role-access', 'RoleAccessController');
Route::get('role-access/destroy/{id}', 'RoleAccessController@destroy')->name('role-access.destroy');

Route::resource('access', 'AccessController');
Route::get('access/destroy/{id}', 'AccessController@destroy')->name('access.destroy');

Route::resource('user', 'UserController');
Route::get('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
Route::post('user/siswa', 'UserController@siswa')->name('user.siswa');
Route::post('user/guru', 'UserController@guru')->name('user.guru');
Route::post('user/user', 'UserController@user')->name('user.user');
