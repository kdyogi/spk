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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::group(['middleware' => ['verified']], function () {
Route::get('/', 'PagesController@index');

// Kriteria
Route::get('/view/kriteria', 'KriteriaController@index');
Route::get('/insert/kriteria', 'KriteriaController@create');
Route::post('/kriteria', 'KriteriaController@store');
Route::get('/delete/kriteria/{id}', 'KriteriaController@destroy');
Route::post('/update/kriteria/{id}', 'KriteriaController@update');

// Alternatif
Route::get('/view/alternatif', 'AlternatifController@default');
Route::get('/view/alternatif/user', 'AlternatifController@index')->middleware('leveluser');
Route::get('/insert/alternatif', 'AlternatifController@create');
Route::post('/alternatif', 'AlternatifController@store');
Route::get('/delete/alternatif/{id}', 'AlternatifController@destroy');
Route::post('/update/alternatif/{id}', 'AlternatifController@update');


// Pengguna
Route::get('/insert/pengguna', 'PenggunaController@create');
Route::post('/insert', 'PenggunaController@store')->name('insert.pengguna');
Route::get('/view/pengguna', 'PenggunaController@index');
Route::get('/delete/pengguna/{id}', 'PenggunaController@destroy');
Route::post('/update/pengguna/{id}', 'PenggunaController@update');
Route::post('/update/user/{id}', 'PenggunaController@userUpdate');

// Perhitungan
Route::group(['prefix' => 'perhitungan'], function () {
    Route::get('/', 'PerhitunganController@index');
    Route::get('/default', 'PerhitunganController@default');
});

Route::group(['prefix' => 'evaluasi'], function () {
    Route::post('store', 'NilaiEvaluasiController@store');
    Route::post('/nilai/{id}', 'NilaiEvaluasiController@updateDefault');
});
// });

// Route::get('/insert/kriteria', function () {
//     return view('admin/insert/kriteria');
// });

Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
