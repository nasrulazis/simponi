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


//guest

Route::get('/', 'PagesController@index')->middleware('guest');
Route::get('/katalog', 'KatalogTanaman@katalog')->name('katalog')->middleware('auth:pembeli');
Route::get('/daftar', 'PagesController@daftar')->name('halamanDaftar')->middleware('guest');

Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login')->name('login')->middleware('guest');
Route::get('/keluar', 'LoginController@keluar');
Route::post('/register', 'LoginController@postRegister')->name('register');
Route::get('/register', 'LoginController@getRegister');
Route::get('/reset', 'PagesController@reset')->name('reset');
Route::post('/chat', 'Chats@store')->name('chat');

//pembeli
Route::get('/pembeli', 'PagesController@pembeli')->name('pembeli')->middleware('auth:pembeli');
Route::get('/katalogPembeli', 'PagesController@katalogPembeli')->name('katalogPembeli')->middleware('auth:pembeli');
Route::get('/profil', 'Profil@index')->name('profil');
Route::post('/ubahprofil', 'Profil@update')->name('updateprofil');
Route::get('/pemesanan', 'Pemesanans@index')->name('pemesanan');
Route::post('/pemesanan', 'Pemesanans@store')->name('pemesanan');
Route::get('/checkoutPemesanan', 'Pemesanans@show')->name('checkoutpemesanan');
Route::post('/pembayaran', 'Pemesanans@update')->name('pembayaran');
Route::get('/pembayaran', 'Pemesanans@edit')->name('pembayaran');
Route::post('/buktipembayaran', 'Pemesanans@pembayaran')->name('buktipembayaran');
Route::get('/cekpemesanan', 'Pemesanans@cekpemesanan')->name('cekpemesanan');
Route::post('/selesaikanpemesanan', 'Pemesanans@selesaikanpemesanan')->name('selesaikanpemesanan');


//penjual
Route::get('/admin', 'PagesController@admin')->middleware('auth:penjual')->name('admin');
Route::get('/pencatatan', 'PagesController@pencatatan')->middleware('auth:penjual')->name('pencatatan');
Route::get('/editkatalogAdmin', 'KatalogTanaman@edit')->middleware('auth:penjual')->name('editkatalog');
Route::post('/editkatalogAdmin', 'KatalogTanaman@update')->middleware('auth:penjual')->name('editkatalog');
Route::get('/katalogAdmin', 'KatalogTanaman@katalogAdmin')->middleware('auth:penjual')->name('katalogadmin');
Route::get('/tambahkatalogAdmin', 'KatalogTanaman@tambahkatalogAdmin')->middleware('auth:penjual')->name('tambahKatalog');
Route::get('/tambahKatalog', 'KatalogTanaman@tambahKatalog')->middleware('auth:penjual');
Route::get('/hapusKatalog', 'KatalogTanaman@hapusKatalog')->middleware('auth:penjual');
Route::get('/hapusTanaman', 'PertumbuhanTanaman@destroy')->middleware('auth:penjual');
Route::get('/tambahPencatatan', 'PertumbuhanTanaman@create')->middleware('auth:penjual')->name('tambahPencatatan');
Route::post('/tambahTanaman', 'PertumbuhanTanaman@store')->middleware('auth:penjual');
Route::get('/editTanaman', 'PertumbuhanTanaman@edit')->middleware('auth:penjual')->name('editTanaman');
Route::post('/editTanaman', 'PertumbuhanTanaman@update')->middleware('auth:penjual')->name('editTanaman');
Route::get('/pemesananAdmin', 'PemesananAdmin@index')->middleware('auth:penjual')->name('pemesananAdmin');
Route::get('/verifikasi', 'PemesananAdmin@update')->middleware('auth:penjual')->name('verifikasi');
Route::get('/chat', 'ChatAdmin@index')->middleware('auth:penjual')->name('chatAdmin');
Route::post('/tambahChat', 'ChatAdmin@store')->middleware('auth:penjual')->name('tambahChat');



