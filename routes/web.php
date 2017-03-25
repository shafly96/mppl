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
    Route::get('tabel', function ()    {
        return view('pages.spare-part.tabel', ['active' => 'spare-part', 'active2' => 'tabel']);
    });
    Route::get('form', function ()    {
        return view('pages.spare-part.form', ['active' => 'spare-part', 'active2' => 'form']);
    });
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
    Route::get('tabel', 'servis@showTable');
    Route::get('form', 'servis@showForm');
    Route::post('store', 'servis@store');
    Route::get('delete/{id}', 'servis@delete');
    Route::get('edit/{id}', 'servis@edit');
    Route::post('update/{id}', 'servis@update');
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
