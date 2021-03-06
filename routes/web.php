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


Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index')->name('index');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/profile/decrypt', 'HomeController@decrypt')->name('profile.decrypt');
    Route::post('/profile/encrypt', 'HomeController@encrypt')->name('profile.encrypt');
    
    // UNIT KERJA
    Route::get('unitkerja', 'UnitkerjaController@index')->name('unitkerja.index');
    Route::post('unitkerja', 'UnitkerjaController@store')->name('unitkerja.store');
    Route::put('unitkerja/{unitkerja?}', 'UnitkerjaController@update')->name('unitkerja.update');

    // KERTAS KERJA
    Route::get('kertaskerja/{unitkerja_id?}', 'KertaskerjaController@index')->name('kertaskerja.index');
    Route::post('kertaskerja/{unitkerja_id}', 'KertaskerjaController@store')->name('kertaskerja.store');
    Route::put('kertaskerja/update/{kertaskerja_id?}', 'KertaskerjaController@update')->name('kertaskerja.update');
    Route::delete('kertaskerja/delete/{kertaskerja_id?}', 'KertaskerjaController@delete')->name('kertaskerja.delete');

    // DTM
    Route::get('dtm', 'KertaskerjaController@dtm')->name('kertaskerja.dtm.index');

    Route::get('ajax/unitKerjaById/{id?}', 'AjaxController@getUnitkerjaById')->name('ajax.unitKerjaById');
    Route::get('ajax/kertaskerjas/{unitkerja_id}', 'AjaxController@getkertaskerjas')->name('ajax.kertaskerjas');
    Route::get('ajax/dtm/{unitkerja_id}', 'AjaxController@getDtm')->name('ajax.dtm');
    Route::get('ajax/kertaskerjas/detail/{id?}', 'AjaxController@getKertaskerjaById')->name('ajax.getKertaskerjaById');
});


// Auth::routes();
