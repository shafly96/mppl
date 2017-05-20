@extends('master.master')

@section('content')

<div class="row">
	<!-- left column -->
	<div class="col-xs-12">
		@if (session('failed'))
		    <div class="alert alert-error">
		        {{ session('failed') }}
		    </div>
		@endif
		@if (session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Form Spare Part</h3>
			</div><!-- box-header -->
			<!-- form start -->
			<form action="{{url('/')}}/spare-part/@if(isset($sparepart))update/{{$sparepart->ID_Sparepart}} @else
			insert @endif" method="POST" role="form" enctype="multipart/form-data">
				<div class="box-body">
					<div class="form-group">
						<label>Nama Sparepart</label>
						<input type="text" name="nama_sparepart"class="form-control" placeholder="Masukan Nama Sparepart"
						@if(isset($sparepart))value="{{$sparepart->Nama_Sparepart}}"@endif required>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					</div>
					<div class="form-group">
						<label>Kendaraan Sparepart</label>
						<input type="text" name="kendaraan_sparepart"class="form-control" placeholder="Masukan Nama Kendaraan"
						@if(isset($sparepart))value="{{$sparepart->Kendaraan_Sparepart}}"@endif required>
					</div>
					<div class="form-group">
						<label>Harga Sparepart</label>
						<input type="number" name="harga_sparepart"class="form-control" placeholder="Masukan Harga Sparepart"
						@if(isset($sparepart))value={{$sparepart->Harga_Sparepart}}@endif required>
					</div>
					<div class="form-group">
						<label>Stok Sparepart</label>
						<input type="Number" name="stok_sparepart"class="form-control" placeholder="Masukan stok Sparepart"
						@if(isset($sparepart))value={{$sparepart->Stok_Sparepart}}@endif required>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">File input</label>
						<input type="file" name="avatar">
						<p class="help-block">Masukkan gambar sparepart disini</p>
					</div>

				</div><!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div><!-- /.box -->
	</div>
</div>

@include('master.script')

@stop
