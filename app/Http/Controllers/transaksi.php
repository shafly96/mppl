<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\transaksi;
use App\konsumen;

class transaksi extends Controller
{
    public function showTable(){
		return view('pages.transaksi.tabel', ['active' => 'transaksi', 'active2' => 'tabel', 'sukses' => 0, 'transaksi' => transaksi::all()]);
	}
	public function showForm(){
		return view('pages.transaksi.form', ['active' => 'transaksi', 'active2' => 'form', 'sukses' => 0]);
	}

	public function store(Request $request){
		$transaksi = new transaksi;
		$servis->deskripsi_servis = $request->deskripsi;
		$servis->harga_servis = $request->harga;
		if($servis->save()) return view('pages.service.form', ['active' => 'service', 'active2' => 'form', 'sukses' => 1]);
		else return view('pages.service.form', ['active' => 'service', 'active2' => 'form', 'sukses' => 0]);
	}

	public function delete($id){
		$transaksi = transaksi::find($id);
		$transaksi->delete();
		return redirect('transaksi/tabel');
	}

	public function edit($id){
		$transaksi = transaksi::where('ID_Transaksi', $id)->first();
		return view('pages.transaksi.modal')->with('transaksi', $transaksi);
	}

	public function update($id){
		$transaksi = transaksi::find($id);

		$servis->deskripsi_servis = Input::get('deskripsi');
		$servis->harga_servis = Input::get('harga');

		if($servis->save()) return view('pages.service.tabel', ['active' => 'service', 'active2' => 'tabel', 'sukses' => 1, 'servis' => servis::all()]);
		else return view('pages.service.tabel', ['active' => 'service', 'active2' => 'tabel', 'sukses' => 0, 'servis' => servis::all()]);
	}  
}
