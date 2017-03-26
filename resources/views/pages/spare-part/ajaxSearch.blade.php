<div class="row">
  <div class="col-sm-4" style="padding: 20px;">
      <div class="thumbnail" style="padding: 10px;">
        <img  id ="foo" style="width:100%;" src="/SIBengkel{{$storagepath}}" onError="this.onerror=null;this.src='/SIBengkel{{$defaultpath}}';" >
      </div>
  </div>
  <div class="col-sm-8">
      <div class="container">
        <h3>Nama Sparepart : </h3>
        <p class="text-left">{{$sparepart->Nama_Sparepart}}</p>
        <h3>Kendaraan Sparepart :</h3>
        <p class="text-left">{{$sparepart->Kendaraan_Sparepart}}</p>
        <h3>Harga Sparepart :</h3>
        <p class="text-left">{{$sparepart->Harga_Sparepart}}</p>
        <h4>Status :</h4>
        <p class="text-left">@if ($sparepart->Stok_Sparepart > 0)Stok Tersedia @else Stok Habis @endif</p>
      </div>
  </div>
</div>
