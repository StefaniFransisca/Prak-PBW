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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mhs/all', 'App\Http\Controllers\MahasiswaAPIController@all');
Route::get('/mhs/create', 'App\Http\Controllers\MahasiswaAPIController@create');
Route::post('/mhs/update/{id}', 'App\Http\Controllers\MahasiswaAPIController@update');
Route::post('/mhs/update', 'App\Http\Controllers\MahasiswaAPIController@update2');
Route::delete('/mhs/delete/{id}', 'App\Http\Controllers\MahasiswaAPIController@delete');