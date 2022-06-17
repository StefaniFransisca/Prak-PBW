<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function(){
Route::get('/mhs', 'App\Http\Controllers\MahasiswaController@mahasiswa');
Route::get('/mhs/cari', 'App\Http\Controllers\MahasiswaController@pencarian');
Route::get('/mhs/formulirmhs', 'App\Http\Controllers\MahasiswaController@formulirmhs');
Route::post('/mhs/simpanmhs', 'App\Http\Controllers\MahasiswaController@simpanmhs');

Route::get('/mhs/editmhs/{id}', 'App\Http\Controllers\MahasiswaController@editmhs');
Route::put('/mhs/updatemhs/{id}', 'App\Http\Controllers\MahasiswaController@updatemhs');
Route::get('/mhs/hapusmhs/{id}', 'App\Http\Controllers\MahasiswaController@hapusmhs');

Route::get('/user', 'App\Http\Controllers\AuthController@user');
Route::get('/user/formuliruser', 'App\Http\Controllers\AuthController@formuliruser');
Route::post('/user/simpanuser', 'App\Http\Controllers\AuthController@simpanuser');
Route::get('/user/hapususer/{id}', 'App\Http\Controllers\AuthController@hapususer');
Route::get('/user/edituser/{id}', 'App\Http\Controllers\AuthController@edituser');
Route::put('/user/updateuser/{id}', 'App\Http\Controllers\AuthController@updateuser');
Route::get('/user/cari', 'App\Http\Controllers\AuthController@pencarian');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::get('/home', 'App\Http\Controllers\MahasiswaController@home');
});

Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/user/ceklogin', 'App\Http\Controllers\AuthController@ceklogin');
