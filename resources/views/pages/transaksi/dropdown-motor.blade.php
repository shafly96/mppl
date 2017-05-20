
<div class="form-group">
  <label style="width:100%;">Nama Kendaraan</label>
  <select onchange="getSparepart(this.value,this.getAttribute('counter'))" counter="{{$con}}" class="single2" style="width:100%;" >
    <option value="">--</option>
    @foreach($bikes as $bike)
      <option value="{{$bike->Kendaraan_Sparepart}}">{{$bike->Kendaraan_Sparepart}}</option>
    @endforeach
  </select>
</div>

<div id="<?php echo 'spareprt'. $con ?>"></div>
