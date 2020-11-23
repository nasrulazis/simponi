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

Auth::routes();
//guest

Route::get('/', 'PagesController@index')->middleware('guest');
Route::get('/home', 'PagesController@login')->name('halamanLogin')->middleware('guest');
Route::get('/katalog', 'PagesController@katalog')->name('katalog')->middleware('auth:pembeli');
Route::get('/daftar', 'PagesController@daftar')->name('halamanDaftar')->middleware('guest');

Route::post('/kirimdata', 'LoginController@login')->name('login');
Route::get('/keluar', 'LoginController@keluar');
Route::post('/register', 'LoginController@postRegister')->name('register');
Route::get('/register', 'LoginController@getRegister');
Route::get('/reset', 'PagesController@reset')->name('reset');

//pembeli
Route::get('/pembeli', 'PagesController@pembeli')->name('pembeli')->middleware('auth:pembeli');
Route::get('/katalogPembeli', 'PagesController@katalogPembeli')->name('katalogPembeli')->middleware('auth:pembeli');
Route::get('/profil', 'C_Profil@index')->name('profil')->middleware('auth:pembeli');


//penjual
Route::get('/admin', 'PagesController@admin')->middleware('auth:penjual')->name('admin');
Route::get('/pencatatan', 'PagesController@pencatatan')->middleware('auth:penjual')->name('pencatatan');
Route::get('/katalogAdmin', 'C_KatalogTanaman@katalogAdmin');
Route::get('/tambahkatalogAdmin', 'C_KatalogTanaman@tambahkatalogAdmin')->name('tambahKatalog');
Route::get('/tambahKatalog', 'C_KatalogTanaman@tambahKatalog');
Route::get('/hapusKatalog', 'C_KatalogTanaman@hapusKatalog');
Route::get('/hapusTanaman', 'PagesController@hapusTanaman')->middleware('auth:penjual');
Route::get('/tambahPencatatan', 'PagesController@tambahPencatatan')->middleware('auth:penjual')->name('tambahPencatatan');
Route::get('/tambahTanaman', 'PagesController@tambahTanaman')->middleware('auth:penjual');



