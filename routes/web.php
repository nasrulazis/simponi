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
Route::get('/home', 'PagesController@login')->name('halamanLogin')->middleware('guest');
Route::get('/katalog', 'PagesController@katalog')->name('katalog')->middleware('auth:pembeli');
Route::get('/daftar', 'PagesController@daftar')->name('halamanDaftar')->middleware('guest');

Route::post('/kirimdata', 'LoginController@login')->name('login');
Route::get('/keluar', 'LoginController@keluar');
Route::post('/register', 'LoginController@postRegister')->name('register');
Route::get('/register', 'LoginController@getRegister');
Route::get('/reset', 'PagesController@reset')->name('reset');
Route::post('/chat', 'C_Chat@store')->name('chat');

//pembeli
Route::get('/pembeli', 'PagesController@pembeli')->name('pembeli')->middleware('auth:pembeli');
Route::get('/katalogPembeli', 'PagesController@katalogPembeli')->name('katalogPembeli')->middleware('auth:pembeli');
Route::get('/profil', 'C_Profil@index')->name('profil');
Route::post('/ubahprofil', 'C_Profil@update')->name('updateprofil');
Route::get('/pemesanan', 'C_Pemesanan@index')->name('pemesanan');
Route::post('/pemesanan', 'C_Pemesanan@store')->name('pemesanan');
Route::get('/checkoutPemesanan', 'C_Pemesanan@show')->name('checkoutpemesanan');
Route::post('/pembayaran', 'C_Pemesanan@update')->name('pembayaran');
Route::get('/pembayaran', 'C_Pemesanan@edit')->name('pembayaran');
Route::post('/buktipembayaran', 'C_Pemesanan@pembayaran')->name('buktipembayaran');
Route::get('/cekpemesanan', 'C_Pemesanan@cekpemesanan')->name('cekpemesanan');


//penjual
Route::get('/admin', 'PagesController@admin')->middleware('auth:penjual')->name('admin');
Route::get('/pencatatan', 'PagesController@pencatatan')->middleware('auth:penjual')->name('pencatatan');
Route::get('/editkatalogAdmin', 'C_KatalogTanaman@edit')->name('editkatalog');
Route::post('/editkatalogAdmin', 'C_KatalogTanaman@update')->name('editkatalog');
Route::get('/katalogAdmin', 'C_KatalogTanaman@katalogAdmin')->name('katalogadmin');
Route::get('/tambahkatalogAdmin', 'C_KatalogTanaman@tambahkatalogAdmin')->name('tambahKatalog');
Route::get('/tambahKatalog', 'C_KatalogTanaman@tambahKatalog');
Route::get('/hapusKatalog', 'C_KatalogTanaman@hapusKatalog');
Route::get('/hapusTanaman', 'C_PertumbuhanTanaman@destroy')->middleware('auth:penjual');
Route::get('/tambahPencatatan', 'C_PertumbuhanTanaman@create')->middleware('auth:penjual')->name('tambahPencatatan');
Route::post('/tambahTanaman', 'C_PertumbuhanTanaman@store')->middleware('auth:penjual');
Route::get('/editTanaman', 'C_PertumbuhanTanaman@edit')->middleware('auth:penjual')->name('editTanaman');
Route::post('/editTanaman', 'C_PertumbuhanTanaman@update')->middleware('auth:penjual')->name('editTanaman');
Route::get('/pemesananAdmin', 'C_PemesananAdmin@index')->middleware('auth:penjual')->name('pemesananAdmin');
Route::get('/verifikasi', 'C_PemesananAdmin@update')->middleware('auth:penjual')->name('verifikasi');
Route::get('/chat', 'C_ChatAdmin@index')->middleware('auth:penjual')->name('chatAdmin');
Route::post('/tambahChat', 'C_ChatAdmin@store')->middleware('auth:penjual')->name('tambahChat');



