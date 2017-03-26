<label style="width:100%;">Nama Sparepart</label>
<select onchange="ShowHasilPencarian(this.value)" id="single" style="width:100%;">
  <option value="">--</option>
  @foreach($spsearch as $search)
  <option value="{{$search->ID_Sparepart}}">{{$search->Nama_Sparepart}}</option>
  @endforeach
</select>
