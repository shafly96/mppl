@extends('master.master')

@section('content')

@if (session('success'))
		<div class="alert alert-success">
				{{ session('success') }}
		</div>
@endif
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Tabel Transaksi</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID Transaksi</th>
							<th>Nama Konsumen</th>
							<th>Nama Pegawai</th>
							<th>Total Biaya</th>
							<th>Waktu Transaksi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transaksi as $trans)
						<tr>
							<td>{{$trans->ID_Transaksi}}</td>
							<td>{{$trans->Nama_Konsumen}}</td>
							<td>{{$trans->Nama_Pegawai}}</td>
							<td>{{$trans->Total_Biaya}}</td>
							<td>{{$trans->Waktu_Transaksi}}</td>
							<td>
								<button type="button" class="btn btn btn-danger btn-xs" data-toggle="modal" data-target="#myModalHapus{{ $trans->ID_Transaksi}}">Hapus Transaksi </button>
																{{--Modal--}}
																<div class="modal fade" id="myModalHapus{{ $trans->ID_Transaksi }}" role="dialog">
																	<div class="modal-dialog">
																			{{--Modal content--}}
																			<div class="modal-content">
																					<div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal">&times;</button>
																							<h4 class="modal-title">Hapus Transaksi Data</h4>
																					</div>
																					<div class="modal-body">
																							<p>Anda yakin menghapus data transaksi ini?</p>
																					</div>
																					<div class="modal-footer">
																						<a href="{{url('/')}}/transaksi/delete/{{ $trans->ID_Transaksi }}" class="btn btn-default" role="button">ya</a>
																						<button type="button" class="btn btn-default" data-dismiss="modal">tidak</button>
																					</div>
																			</div>
																		</div>
																</div>
																<a href="{{url('/')}}/transaksi/tabelkt/{{$trans->ID_Transaksi}}" class= "btn btn-success btn-xs">Lihat Keranjang Transaksi</a>

						</td>
						</tr>
						@endforeach

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
