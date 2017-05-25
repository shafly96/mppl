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
	if(!Auth::check()) return view('master.index');
	else return Redirect::to('/guest');
});

Route::get('/guest', function () {
    return view('pages.index', ['active' => '-', 'active2' => '-']);
});
Route::get('/logout', function () {
	  Auth::logout();
    return view('master.index');
});

Route::post('/logs','pegawai_C@login');

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
    Route::get('form', 'transaksi_c@showForm');
    Route::get('tabel','transaksi_c@showTable');
    Route::get('tabelkt/{id}','transaksi_c@showTablekt');
    Route::post('store', 'transaksi_c@store');
    Route::get('delete/{id}', 'transaksi_c@delete');
    Route::get('deletekt/{id}', 'transaksi_c@deletekt');
    Route::get('edit/{id}', 'transaksi_c@edit');
    Route::post('update/{id}', 'transaksi_c@update');
    Route::get('updatekt/{id}','transaksi_c@formUpKt');
    Route::post('updatekt/{id}','transaksi_c@updateKt');
    Route::get('tipe','transaksi_c@addType');
    Route::get('tambah/{count}', 'transaksi_c@tambahTransaksi');
    Route::get('report', 'transaksi_c@report');
});

Route::group(['prefix' => 'booking'], function () {
    Route::get('form', 'booking_c@showForm');
    Route::get('tabel', 'booking_c@showTable');
    Route::get('store', 'booking_c@store');
    Route::get('delete/{id}', 'booking_c@delete');
    Route::get('edit/{id}', 'booking_c@edit');
    Route::post('update/{id}', 'booking_c@update');
});

Route::group(['prefix' => 'service'], function () {
    Route::get('tabel', 'servis_c@showTable');
    Route::get('form', 'servis_c@showForm');
    Route::post('store', 'servis_c@store');
    Route::get('delete/{id}', 'servis_c@delete');
    Route::get('edit/{id}', 'servis_c@edit');
    Route::post('update/{id}', 'servis_c@update');
});

Route::group(['prefix' => 'konsumen'], function () {
    Route::get('tabel', 'konsumen_c@showTable');
    Route::get('form', 'konsumen_c@showForm');
    Route::post('store', 'konsumen_c@store');
    Route::get('delete/{id}', 'konsumen_c@delete');
    Route::get('edit/{id}', 'konsumen_c@edit');
    Route::post('update/{id}', 'konsumen_c@update');
});

Route::group(['prefix' => 'jabatan'], function () {
    Route::get('tabel', 'jabatan_c@showTable');
    Route::get('form', 'jabatan_c@showForm');
    Route::post('store', 'jabatan_c@store');
    Route::get('delete/{id}', 'jabatan_c@delete');
    Route::get('edit/{id}', 'jabatan_c@edit');
    Route::post('update/{id}', 'jabatan_c@update');
});

Route::group(['prefix' => 'pegawai'], function () {
    Route::get('tabel', 'pegawai_c@showTable');
    Route::get('form', 'pegawai_C@showForm');
    Route::post('store', 'pegawai_c@store');
    Route::get('delete/{id}', 'pegawai_C@delete');
    Route::get('edit/{id}', 'pegawai_c@edit');
    Route::post('update/{id}', 'pegawai_c@update');
});

Route::group(['prefix' => 'konsultasi'], function () {
    Route::get('show', 'konsultasi_c@show');
    Route::post('store', 'konsultasi_c@store');
    Route::get('delete/{id}', 'konsultasi_c@delete');
    Route::get('edit/{id}', 'konsultasi_c@edit');
    Route::post('update/{id}', 'konsultasi_c@update');
    Route::get('reply/{id}', 'konsultasi_c@reply');
    Route::post('storeReply/{id}', 'konsultasi_c@storeReply');
});
