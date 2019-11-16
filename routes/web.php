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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;


Route::prefix('user')->group(function(){
    Route::get('/', 'UserController@index')->name('user')->middleware('auth');;
    Route::post('/simpan', 'UserController@simpan');
    Route::get('/edit/{id}', 'UserController@edit');
    Route::post('/update/{id}', 'UserController@update');
    Route::get('/delete/{id}', 'UserController@delete');
});

Route::prefix('mahasiswa')->group(function(){
    Route::get('/', 'MahasiswaController@index')->name('member')->middleware('auth');;
    Route::post('/simpan', 'MahasiswaController@simpan');
    Route::get('/edit/{id}', 'MahasiswaController@edit');
    Route::post('/update/{id}', 'MahasiswaController@update');
    Route::get('/delete/{id}', 'MahasiswaController@delete');
    Route::get('/cek/{id}', 'MahasiswaController@cek');
    Route::put('/verifikasi/{id}', 'MahasiswaController@verifikasi');
});

Route::prefix('universitas')->group(function(){
    Route::get('/', 'UniversitasController@index')->name('universitas')->middleware('auth');;
    Route::post('/simpan', 'UniversitasController@simpan');
    Route::get('/edit/{id}', 'UniversitasController@edit');
    Route::post('/update/{id}', 'UniversitasController@update');
    Route::get('/delete/{id}', 'UniversitasController@delete');
});

Route::prefix('prestasi')->group(function(){
    Route::get('/', 'BeaPrestasiController@index')->name('prestasi')->middleware('auth');;
    Route::get('/upload', 'BeaPrestasiController@upload');
    Route::post('/simpan', 'UniversitasController@simpan');
    Route::get('/edit/{id}', 'UniversitasController@edit');
    Route::post('/update/{id}', 'UniversitasController@update');
    Route::get('/delete/{id}', 'UniversitasController@delete');
});

Route::prefix('nonprestasi')->group(function(){
    Route::get('/', 'BeanonPrestasiController@index')->name('nonprestasi')->middleware('auth');;
    Route::post('/simpan', 'UniversitasController@simpan');
    Route::get('/edit/{id}', 'UniversitasController@edit');
    Route::post('/update/{id}', 'UniversitasController@update');
    Route::get('/delete/{id}', 'UniversitasController@delete');
});
