<!DOCTYPE html>
<html>
<head>
	@include('master.head')
	<style type="text/css">
		.btn:hover{
			transform: scale(1.2);
			transition: all .2s ease-in-out;
			background-color: white;
			border-color: #02C1EF;
			color: #02C1EF;
		}
	</style>
</head>
<body>
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
	<div class="col-md-12" style="text-align: center">

		<p class="auto" style="margin-top: 320px; font-size: 120px;">Auto+</p>
		<p><a class="btn btn-info" style="width: 100px; margin-right: 1%;" data-toggle="modal" data-target="#myModal">Login</a><a href="{{url('')}}/guest" class="btn btn-info" style="width: 100px;">Guest</a></p>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog" style="margin-top: 200px;">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Login</h4>
					</div>
						<form role="form" class="proximaLight" action="{{url('/')}}/logs" method="POST" >
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="modal-body">

								<div class="form-group">
										<label class="pull-left">User ID</label>
										<input class="form-control" name="userid" required>
								</div>
								<div class="form-group">
										<label class="pull-left">Password</label>
										<input type="password" class="form-control" name="password" required>
								</div>
								<div class="form-group">
										<label class="pull-left">Login Sebagai</label>
										<select class="form-control" name="role" required>
												<option value=""></option>
												<option value="1">Pegawai</option>
												<option value="2">Pelanggan</option>
										</select>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-info btn-md" type="submit" name="button" style="margin:0px 10px;">Submit</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</form>

				</div>
			</div>
		</div>
	</div>
</body>

@include('master.script')

</html>
