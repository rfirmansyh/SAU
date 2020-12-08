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

// dimas
Route::view('/ui/login', 'ui/login');

// furqon
Route::view('/ui/unitkerja', 'ui/unitkerja/index');

// Sintya
Route::view('/ui/unitkerja/show', 'ui/unitkerja/show');


// Auth::routes();
