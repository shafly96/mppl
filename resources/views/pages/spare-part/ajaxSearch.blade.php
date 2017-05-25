<div class="row">
  <div class="col-sm-4" style="padding: 20px;">
      <div class="thumbnail" style="padding: 10px;">
        <img  id ="foo" style="width:100%;" src="/mppl2{{$storagepath}}" onError="this.onerror=null;this.src='/mppl2{{$defaultpath}}';" >
      </div>
  </div>
  <div class="col-sm-8">
      <div class="container">
        <h3 style="margin: 1em 0px 0px 0px;">Nama Sparepart : </h3>
        <p class="text-left">{{$sparepart->Nama_Sparepart}}</p>
        <h3 style="margin: 0px;">Kendaraan Sparepart :</h3>
        <p class="text-left">{{$sparepart->Kendaraan_Sparepart}}</p>
        <h3 style="margin: 0px;">Harga Sparepart :</h3>
        <p class="text-left">{{$sparepart->Harga_Sparepart}}</p>
        <h3 style="margin: 0px;">Status :</h3>
        <p class="text-left">@if ($sparepart->Stok_Sparepart > 0)Stok Tersedia @else Stok Habis @endif</p>
      </div>
  </div>
</div>
