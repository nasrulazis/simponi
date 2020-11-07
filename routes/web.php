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
Route::get('/', 'PagesController@index');
Route::get('/home', 'PagesController@login');
Route::get('/katalog', 'PagesController@katalog');
Route::get('/daftar', 'PagesController@daftar');
Route::get('/admin', 'PagesController@admin')->middleware('auth:penjual');

Route::post('/kirimdata', 'LoginController@login');
Route::get('/keluar', 'LoginController@logout');