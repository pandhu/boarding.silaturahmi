<?php

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
Route::get('/selamat-datang', function () {
    return view('selamat-datang');
});
Route::get('_search', 'BaseController@_search');
Route::post('_cancel', 'BaseController@_cancel');
Route::post('_konfirmasi', 'BaseController@_konfirmasi');
Route::get('/list', 'BaseController@listPeserta');
Route::get('/total-peserta', 'BaseController@totalPeserta');
