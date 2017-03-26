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
	<div class="col-md-12" style="text-align: center">
		<p class="auto" style="margin-top: 320px; font-size: 120px;">Auto+</p>
		<p><a class="btn btn-info" style="width: 100px; margin-right: 1%;" data-toggle="modal" data-target="#myModal">Login</a><a href="{{url('')}}/guest" class="btn btn-info" style="width: 100px;">Guest</a></p>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog" style="margin-top: 300px;">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
						<p>Some text in the modal.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

@include('master.script')

</html>