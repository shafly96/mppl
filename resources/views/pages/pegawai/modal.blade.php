<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Data</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="post" action="update/{{ $pegawai->ID_Pegawai }}">
					<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Jabatan</label>
						<select class="js-example-basic-single" style="width:100%;" name="id_jabatan">
							<option value="" >--</option>
							@foreach($jabatan as $n)
							<option value="{{$n->ID_Jabatan}}" <?php if($n->ID_Jabatan == $pegawai->ID_Jabatan) echo "selected" ?> >{{$n->Nama_Jabatan}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Nama Pegawai</label>
						<input type="text" class="form-control" name="nama" value="{{$pegawai->Nama_Pegawai}}" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Alamat Pegawai</label>
						<input type="text" class="form-control" name="alamat" value="{{$pegawai->Alamat_Pegawai}}" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">No Telp Pegawai</label>
						<input type="text" class="form-control" name="telp" value="{{$pegawai->No_Telp_Pegawai}}" required>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" id="simpan">Update</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</body>
</html>
