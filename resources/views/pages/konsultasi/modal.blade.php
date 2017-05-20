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
			<form role="form" method="post" action="update/{{ $konsultasi->ID_Konsultasi }}">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Judul</label>
							<input type="text" class="form-control" name="judul" value="{{ $konsultasi->Judul }}" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Deskripsi Konsultasi</label>
							<textarea class="form-control" rows="3" name="deskripsi">{{ $konsultasi->Deskripsi_Konsultasi }}</textarea>
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
