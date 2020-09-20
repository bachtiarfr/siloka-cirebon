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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'lab-pengujian'], function () {
        Route::get('/', 'LabPengujianController@index')->name('lab-pengujian');
        Route::post('/insert-data', 'LabPengujianController@store')->name('lab-pengujian.insert-data');
        Route::get('/delete-data/{id}', 'LabPengujianController@destroy')->name('lab-pengujian.delete-data');
        Route::get('/edit-data/{id}', 'LabPengujianController@edit')->name('lab-pengujian.edit-data');
        Route::post('/update-data/{id}', 'LabPengujianController@update')->name('lab-pengujian.update-data');
    
    });
});
Route::get('/lab-pengujian', 'LabPengujianController@index')->name('lab-pengujian');
Route::get('/get-table-pengujian', 'LabPengujianController@getTable')->name('get-table');
Route::get('/lab-kalibrasi', 'LabKalibrasiController@index')->name('lab-kalibrasi');
Route::get('/lap-data-peralatan', 'DataPeralatanController@index')->name('data-peralatan');
Route::get('/early-warning-system', 'EarlyWarningController@index')->name('early-warning');

