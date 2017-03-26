@extends('master.master')

@section('content')

<div id="myModal" class="modal fade" role="dialog"></div>

<div class="row">
	<!-- left column -->
	<div class="col-xs-12">
		@if($sukses==1)
		<div class="alert alert-success">
			Data Telah Ditambah
		</div>
		@endif
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Form Konsumen</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" action="store">
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Konsumen</label>
						<select onchange="getSparepart(this.value)" class="js-example-basic-single" style="width:100%;" name="id_konsumen">
							<option value="" >--</option>
							@foreach($konsumen as $n)
							<option value="{{$n->ID_Konsumen}}">{{$n->ID_Konsumen}}-{{$n->Nama_Konsumen}}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div><!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
				</div>
			</form>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID Booking</th>
							<th>ID Konsumen</th>
							<th>Waktu Booking</th>
							<th>Status Pengerjaan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($booking as $n)
						<tr>
							<td>{{ $n->ID_Booking }}</td>
							<td>{{ $n->ID_Konsumen }}</td>
							<td>{{ $n->Waktu_Booking }}</td>
							<td>
								<?php 
								if($n->Status_Pengerjaan==1) echo"Menunggu";
								elseif ($n->Status_Pengerjaan==2) echo "Pengerjaan";
								else echo "Selesai";
								?>
							</td>
							<td>
								<a onclick="showEdit({{ $n->ID_Booking }})" class="btn btn-warning" id="edit" data-toggle="modal" data-target="#myModal">Edit</a>
								<a onclick="deletedata({{ $n->ID_Booking }})" class="btn btn-danger" id="delete">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

@include('master.script')

<script type="text/javascript">
	$('#example1').DataTable();

	$(".js-example-basic-single").select2();

	function showEdit(str) {
		if (str == "") {
			document.getElementById("myModal").innerHTML = "";
			return;
		} else { 
			if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
        		document.getElementById("myModal").innerHTML = this.responseText;
        	}
        };
        xmlhttp.open("GET","edit/"+str,true);
        xmlhttp.send();
    }
}

function deletedata(str) {
	swal({
		title: "Anda yakin?", 
		text: "Ingin menghapus data ini", 
		type: "warning",
		showCancelButton: true,
		closeOnConfirm: false,
		confirmButtonText: "Hapus!",
		confirmButtonColor: "#ec6c62"
	}, function() {
		$.ajax({
			url: "{{url('')}}/booking/delete/" + str,
			type: "GET"
		})
		.done(function(data) {
			swal({
				title: "Terhapus!", 
				text: "Data berhasil terhapus!", 
				type: "success",
				showCancelButton: false
			}, function() {
				window.location.href = '{{url('')}}/booking/form';
			});
		})
		.error(function(data) {
			swal("Oops", "We couldn't connect to the server!", "error");
		});
	});
}
</script>

@stop