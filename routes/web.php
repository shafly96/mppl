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

Route::group(['prefix' => 'spare-part'], function () {
    Route::get('tabel', function ()    {
        return view('pages.spare-part.tabel', ['active' => 'spare-part', 'active2' => 'tabel']);
    });
});
