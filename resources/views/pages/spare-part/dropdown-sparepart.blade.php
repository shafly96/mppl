<label style="width:100%;">Nama Sparepart</label>
<select onchange="ShowHasilPencarian(this.value)" class="single" style="width:100%;" name="sparepart[]" required>
  <option value="">--</option>
  @foreach($spsearch as $search)
  <option value="{{$search->ID_Sparepart}}">{{$search->Nama_Sparepart}}</option>
  @endforeach
</select>
