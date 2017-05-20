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
				<form role="form" method="post" action="update/{{ $konsumen->ID_Konsumen }}">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Konsumen</label>
							<input type="text" class="form-control" name="nama" value="{{ $konsumen->Nama_Konsumen }}" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">No Telp Konsumen</label>
							<input type="text" class="form-control" name="telp" value="{{ $konsumen->No_Telp_Konsumen }}" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Alamat Konsumen</label>
							<input type="text" class="form-control" name="alamat" value="{{ $konsumen->Alamat_Konsumen }}" required>
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
