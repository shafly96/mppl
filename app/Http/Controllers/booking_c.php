<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\konsumen;
use App\booking;
use App\servis;
use Auth;
use DB;
use DateTime;

class booking_c extends Controller
{
	public function showForm(){
		$booking = booking::where('Status_Pengerjaan','<', 3)->get();
		return view('pages.booking_service.form', ['active' => 'booking', 'active2' => '-', 'sukses' => 0, 'konsumen' => konsumen::all(), 'booking' => $booking, 'servis' => servis::all()]);
	}

	public function showTable(){
		$history = DB::table('transaksi')
					->select('transaksi.id_transaksi', 'servis.deskripsi_servis', 'transaksi.waktu_transaksi')
					->join('keranjang_transaksi', 'keranjang_transaksi.id_transaksi', '=', 'transaksi.id_transaksi')
					->join('servis', 'keranjang_transaksi.id_servis', '=', 'servis.id_servis')
					->where('transaksi.id_konsumen', Auth::User()->ID_Pelanggan)
					->where('keranjang_transaksi.tipe_transaksi', 'Servis')
					->get();
					// dd($history);
		return view('pages.booking_service.tabel', ['active' => 'history', 'active2' => '-', 'sukses' => 0, 'history' => $history]);
	}

	public function store(){
		$booking = new booking;
		$now = new DateTime();
		$booking->id_konsumen = Auth::User()->ID_Pelanggan;
		$booking->waktu_booking = $now;
		$booking->status_pengerjaan = 1;
		if($booking->save()) return redirect('/booking/form')->with(['active' => 'booking', 'active2' => '-', 'sukses' => 1, 'konsumen' => konsumen::all(), 'booking' => booking::all()]);
		else return redirect('/booking/form')->with(['active' => 'booking', 'active2' => '-', 'sukses' => 0, 'konsumen' => konsumen::all(), 'booking' => booking::all()]);
	}

	public function delete($id){
		$booking = booking::find($id);
		$booking->delete();
		return redirect('booking/form');
	}

	public function edit($id){
		$booking = booking::where('ID_Booking', $id)->first();
		return view('pages.booking_service.modal')->with(['booking'=> $booking, 'konsumen' => konsumen::all()]);
	}

	public function update($id){
		$booking = booking::find($id);

		$booking->id_konsumen = Input::get('id_konsumen');
		$booking->waktu_booking = Input::get('date');
		$booking->status_pengerjaan = Input::get('status');

		if($booking->save()) return redirect('/booking/form')->with(['active' => 'booking', 'active2' => '-', 'sukses' => 1, 'konsumen' => konsumen::all(), 'booking' => booking::all()]);
		else return redirect('/booking/form')->with(['active' => 'booking', 'active2' => '-', 'sukses' => 0, 'konsumen' => konsumen::all(), 'booking' => booking::all()]);
	}
}
