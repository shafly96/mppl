  <div class="form-group">
    <div style="display: none;">
        {{$counter = $tambahan}}
    </div>
    <h3 class="box-header with-border" style="padding-left: 0px">Transaksi #{{$counter}}</h3>
  </div>

  <div class="form-group" >
    <label>Tipe Transaksi</label>
    <select class="form-control" id="sel1" name="tipe[]" selectid="{{$counter}}" onchange="getType(this.value,this.getAttribute('selectid'))">
        <option value="">--</option>
        <option value="1">Pembelian Sparepart</option>
        <option value="2">Servis</option>
    </select>
  </div>
  <div id="<?php echo 'tipe'.$counter;  ?>"></div>
