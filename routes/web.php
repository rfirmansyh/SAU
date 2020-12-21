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

Route::view('/ui/', 'ui/index');

Route::view('/ui/login', 'ui/login');

// furqon
Route::view('/ui/unitkerja', 'ui/unitkerja/index');

// Sintya
Route::view('/ui/unitkerja/show', 'ui/unitkerja/show');

// dimas 
Route::view('/ui/profil', 'ui/profil');


Route::get('unitkerja', 'UnitkerjaController@index')->name('unitkerja.index');
// Route::get('unitkerja/{unitkerja}/kertaskerja', 'UnitkerjaController@kertasKerja')->name('unitkerja.kertasKerja');
Route::post('unitkerja', 'UnitkerjaController@store')->name('unitkerja.store');
Route::put('unitkerja/{unitkerja?}', 'UnitkerjaController@update')->name('unitkerja.update');

Route::get('kertaskerja/{unitkerja_id}', 'KertaskerjaController@index')->name('kertaskerja.index');
Route::post('kertaskerja/{unitkerja_id}', 'KertaskerjaController@store')->name('kertaskerja.store');

Route::get('ajax/unitKerjaById/{id?}', 'AjaxController@getUnitkerjaById')->name('ajax.unitKerjaById');
Route::get('ajax/kertaskerjas', 'AjaxController@getkertaskerjas')->name('ajax.kertaskerjas');
Route::get('ajax/kertaskerjas/{id?}', 'AjaxController@getKertaskerjaById')->name('ajax.getKertaskerjaById');


// Auth::routes();
