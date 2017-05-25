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
				<h3 class="box-title">Tabel Keranjang Transaksi</h3>	<br><a href="{{url('/')}}/transaksi/updatekt/{{$id}}"><div class="btn btn-info btn-xs">Update Transaksi</div></a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID Keranjang</th>
              <th>ID Transaksi</th>
							<th>Tipe Transaksi</th>
							<th>Transaksi</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($ktransaksispr))
						@foreach($ktransaksispr as $ktrans)
						<tr>
							<td>{{$ktrans->ID_Keranjang}}</td>
							<td>{{$ktrans->ID_Transaksi}}</td>
							<td>{{$ktrans->Tipe_Transaksi}}</td>
              <td>Pembelian {{$ktrans->Nama_Sparepart}}</td>
              <td>{{$ktrans->Harga_Sparepart}}</td>
							<td>
								<button type="button" class="btn btn btn-danger btn-xs" data-toggle="modal" data-target="#myModalHapus{{ $ktrans->ID_Transaksi}}">Hapus Transaksi </button>
																{{--Modal--}}
																<div class="modal fade" id="myModalHapus{{ $ktrans->ID_Transaksi }}" role="dialog">
																	<div class="modal-dialog">
																			{{--Modal content--}}
																			<div class="modal-content">
																					<div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal">&times;</button>
																							<h4 class="modal-title">Hapus Keranjang Transaksi Data</h4>
																					</div>
																					<div class="modal-body">
																							<p>Anda yakin menghapus data keranjan transaksi ini?</p>
																					</div>
																					<div class="modal-footer">
																						<a href="{{url('/')}}/transaksi/deletekt/{{ $ktrans->ID_Keranjang }}" class="btn btn-default" role="button">ya</a>
																						<button type="button" class="btn btn-default" data-dismiss="modal">tidak</button>
																					</div>
																			</div>
																		</div>
																</div>

						</td>
						</tr>
						@endforeach
						@endif
						@if($ktransaksiser)
            @foreach ($ktransaksiser as $ktranse)
            <tr>
              <td>{{$ktranse->ID_Keranjang}}</td>
              <td>{{$ktranse->ID_Transaksi}}</td>
              <td>{{$ktranse->Tipe_Transaksi}}</td>
              <td>Pengerjaan {{$ktranse->Deskripsi_Servis}}</td>
              <td>{{$ktranse->Harga_Servis}}</td>
              <td>
                <button type="button" class="btn btn btn-danger btn-xs" data-toggle="modal" data-target="#myModalHapus{{ $ktranse->ID_Keranjang}}">Hapus Transaksi </button>
                                {{--Modal--}}
                                <div class="modal fade" id="myModalHapus{{ $ktranse->ID_Keranjang }}" role="dialog">
                                  <div class="modal-dialog">
                                      {{--Modal content--}}
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Hapus Keranjang Transaksi Data</h4>
                                          </div>
                                          <div class="modal-body">
                                              <p>Anda yakin menghapus data keranjan transaksi ini?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <a href="{{url('/')}}/transaksi/deletekt/{{ $ktranse->ID_Keranjang }}" class="btn btn-default" role="button">ya</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">tidak</button>
                                          </div>
                                      </div>
                                    </div>
                                </div>

            </td>
            </tr>
            @endforeach
						@endif
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
