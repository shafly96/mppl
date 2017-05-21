<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\jabatan;

class jabatan_C extends Controller
{
    public function showTable(){
		return view('pages.jabatan.tabel', ['active' => 'jabatan', 'active2' => 'tabel', 'sukses' => 0, 'jabatan' => jabatan::all()]);
	}
	public function showForm(){
		return view('pages.jabatan.form', ['active' => 'jabatan', 'active2' => 'form', 'sukses' => 0]);
	}

	public function store(Request $request){
		$jabatan = new jabatan;
		$jabatan->nama_jabatan = $request->nama;
		$jabatan->gaji = $request->gaji;
		if($jabatan->save()) return view('pages.jabatan.form', ['active' => 'jabatan', 'active2' => 'form', 'sukses' => 1]);
		else return view('pages.jabatan.form', ['active' => 'jabatan', 'active2' => 'form', 'sukses' => 0]);
	}

	public function delete($id){
		$jabatan = jabatan::find($id);
		$jabatan->delete();
		return redirect('jabatan/tabel');
	}

	public function edit($id){
		$jabatan = jabatan::where('ID_Jabatan', $id)->first();
		return view('pages.jabatan.modal')->with('jabatan', $jabatan);
	}

	public function update($id){
		$jabatan = jabatan::find($id);

		
		$jabatan->nama_jabatan = Input::get('nama');
		$jabatan->gaji = Input::get('gaji');

		if($jabatan->save()) return view('pages.jabatan.tabel', ['active' => 'jabatan', 'active2' => 'tabel', 'sukses' => 1, 'jabatan' => jabatan::all()]);
		else return view('pages.jabatan.tabel', ['active' => 'jabatan', 'active2' => 'tabel', 'sukses' => 0, 'jabatan' => jabatan::all()]);
	}
}
