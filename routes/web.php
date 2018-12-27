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

// untuk halaman awal
Route::get('/', 'ControllerMirabella@index');

// untuk login pelanggan
Route::get('/login', 'ControllerMirabella@login');
Route::post('/loginCek', 'ControllerMirabella@loginCek');

// untuk pelanggan
Route::resource('/pelanggan', 'ControllerPelanggan');

