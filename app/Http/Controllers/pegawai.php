<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\pegawai;
use App\jabatan;

class pegawai extends Controller
{
    public function showTable(){
		return view('pages.pegawai.tabel', ['active' => 'pegawai', 'active2' => 'tabel', 'sukses' => 0, 'pegawai' => pegawai::all()]);
	}

	public function showForm(){
		return view('pages.pegawai.form', ['active' => 'pegawai', 'active2' => 'form', 'sukses' => 0, 'jabatan' => jabatan::all()]);
	}

	public function store(Request $request){
		$pegawai = new pegawai;
		$pegawai->ID_Jabatan = $request->id_jabatan;
		$pegawai->nama_pegawai = $request->nama;
		$pegawai->no_telp_pegawai = $request->telp;
		$pegawai->alamat_pegawai = $request->alamat;
		if($pegawai->save()) return view('pages.pegawai.form', ['active' => 'pegawai', 'active2' => 'form', 'sukses' => 1, 'jabatan' => jabatan::all()]);
		else return view('pages.pegawai.form', ['active' => 'pegawai', 'active2' => 'form', 'sukses' => 0, 'jabatan' => jabatan::all()]);
	}

	public function delete($id){
		$pegawai = pegawai::find($id);
		$pegawai->delete();
		return redirect('pegawai/tabel');
	}

	public function edit($id){
		$pegawai = pegawai::where('ID_Pegawai', $id)->first();
		return view('pages.pegawai.modal', ['pegawai' => $pegawai, 'jabatan' => jabatan::all()]);
	}

	public function update($id){
		$pegawai = pegawai::find($id);
		
		$pegawai->nama_pegawai = Input::get('nama');
		$pegawai->no_telp_pegawai = Input::get('telp');
		$pegawai->alamat_pegawai = Input::get('alamat');
		$pegawai->id_jabatan = Input::get('id_jabatan');

		if($pegawai->save()) return view('pages.pegawai.tabel', ['active' => 'pegawai', 'active2' => 'tabel', 'sukses' => 1, 'pegawai' => pegawai::all()]);
		else return view('pages.pegawai.tabel', ['active' => 'pegawai', 'active2' => 'tabel', 'sukses' => 0, 'pegawai' => pegawai::all()]);
	}
}
