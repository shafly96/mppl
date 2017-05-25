@extends('master.master')

@section('content')

<div class="row" >
	<!-- left column -->
	<div class="col-xs-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Form Transaksi</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<form role="form"  action="{{url('/')}}/transaksi/store" method="POST" id=transaksi>
				@if(isset($updatedTr))
					<input type="hidden" name="id_update" value="{{$updatedTr}}">
				@endif
				<div class="box-body">
					<div class="form-group">
						@if(empty($updatedTr))
						<label>Pilih Konsumen</label>
						<select class="form-control" id="kons" name="konsumen" required>
							<option value="">--</option>
							@foreach($konsumen as $kons)
							<option value="{{$kons->ID_Konsumen}}">{{$kons->ID_Konsumen}} -- {{$kons->Nama_Konsumen}}</option>
							@endforeach
						</select>
						@endif

					</div>
					<div class="form-group">
						<h3 class="box-header with-border " style="padding-left: 0px">Transaksi #1</h3>
					</div>
					<div class="form-group" >
						<label>Tipe Transaksi</label>
						<select class="form-control" id="sel1" name="type" selectid="1" onchange="getType(this.value,this.getAttribute('selectid'))">
								<option value="">--</option>
								<option value="1">Pembelian Sparepart</option>
								<option value="2">Servis</option>
						</select>
					</div>
					<div id="tipe1"></div>
					<div class="tambahTrans"></div>
					<div class="form-group" style="margin-top : 10px" >
								<div class="btn btn-info btn-xs"  style="border-radius: 100%" counter="1" id= "kont" onclick="tambahTransaksi(this.getAttribute('counter'))">
										+
								</div>
								<p style="font-size: 2vh;display: inline"> Menambah Transaksi</p>
					</div>
				</div><!-- /.box-body -->
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="konter" value="1" id='jumlahTrans'>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div><!-- /.box -->
	</div>
</div>

<script type="text/javascript">



function cek(){
	window.alert(document.getElementById('ceke').getAttribute('value'));
}

function getType(id,cont) {

		var str1 = "#tipe";
		var str2 = cont;
		var con = str1.concat(str2);
		console.log(con);
		$.ajax({
			type: "GET",
			cache: false,
			data: {
					id : id,
					cont : str2
			},
			url: "{{url('/')}}/transaksi/tipe",
			dataType: "html",
			success: function(res){
				$('#transaksi').find(con).html(res);
				$('.single2').select2();
				$('.serv').select2();

			}
		});
}

function getSparepart(str,cont){
	var str1 = "#spareprt";
	var str2 = cont;
	var con = str1.concat(str2);
	$.ajax({
		type : "GET",
		cache: false,
		url : "{{url('/')}}/spare-part/dropspare/"+ str,
		dataType: "html",
		success: function(res){
			$('#transaksi').find(con).html(res);
			$('.single').select2();

		}
	});
}

function ShowHasilPencarian(str){

}

function tambahTransaksi(count){
	//console.log(count);
	count = parseInt(count);
	var tambahan  = count + 1;

	$.ajax({
		type : "GET",
		cache: false,
		url : "{{url('/')}}/transaksi/tambah/"+ count,
		dataType: "html",
		success: function(res){
			document.getElementById("kont").setAttribute("counter", tambahan);
			document.getElementById("jumlahTrans").setAttribute("value", tambahan);
			console.log(document.getElementById("kont").getAttribute("counter"));
			$('#transaksi').find('.tambahTrans').append(res);
		}
	});
}

function getCounter(){
	return document.getElementById("kont").getAttribute("counter");
}


window.onload = function(){
	$("#kons").select2();
};
</script>

@include('master.script')

@stop
