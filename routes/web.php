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

Auth::routes([
    'register' => false
]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('barang/all', 'BarangController@all')->name('barang:dt');
Route::match(['put', 'patch'], 'barang/ambil/{id}', 'BarangController@ambilBarang')->name('barang.ambil');
Route::resource('barang', 'BarangController');
Route::resource('rekap', 'RekapController');
