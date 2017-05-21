<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\konsultasi;
use App\reply;
use Auth;
use DateTime;

class konsultasi_c extends Controller
{
    public function show(){
		return view('pages.konsultasi.formAwal', ['active' => 'konsultasi', 'active2' => 0, 'sukses' => 0, 'konsultasi' => konsultasi::all()]);
	}

	public function store(Request $request){
		$konsultasi = new konsultasi;
		$now = new DateTime();
		$konsultasi->judul = $request->judul;
    $konsultasi->ID_Konsumen = Auth::User()->ID_Pelanggan;
		$konsultasi->deskripsi_konsultasi = $request->deskripsi;
		$konsultasi->waktu_buat = $now;
		if($konsultasi->save()) return redirect('/konsultasi/show')->with(['active' => 'konsultasi', 'active2' => 0, 'sukses' => 1, 'konsultasi' => konsultasi::all()]);
		else return redirect('/konsultasi/show')->with(['active' => 'konsultasi', 'active2' => 0, 'sukses' => 0, 'konsultasi' => konsultasi::all()]);
	}

	public function edit($id){
		$konsultasi = konsultasi::where('ID_Konsultasi', $id)->first();
		return view('pages.konsultasi.modal')->with(['konsultasi'=> $konsultasi]);
	}

	public function update($id){
		$konsultasi = konsultasi::find($id);

		$konsultasi->judul = Input::get('judul');
		$konsultasi->deskripsi_konsultasi = Input::get('deskripsi');

		if($konsultasi->save()) return redirect('/konsultasi/show')->with(['active' => 'konsultasi', 'active2' => 0, 'sukses' => 1, 'konsultasi' => konsultasi::all()]);
		else return redirect('/konsultasi/show')->with(['active' => 'konsultasi', 'active2' => 0, 'sukses' => 0, 'konsultasi' => konsultasi::all()]);
	}

	public function delete($id){
		$konsultasi = konsultasi::find($id);
		$konsultasi->delete();
		return redirect('konsultasi/show');
	}

	public function reply($id){
		$konsultasi = konsultasi::where('ID_Konsultasi', $id)->first();
		$reply = reply::where('ID_Konsultasi', $id)->get();
		return view('pages.konsultasi.reply')->with(['active' => 'konsultasi', 'active2' => 0, 'konsultasi'=> $konsultasi, 'reply' => $reply]);
	}

	public function storeReply($id){
		$reply = new reply;
		$now = new DateTime();

		$reply->ID_Konsumen = 9825000;
		$reply->ID_Konsultasi = $id;
		$reply->Isi_Balasan = Input::get('response');
		$reply->Waktu_Balas = $now;
		$reply->save();

		$reply = reply::where('ID_Konsultasi', $id)->get();
		$konsultasi = konsultasi::where('ID_Konsultasi', $id)->first();
		return view('pages.konsultasi.reply')->with(['active' => 'konsultasi', 'active2' => 0,'konsultasi'=> $konsultasi, 'reply' => $reply]);
	}
}
