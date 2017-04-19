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
	return view('master.index');
});

Route::get('/guest', function () {
    return view('pages.index', ['active' => '-', 'active2' => '-']);
});

Route::group(['prefix' => 'spare-part'], function () {
    Route::get('tabel', 'sparepartController@ShowSparepart');
    Route::get('insert', 'sparepartController@ShowInsertSparepart');
    Route::post('insert', 'sparepartController@InsertSparepart');
    Route::post('update/{id}','sparepartController@UpdateSparepart');
    Route::get('update/{id}', 'sparepartController@ShowUpdateSparepart');
    Route::get('delete/{id}','sparepartController@DeleteSparepart');
    Route::get('search','sparepartController@ShowSearchSparepart');
    Route::get('dropspare/{kendaraan}','sparepartController@dropdownSparepart');
    Route::get('ShowHasilPencarian/{id}','sparepartController@ShowHasilPencarian');

});

Route::group(['prefix' => 'ktransaksi'], function () {
    Route::get('form', 'ktransaksi@showForm');
    Route::post('store', 'ktransaksi@store');
    Route::get('delete/{id}', 'ktransaksi@delete');
    Route::get('edit/{id}', 'ktransaksi@edit');
    Route::post('update/{id}', 'ktransaksi@update');
});


Route::group(['prefix' => 'transaksi'], function () {
    Route::get('form', 'transaksi@showForm');
    Route::post('store', 'transaksi@store');
    Route::get('delete/{id}', 'transaksi@delete');
    Route::get('edit/{id}', 'transaksi@edit');
    Route::post('update/{id}', 'transaksi@update');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('form', 'booking@showForm');
    Route::post('store', 'booking@store');
    Route::get('delete/{id}', 'booking@delete');
    Route::get('edit/{id}', 'booking@edit');
    Route::post('update/{id}', 'booking@update');
});

Route::group(['prefix' => 'service'], function () {
    Route::get('tabel', 'servis@showTable');
    Route::get('form', 'servis@showForm');
    Route::post('store', 'servis@store');
    Route::get('delete/{id}', 'servis@delete');
    Route::get('edit/{id}', 'servis@edit');
    Route::post('update/{id}', 'servis@update');
});

Route::group(['prefix' => 'konsumen'], function () {
    Route::get('tabel', 'konsumen@showTable');
    Route::get('form', 'konsumen@showForm');
    Route::post('store', 'konsumen@store');
    Route::get('delete/{id}', 'konsumen@delete');
    Route::get('edit/{id}', 'konsumen@edit');
    Route::post('update/{id}', 'konsumen@update');
});

Route::group(['prefix' => 'jabatan'], function () {
    Route::get('tabel', 'jabatan@showTable');
    Route::get('form', 'jabatan@showForm');
    Route::post('store', 'jabatan@store');
    Route::get('delete/{id}', 'jabatan@delete');
    Route::get('edit/{id}', 'jabatan@edit');
    Route::post('update/{id}', 'jabatan@update');
});

Route::group(['prefix' => 'pegawai'], function () {
    Route::get('tabel', 'pegawai@showTable');
    Route::get('form', 'pegawai@showForm');
    Route::post('store', 'pegawai@store');
    Route::get('delete/{id}', 'pegawai@delete');
    Route::get('edit/{id}', 'pegawai@edit');
    Route::post('update/{id}', 'pegawai@update');
});
