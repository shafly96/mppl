
<div class="form-group">
  <label style="width:100%;">Deskripsi Servis</label>
  <select onchange="#" class="serv" style="width:100%;" name="servis[]" required>
    <option value="">--</option>
    @foreach($servis as $serv)
      <option value="{{$serv->ID_Servis}}">{{$serv->Deskripsi_Servis}}</option>
    @endforeach
  </select>
</div>
