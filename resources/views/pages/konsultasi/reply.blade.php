@extends('master.master')

@section('content')

<div class="row">
	<!-- left column -->
	<div class="col-xs-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Balasan</h3>
			</div><!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<div class='user-block'>
					<a href="#"><h2>{{ $konsultasi->Judul }}</h2></a>
				</div><!-- /.user-block -->
				<p style="margin-bottom: 3%; padding-bottom: 1%; border-bottom: solid; border-bottom-color: #3c8dbc; border-bottom-width: 1px; font-size: 17px">
					{{ $konsultasi->Deskripsi_Konsultasi }}
				</p>

				<form class='form-horizontal' method="post" action="{{url('')}}/konsultasi/storeReply/{{ $konsultasi->ID_Konsultasi }}">
					<div class='form-group margin-bottom-none'>
						@foreach($reply as $n)
						<p style="margin-left: 2%; margin-right: 2%; border-bottom: dashed; border-bottom-color: #3c8dbc; border-bottom-width: 1px; text-align:right; font-size: 17px">
							{{ $n->Isi_Balasan}}<br><font style="font-size:12px">{{ $n->Waktu_Balas}}<font>
						</p>
						@endforeach
						<div class='col-sm-9'>
							<input class="form-control input-sm" style="margin-left: 2%" placeholder="Response" name="response" required>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class='col-sm-3'>
							<button type="submit" class="btn btn-primary" id="simpan">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.box -->
	</div>
</div>

@include('master.script')

@stop
