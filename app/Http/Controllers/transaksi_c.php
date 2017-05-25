<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\transaksi;
use App\konsumen;
use App\sparepart;
use App\ktransaksi;
use Carbon\Carbon;
use App\servis;

class transaksi_c extends Controller
{
  public function showTable(){
      $data['active'] = 'transaksi';
      $data['active2'] = 'tabel';
      $data['sukses'] = 0;
      $data['transaksi'] = DB::select('select * from transaksi,pegawai,konsumen where transaksi.ID_Pegawai = pegawai.ID_Pegawai and transaksi.ID_Konsumen = konsumen.ID_Konsumen');
    //  dd($data['transaksi']);
    return view('pages.transaksi.tabel', $data);
	}
  public function showTablekt($id){
      $data['active'] = 'transaksi';
      $data['active2'] = 'tabel';
      $data['sukses'] = 0;
      $data['id'] = $id;
      $data['ktransaksispr'] = DB::select('select * from keranjang_transaksi,sparepart where keranjang_transaksi.ID_Sparepart = sparepart.ID_Sparepart and keranjang_transaksi.ID_Transaksi='.$id);
      $data['ktransaksiser'] = DB::select('select * from keranjang_transaksi,servis where keranjang_transaksi.ID_Servis = servis.ID_Servis and keranjang_transaksi.ID_Transaksi='.$id);

    //  dd($data['transaksi']);
    return view('pages.transaksi.tabelkt', $data);
	}

	public function showForm(){
    $data['active'] = 'transaksi';
    $data['active2'] = 'form';
    $data['konsumen'] = konsumen::get();
		return view('pages.transaksi.form',$data);
	}

  public function formUpKt($id){
    $data['active'] = 'transaksi';
    $data['active2'] = 'form';
    $data['konsumen'] = konsumen::get();
    $data['updatedTr'] = $id;
		return view('pages.transaksi.form',$data);
	}

  public function addType(Request $request){
    $input['id'] = $request->id;
    $input['cont'] = $request->cont;
    if( $input['id'] == 1)
    {
      $data['con'] = $input['cont'];
      $data['bikes'] = sparepart::select('Kendaraan_Sparepart')->distinct()->get();
      return view('pages.transaksi.dropdown-motor',$data);
    }
    else
    {
      $data['servis'] = servis::get();
      return view('pages.transaksi.dropdown-servis',$data);
    }
  }


  public function tambahTransaksi($counter)
  {
    $data['tambahan'] = $counter +1;;
    return view('pages.transaksi.tambah-transaksi',$data);
  }


	public function store(Request $request){
    if(isset($request->id_update)){
      $transaksi = transaksi::find($request->id_update);
      $transaksi->ID_Transaksi = $request->id_update;
    }
    else{
      $transaksi = new transaksi;
      $transaksi->ID_Konsumen = $request->konsumen;
      $transaksi->ID_Pegawai = 1;
      $transaksi->Waktu_Transaksi = Carbon::now();
      $transaksi->save();
    }
  //  dd($transaksi->ID_Transaksi);
    $counter = $request->konter;
    $harga = 0;
    $cBeli = 0;
    $cServis = 0;


    $ktransaksi[0] = new ktransaksi;
    $ktransaksi[0] = new ktransaksi;
    $ktransaksi[0]->ID_Transaksi = $transaksi->ID_Transaksi;

    if($request->type == 1)
    {
      $HSp = sparepart::select('Harga_Sparepart')->where('ID_Sparepart','=',$request->sparepart[0])->get();
      $harga += $HSp[0]->Harga_Sparepart;
      $ktransaksi[0]->Tipe_Transaksi = "Beli";
      $ktransaksi[0]->ID_Sparepart = $request->sparepart[0];
      $cBeli+=1;
    }
    else {
      $HSe = servis::select('Harga_Servis')->where('ID_Servis','=',$request->servis[0])->get();
      $harga += $HSe[0]->Harga_Servis;
      $ktransaksi[0]->Tipe_Transaksi = "Servis";
      $ktransaksi[0]->ID_Servis = $request->servis[0];
      $cServis+=1;
    }
      $ktransaksi[0]->save();


    if($counter > 1)
    {
      for($x = 1 ; $x< $counter ; $x++)
      {
        $ktransaksi[$x] = new ktransaksi;
        $ktransaksi[$x]->ID_Transaksi = $transaksi->ID_Transaksi;
        if($request->tipe[$x-1] == 1)
        {
          $HSp = sparepart::select('Harga_Sparepart')->where('ID_Sparepart','=',$request->sparepart[$x-$cServis])->get();
          $harga += $HSp[0]->Harga_Sparepart;
          $ktransaksi[$x]->Tipe_Transaksi = "Beli";
          $ktransaksi[$x]->ID_Sparepart = $request->sparepart[$x-$cServis];
          $cBeli+=1;
        }
        else {
          $HSe = servis::select('Harga_Servis')->where('ID_Servis','=',$request->servis[$x-$cBeli])->get();
          $harga += $HSe[0]->Harga_Servis;
          $ktransaksi[$x]->Tipe_Transaksi = "Servis";
          $ktransaksi[$x]->ID_Servis = $request->servis[$x-$cBeli];
          $cServis+=1;
        }
          $ktransaksi[$x]->save();
      }
    }

    $transup = transaksi::find($transaksi->ID_Transaksi);
    $transup->Total_Biaya = $harga;
    $transup->save();

    return redirect('transaksi/tabel')->with('success','Data berhasil ditambahkan');

	}

	public function delete($id){
		$transaksi = transaksi::find($id);
		$transaksi->delete();
		return redirect('transaksi/tabel')->with('success','Data berhasil dihapus');
	}
  public function deletekt($id){
		$ktransaksi = ktransaksi::find($id);
    $idtrans = $ktransaksi->ID_Transaksi;
    if ($ktransaksi->Tipe_Transaksi == 'Beli')
    {

      $x = sparepart::find($ktransaksi->ID_Sparepart);
      $harga = $x->Harga_Sparepart;

    }
    else {
      $x = servis::find($ktransaksi->ID_Servis);
      $harga = $x->Harga_Servis;
    }
		$ktransaksi->delete();
    $transaksi = transaksi::find($idtrans);
    $transaksi->Total_Biaya = $transaksi->Total_Biaya - $harga;
    $transaksi->save();

		return redirect('transaksi/tabelkt/'.$idtrans)->with('success','Data berhasil dihapus');
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
  public function report(){
    $data['active'] = 'report';
    $data['active2'] = '';
    $data['ysales'] = DB::select('select YEAR(t.Waktu_Transaksi) as Tahun , SUM(Total_Biaya) as Pemasukan, COUNT(*) as Jumlah_Transaksi from Transaksi as t GROUP BY YEAR(t.Waktu_Transaksi) DESC
');

    $data['msales'] = DB::select('select MONTH(t.Waktu_Transaksi) as m, MONTHNAME(t.Waktu_Transaksi) as Bulan, YEAR(t.Waktu_Transaksi) as Tahun , SUM(Total_Biaya) as Pemasukan, COUNT(*) as Jumlah_Transaksi from Transaksi as t GROUP BY YEAR(t.Waktu_Transaksi), MONTH(t.Waktu_Transaksi) DESC');
    // for ($i=0; $i < 12 ; $i++) {
    //   # code...
    // }
    return view('pages.transaksi.report',$data);
  }
}
