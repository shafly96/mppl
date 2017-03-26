@extends('master.master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		@if (session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Tabel Spare Part</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID Sparepart</th>
							<th>Nama Sparepart</th>
							<th>Kendaraan Sparepart</th>
							<th>Harga Sparepart</th>
							<th>Stok Sparepart</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sparepart as $dat)
						<tr>
							<td>
								{{$dat->ID_Sparepart}}
							</td>
							<td>
								{{$dat->Nama_Sparepart}}
							</td>
							<td>
								{{$dat->Kendaraan_Sparepart}}
							</td>
							<td>
								{{$dat->Harga_Sparepart}}
							</td>
							<td>
								{{$dat->Stok_Sparepart}}
							</td>
							<td>
								<button type="button" class="btn btn btn-danger btn-xs" data-toggle="modal" data-target="#myModalHapus{{ $dat->ID_Sparepart }}"><i class="fa fa-trash-o"></i> Delete </button>
																{{--Modal--}}
																<div class="modal fade" id="myModalHapus{{ $dat->ID_Sparepart }}" role="dialog">
																	<div class="modal-dialog">
																			{{--Modal content--}}
																			<div class="modal-content">
																					<div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal">&times;</button>
																							<h4 class="modal-title">Hapus Sparepart Data</h4>
																					</div>
																					<div class="modal-body">
																							<p>Anda yakin menghapus data sparepart ini?</p>
																					</div>
																					<div class="modal-footer">
																						<a href="{{url('/')}}/spare-part/delete/{{ $dat->ID_Sparepart }}" class="btn btn-default" role="button">Yes</a>
																						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
																					</div>
																			</div>
																		</div>
																</div>
																<a href="{{url('/')}}/spare-part/update/{{$dat->ID_Sparepart}}" class= "btn btn-success btn-xs"> Update</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID Sparepart</th>
							<th>Nama Sparepart</th>
							<th>Kendaraan Sparepart</th>
							<th>Harga Sparepart</th>
							<th>Stok Sparepart</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div>

@include('master.script')

<script type="text/javascript">
        $('#example1').DataTable();
</script>

@stop
