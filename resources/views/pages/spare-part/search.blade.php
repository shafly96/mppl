@extends('master.master')

@section('content')

<div class="row">
	<!-- left column -->
	<div class="col-xs-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Search Spare Part</h3>
			</div><!-- box-header -->
			<!-- form start -->
			<form action="{{url('/')}}/spare-part/@if(isset($sparepart))update/{{$sparepart->ID_Sparepart}} @else
			insert @endif" method="POST" role="form" enctype="multipart/form-data" id="srcspare">
				<div class="box-body">
					<div class="form-group">
						<label style="width:100%;">Jenis Kendaraan</label>
            <select onchange="getSparepart(this.value)" class="js-example-basic-single" style="width:100%;">
                <option value="" >--</option>
                @foreach($kendaraan as $bike)
                  <option value="{{$bike->Kendaraan_Sparepart}}">{{$bike->Kendaraan_Sparepart}}</option>
                @endforeach
            </select>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					</div>

          <div id="dropspare"></div>
					<div id="hasil"></div>
				</div><!-- /.box-body -->

				<div class="box-footer">
				</div>
			</form>
		</div><!-- /.box -->
	</div>
</div>



@include('master.script')
<!-- Select2-->
<script type="text/javascript">


// function getSparepart(str) {
//   if (str.length==0) {
//     document.getElementById("dropspare").innerHTML="";
//     document.getElementById("dropspare").style.border="0px";
//     return;
//   }
//   if (window.XMLHttpRequest) {
//     // code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else {  // code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("dropspare").innerHTML=this.responseText;
//     //  document.getElementById("dropspare").style.border="1px solid #A5ACB2";
//     }
//   }
//   xmlhttp.open("GET","{{url('/')}}/spare-part/dropspare/"+str,true);
//   xmlhttp.send();
// }

function getSparepart(str){
	$.ajax({
		type : "GET",
		cache: false,
		url : "{{url('/')}}/spare-part/dropspare/"+ str,
		dataType: "html",
		success: function(res){
			$('#srcspare').find('#dropspare').html(res);
			$('.single').select2();
		}
	});
}

function ShowHasilPencarian(str) {
  if (str.length==0) {
    document.getElementById("hasil").innerHTML="";
//    document.getElementById("hasil").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("hasil").innerHTML=this.responseText;
    //  document.getElementById("dropspare").style.border="1px solid #A5ACB2";
			$(".single").select2();
		}
  }
  xmlhttp.open("GET","{{url('/')}}/spare-part/ShowHasilPencarian/"+str,true);
  xmlhttp.send();
}
$(document).ready(function() {
  $(".js-example-basic-single").select2();
  //$("#single").select2();

});

</script>

@stop
