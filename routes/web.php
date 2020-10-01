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
    return redirect('login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'lab-pengujian'], function () {
        Route::get('/', 'LabPengujianController@index')->name('lab-pengujian');
        Route::post('/insert-data', 'LabPengujianController@store')->name('lab-pengujian.insert-data');
        Route::get('/delete-data/{id}', 'LabPengujianController@destroy')->name('lab-pengujian.delete-data');
        Route::get('/edit-data/{id}', 'LabPengujianController@edit')->name('lab-pengujian.edit-data');
        Route::post('/update-data/{id}', 'LabPengujianController@update')->name('lab-pengujian.update-data');
        // EXPORT EXCEL
        Route::get('/export_excel', 'LabPengujianController@export_excel')->name('export_excel');
        // EXPORT PDF
        Route::get('/export_pdf', 'LabPengujianController@export_pdf')->name('export_pdf');

    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'lab-kalibrasi'], function () {
        Route::get('/', 'LabKalibrasiController@index')->name('lab-kalibrasi');
        Route::post('/insert-data', 'LabKalibrasiController@store')->name('lab-kalibrasi.insert-data');
        Route::get('/delete-data/{id}', 'LabKalibrasiController@destroy')->name('lab-kalibrasi.delete-data');
        Route::get('/edit-data/{id}', 'LabKalibrasiController@edit')->name('lab-kalibrasi.edit-data');
        Route::post('/update-data/{id}', 'LabKalibrasiController@update')->name('lab-kalibrasi.update-data');
        // EXPORT EXCEL
        Route::get('/export_excel', 'LabKalibrasiController@export_excel')->name('export_excel');
        // EXPORT PDF
        Route::get('/export_pdf', 'LabKalibrasiController@export_pdf')->name('export_pdf');

    });
});


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'data-eksternal'], function () {
        Route::get('/', 'DataEksternalController@index')->name('eksternal');
        Route::post('/insert-data', 'DataEksternalController@store')->name('eksternal.insert-data');
        Route::get('/delete-data/{id}', 'DataEksternalController@destroy')->name('eksternal.delete-data');
        Route::get('/edit-data/{id}', 'DataEksternalController@edit')->name('eksternal.edit-data');
        Route::post('/update-data/{id}', 'DataEksternalController@update')->name('eksternal.update-data');
        Route::get('/export_pdf', 'DataEksternalController@export_pdf')->name('export_pdf');

    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'master-data'], function () {
        Route::get('/', 'MasterDataController@index')->name('master-data');
        Route::post('/insert-data', 'MasterDataController@store')->name('master-data.insert-data');
        Route::get('/delete-data/{id}', 'MasterDataController@destroy')->name('master-data.delete-data');
        Route::get('/edit-data/{id}', 'MasterDataController@edit')->name('master-data.edit-data');
        Route::post('/update-data/{id}', 'MasterDataController@update')->name('master-data.update-data');
    });
});


// API FOR DATATABLE
Route::get('/get-table-pengujian', 'LabPengujianController@getTable')->name('get-table');
Route::get('/get-table-kalibrasi', 'LabKalibrasiController@getTable')->name('get-table');
Route::get('/get-data-eksternal', 'DataEksternalController@getTable')->name('get-table-data-eksternal');
Route::get('/get-master-data', 'MasterDataController@getTable')->name('get-table-master-data');
Route::get('/get-early-warning-data', 'MasterDataController@getEarlyWarning')->name('get-table-early-warning-data');
Route::get('/get-early-warning-data2', 'MasterDataController@getEarlyWarning2')->name('get-table-early-warning-data');

// EXPORT PDF IN EARLY WARNING SYSTEM
Route::get('/data-kalibrasi-pengujian/export_pdf', 'MasterDataController@kalibrasi_pengujian_export_pdf')->name('export_pdf');
Route::get('/data-kalibrasi/export_pdf', 'MasterDataController@kalibrasi_export_pdf')->name('export_pdf');


Route::get('/lab-kalibrasi', 'LabKalibrasiController@index')->name('lab-kalibrasi');
Route::get('/lap-data-peralatan', 'DataPeralatanController@index')->name('data-peralatan');
Route::get('/early-warning-system', 'MasterDataController@earlyWarning')->name('early-warning');

