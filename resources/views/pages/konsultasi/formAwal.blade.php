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
				<h3 class="box-title">Form Konsultasi</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			@if(Auth::user()->access_type== "pelanggan")
			<form role="form" method="post" action="store">
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Judul</label>
						<input type="text" class="form-control" name="judul" placeholder="Judul Deskripsi" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Deskripsi Konsultasi</label>
						<textarea class="form-control" rows="3" name="deskripsi" placeholder="Deskripsi Konsultasi"></textarea>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div><!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="simpan">Kirim</button>
				</div>
			</form>
			@endif
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID Konsultasi</th>
							<th>Judul Konsultasi</th>
							<th>Deskripsi Konsultasi</th>
							<th>Waktu Buat</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($konsultasi as $n)
						<tr>
							<td>{{ $n->ID_Konsultasi }}</td>
							<td>{{ $n->Judul }}</td>
							<td>{{ $n->Deskripsi_Konsultasi }}</td>
							<td>{{ $n->Waktu_Buat }}</td>
							<td>
								@if(Auth::user()->access_type=="pegawai")

								<a onclick="showEdit({{ $n->ID_Konsultasi }})" class="btn btn-warning" id="edit" data-toggle="modal" data-target="#myModal">Edit</a>
								<a onclick="deletedata({{ $n->ID_Konsultasi }})" class="btn btn-danger" id="delete">Delete</a>
								@endif

								<a href="reply/{{ $n->ID_Konsultasi }}" class="btn btn-info" id="detail">Detail</a>
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
			url: "{{url('')}}/konsultasi/delete/" + str,
			type: "GET"
		})
		.done(function(data) {
			swal({
				title: "Terhapus!",
				text: "Data berhasil terhapus!",
				type: "success",
				showCancelButton: false
			}, function() {
				window.location.href = '{{url('')}}/konsultasi/show';
			});
		})
		.error(function(data) {
			swal("Oops", "We couldn't connect to the server!", "error");
		});
	});
}
</script>

@stop
