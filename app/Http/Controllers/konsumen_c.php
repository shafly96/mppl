<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\konsumen;
use App\User;
class konsumen_c extends Controller
{
    public function showTable(){
		return view('pages.konsumen.tabel', ['active' => 'konsumen', 'active2' => 'tabel', 'sukses' => 0, 'konsumen' => konsumen::all()]);
	}
	public function showForm(){
		return view('pages.konsumen.form', ['active' => 'konsumen', 'active2' => 'form', 'sukses' => 0]);
	}

	public function store(Request $request){
		$konsumen = new konsumen;
		$konsumen->nama_konsumen = $request->nama;
		$konsumen->no_telp_konsumen = $request->telp;
		$konsumen->alamat_konsumen = $request->alamat;
		if($konsumen->save()) {
      $login = new User;
      $login->ID_Pelanggan = $konsumen->ID_Konsumen;
      $login->password = bcrypt("123");
      $login->access_type = "pelanggan";
      if($login->save()){
        return view('pages.konsumen.form', ['active' => 'konsumen', 'active2' => 'form', 'sukses' => 1]);
      }
      else {
         return view('pages.konsumen.form', ['active' => 'konsumen', 'active2' => 'form', 'sukses' => 0]);
      }
    }
		else return view('pages.konsumen.form', ['active' => 'konsumen', 'active2' => 'form', 'sukses' => 0]);
	}

	public function delete($id){
		$konsumen = konsumen::find($id);
		$konsumen->delete();
		return redirect('konsumen/tabel');
	}

	public function edit($id){
		$konsumen = konsumen::where('ID_Konsumen', $id)->first();
		return view('pages.konsumen.modal')->with('konsumen', $konsumen);
	}

	public function update($id){
		$konsumen = konsumen::find($id);


		$konsumen->nama_konsumen = Input::get('nama');
		$konsumen->no_telp_konsumen = Input::get('telp');
		$konsumen->alamat_konsumen = Input::get('alamat');

		if($konsumen->save()) return view('pages.konsumen.tabel', ['active' => 'konsumen', 'active2' => 'tabel', 'sukses' => 1, 'konsumen' => konsumen::all()]);
		else return view('pages.konsumen.tabel', ['active' => 'konsumen', 'active2' => 'tabel', 'sukses' => 0, 'konsumen' => konsumen::all()]);
	}
}
