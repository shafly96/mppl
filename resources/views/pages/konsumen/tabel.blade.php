@extends('master.master')

@section('content')

<div id="myModal" class="modal fade" role="dialog"></div>

<div class="row">
	<div class="col-md-12">
		@if($sukses==1)
		<div class="alert alert-success">
			Data Telah Diupdate
		</div>
		@endif
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Tabel Konsumen</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama Konsumen</th>
							<th>No Telp Konsumen</th>
							<th>Alamat Konsumen</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($konsumen as $n)
						<tr>
							<td>{{ $n->ID_Konsumen }}</td>
							<td>{{ $n->Nama_Konsumen }}</td>
							<td>{{ $n->No_Telp_Konsumen }}</td>
							<td>{{ $n->Alamat_Konsumen }}</td>
							<td>
								<a onclick="showEdit({{ $n->ID_Konsumen }})" class="btn btn-warning" id="edit" data-toggle="modal" data-target="#myModal">Edit</a>
								<a onclick="deletedata({{ $n->ID_Konsumen }})" class="btn btn-danger" id="delete">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
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
		confirmButtonText: "Yes, delete it!",
		confirmButtonColor: "#ec6c62"
	}, function() {
		$.ajax({
			url: "{{url('')}}/konsumen/delete/" + str,
			type: "GET"
		})
		.done(function(data) {
			swal({
				title: "Terhapus!", 
				text: "Data berhasil terhapus!", 
				type: "success",
				showCancelButton: false
			}, function() {
				window.location.href = '{{url('')}}/konsumen/tabel';
			});
		})
		.error(function(data) {
			swal("Oops", "We couldn't connect to the server!", "error");
		});
	});
}

</script>

@stop