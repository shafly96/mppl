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
				<form role="form" method="post" action="update/{{ $booking->ID_Booking }}">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">ID Konsumen</label>
							<select class="js-example-basic-single" style="width:100%;" name="id_konsumen">
								@foreach($konsumen as $n)
								<option value="{{$n->ID_Konsumen}}" <?php if($booking->ID_Konsumen==$n->ID_Konsumen) echo "selected"; ?> >{{$n->ID_Konsumen}}-{{$n->Nama_Konsumen}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Waktu Booking</label>
							<input type="text" class="form-control" name="date" value="{{ $booking->Waktu_Booking }}">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Status Pengerjaan</label>
							<select class="js-example-basic-single" style="width:100%;" name="status">
								<option value="1" <?php if($booking->Status_Pengerjaan==1) echo "selected"; ?> >Menunggu</option>
								<option value="2" <?php if($booking->Status_Pengerjaan==2) echo "selected"; ?> >Pengerjaan</option>
								<option value="3" <?php if($booking->Status_Pengerjaan==3) echo "selected"; ?> >Selesai</option>
							</select>
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