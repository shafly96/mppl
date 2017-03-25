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
	return view('pages.index', ['active' => '', 'active2' => '']);
});

Route::group(['prefix' => 'spare-part'], function () {
    Route::get('tabel', 'sparepartController@ShowSparepart');
    Route::get('insert', 'sparepartController@ShowInsertSparepart');
		Route::post('insert', 'sparepartController@InsertSparepart');
		Route::post('update/{id}','sparepartController@UpdateSparepart');
		Route::get('update/{id}', 'sparepartController@ShowUpdateSparepart');
		Route::get('delete/{id}','sparepartController@DeleteSparepart');

});


Route::group(['prefix' => 'transaksi'], function () {
    Route::get('tabel', function ()    {
        return view('pages.transaksi.tabel', ['active' => 'transaksi', 'active2' => 'tabel']);
    });
    Route::get('form', function ()    {
        return view('pages.transaksi.form', ['active' => 'transaksi', 'active2' => 'form']);
    });
});

Route::group(['prefix' => 'service'], function () {
    Route::get('tabel', function ()    {
        return view('pages.service.tabel', ['active' => 'service', 'active2' => 'tabel']);
    });
    Route::get('form', function ()    {
        return view('pages.service.form', ['active' => 'service', 'active2' => 'form']);
    });
});

Route::group(['prefix' => 'konsumen'], function () {
    Route::get('tabel', function ()    {
        return view('pages.konsumen.tabel', ['active' => 'konsumen', 'active2' => 'tabel']);
    });
    Route::get('form', function ()    {
        return view('pages.konsumen.form', ['active' => 'konsumen', 'active2' => 'form']);
    });
});

Route::group(['prefix' => 'pegawai'], function () {
    Route::get('tabel', function ()    {
        return view('pages.pegawai.tabel', ['active' => 'pegawai', 'active2' => 'tabel']);
    });
    Route::get('form', function ()    {
        return view('pages.pegawai.form', ['active' => 'pegawai', 'active2' => 'form']);
    });
});
