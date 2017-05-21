<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\servis;

class servis_c extends Controller
{
	public function showTable(){
		return view('pages.service.tabel', ['active' => 'service', 'active2' => 'tabel', 'sukses' => 0, 'servis' => servis::all()]);
	}
	public function showForm(){
		return view('pages.service.form', ['active' => 'service', 'active2' => 'form', 'sukses' => 0]);
	}

	public function store(Request $request){
		$servis = new servis;
		$servis->deskripsi_servis = $request->deskripsi;
		$servis->harga_servis = $request->harga;
		if($servis->save()) return view('pages.service.form', ['active' => 'service', 'active2' => 'form', 'sukses' => 1]);
		else return view('pages.service.form', ['active' => 'service', 'active2' => 'form', 'sukses' => 0]);
	}

	public function delete($id){
		$servis = servis::where('ID_Servis', $id);
		$servis->delete();
		return redirect('service/tabel');
	}

	public function edit($id){
		$servis = servis::where('ID_Servis', $id)->first();
		return view('pages.service.modal')->with('servis', $servis);
	}

	public function update($id){
		$servis = servis::find($id);

		$servis->deskripsi_servis = Input::get('deskripsi');
		$servis->harga_servis = Input::get('harga');

		if($servis->save()) return view('pages.service.tabel', ['active' => 'service', 'active2' => 'tabel', 'sukses' => 1, 'servis' => servis::all()]);
		else return view('pages.service.tabel', ['active' => 'service', 'active2' => 'tabel', 'sukses' => 0, 'servis' => servis::all()]);
	}     
}
