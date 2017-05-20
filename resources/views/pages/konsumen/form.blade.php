@extends('master.master')

@section('content')

<div class="row">
	<!-- left column -->
	<div class="col-xs-12">
		<!-- general form elements -->
		@if($sukses==1)
		<div class="alert alert-success">
			Data Telah Dimasukan
		</div>
		@endif
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Form Konsumen</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="post" action="store">
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Konsumen</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Konsumen" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">No Telp Konsumen</label>
						<input type="text" class="form-control" name="telp" placeholder="No Telp Konsumen" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Alamat Konsumen</label>
						<input type="text" class="form-control" name="alamat" placeholder="Alamat Konsumen" required>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div><!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
				</div>
			</form>
		</div><!-- /.box -->
	</div>
</div>

@include('master.script')

@stop
