<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\sparepart;
use DB, Redirect, Validator, View, Auth;
use File;

class sparepartController extends Controller
{
  public function ShowInsertSparepart(){
    $data['active'] = 'spare-part';
    $data['active2'] = 'form';
    return view('pages.spare-part.form', $data);
  }
  public function ShowSparepart(){
    $data['active'] = 'spare-part';
    $data['active2'] = 'tabel';
    $data['sparepart'] = sparepart::get();
    return view('pages.spare-part.tabel',$data);
  }
  public function ShowUpdateSparepart($id)
  {
      $data['active'] = 'spare-part';
      $data['active2'] = 'form';
      $data['sparepart'] = sparepart::find($id);
    //  dd($data['sparepart']);
      return view('pages.spare-part.form',$data);
  }
  public function ShowSearchSparepart(){
    $data['active'] = 'pengecekan';
    $data['active2'] = '';
    $data['kendaraan'] = sparepart::select('Kendaraan_Sparepart')->distinct()->get();
    return view('pages.spare-part.search',$data);
  }
  public function dropdownSparepart($kendaraan){
    $data['active'] = 'spare-part';
    $data['active2'] = 'search';
    $data['spsearch'] = sparepart::where('Kendaraan_Sparepart','=',$kendaraan)->select("Nama_Sparepart",'ID_Sparepart')->orderBy('Kendaraan_Sparepart', 'ASC')->get();
    return view('pages.spare-part.dropdown-sparepart',$data);
  }

  public function ShowHasilPencarian($id)
  {
    $data['active'] = 'spare-part';
    $data['active2'] = 'search';
    $data['sparepart'] = sparepart::find($id);
    $data['storagepath'] =storage::url('app/spareparts/'.$data['sparepart']->Nama_Sparepart.$data['sparepart']->Kendaraan_Sparepart.'.jpg');
    $data['defaultpath'] = storage::url('app/public/default.png');
  //  $lol=  storage::url('public/default.png');
//  dd($data['defaultpath']);
    return view('pages.spare-part.ajaxSearch',$data);
    //dd($data['storagepath']);
  }

  public function InsertSparepart(Request $request){

    if($this->verifyData($request))
    {
      if (NULL != $request->file('avatar'))
      {
        $file = $request->file('avatar');
        $file->storeAs('spareparts/',$request->nama_sparepart.$request->kendaraan_sparepart.'.jpg');

      }
      $insert = new sparepart;
      $insert->Nama_Sparepart = $request->nama_sparepart;
      $insert->Kendaraan_Sparepart = $request->kendaraan_sparepart;
      $insert->Harga_Sparepart = $request->harga_sparepart;
      $insert->Stok_Sparepart = $request->stok_sparepart;
      $insert->save();
      return redirect('spare-part/insert')->with('success','Data telah dimasukkan');
    }
    else {
      return redirect('spare-part/insert')->with('failed','Input Invalid - Data Sudah ada');
    }
  //  dd($data->nama_sparepart);

  }
  public function UpdateSparepart(Request $request, $id)
  {
      $update = sparepart::find($id);
        $exist = Storage::disk('local')->exists("spareparts/".$update->Nama_Sparepart.$update->Kendaraan_Sparepart.'.jpg');
      //  dd($exist);

        if (NULL != $request->file('avatar'))
        {
          $file = $request->file('avatar');
          Storage::delete('spareparts/'.$update->Nama_Sparepart.$update->Kendaraan_Sparepart.'.jpg');

          $file->storeAs('spareparts/',$request->nama_sparepart.$request->kendaraan_sparepart.'.jpg');
        }
        else {

            if ($exist)
            {
              if ($request->nama_sparepart != $update->Nama_Sparepart || $request->kendaraan_sparepart != $update->Kendaraan_Sparepart)
              {
                Storage::move('spareparts/'.$update->Nama_Sparepart.$update->Kendaraan_Sparepart.'.jpg','spareparts/'.$request->nama_sparepart.$request->kendaraan_sparepart.'.jpg');
              }
            }

        }

        $update->Nama_Sparepart = $request->nama_sparepart;
        $update->Kendaraan_Sparepart = $request->kendaraan_sparepart;
        $update->Harga_Sparepart = $request ->harga_sparepart;
        $update->Stok_Sparepart = $request->stok_sparepart;
        $update->save();
        return redirect('spare-part/update/'.$id)->with('success','Data telah diubah');


  }
  public function DeleteSparepart($id)
  {
    $delete = sparepart::find($id);
    Storage::delete('spareparts/'.$delete->Nama_Sparepart.$delete->Kendaraan_Sparepart.'.jpg');
  //  dd($wow);
    $delete->delete();
    return redirect('spare-part/tabel')->with('success','Data Telah dihapus');
  }

  private function verifyData($verifyData){
    //dd($verifyData->kendaraan_sparepart);
    $ver = sparepart::where([
      ['Nama_Sparepart', '=',$verifyData->nama_sparepart],
      ['Kendaraan_Sparepart','=',$verifyData->kendaraan_sparepart]])->get();
      //dd($ver->count());
      // dd($ver['sparepart']->nama_sparepart);
    if ($ver->count()){
      return False;
    }
    else{
      return True;
    }
  }
}
