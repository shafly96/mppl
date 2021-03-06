@extends('master.master')

@section('content')


<!-- tabel -->
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Tabel Report Per-Bulan</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Bulan</th>
              <th>Tahun</th>
							<th>Pemasukan</th>
							<th>Jumlah Transaksi</th>
						</tr>
					</thead>
					<tbody>
            @foreach($msales as $sale)
            <tr>
              <td>
                {{$sale->Bulan}}
              </td>
              <td>
                {{$sale->Tahun}}
              </td>
              <td>
                {{$sale->Pemasukan}}
              </td>
              <td>
                {{$sale->Jumlah_Transaksi}}
              </td>
            </tr>
            @endforeach

          </tbody>
          <tfoot>

  				</tfoot>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div>

<script type="text/javascript">

window.onload = function(){
  $('#example1').DataTable();

// Get context with jQuery - using jQuery's .get() method.
var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
// This will get the first returned node in the jQuery collection.
var areaChart = new Chart(areaChartCanvas);

var areaChartData = {
  labels: ["January", "February", "March", "April", "May", "June", "July", "August","September","October","November","December"],
  datasets: [
    {
      label: "Digital Goods",
      fillColor: "rgba(60,141,188,0.9)",
      strokeColor: "rgba(60,141,188,0.8)",
      pointColor: "#3b8bba",
      pointStrokeColor: "rgba(60,141,188,1)",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(60,141,188,1)",
      data: [28, 48, 40, 19, 86, 27, 90,20,11,12,12,44,14]
    }
  ]
};

var areaChartOptions = {
  //Boolean - If we should show the scale at all
  showScale: true,
  //Boolean - Whether grid lines are shown across the chart
  scaleShowGridLines: false,
  //String - Colour of the grid lines
  scaleGridLineColor: "rgba(0,0,0,.05)",
  //Number - Width of the grid lines
  scaleGridLineWidth: 1,
  //Boolean - Whether to show horizontal lines (except X axis)
  scaleShowHorizontalLines: true,
  //Boolean - Whether to show vertical lines (except Y axis)
  scaleShowVerticalLines: true,
  //Boolean - Whether the line is curved between points
  bezierCurve: true,
  //Number - Tension of the bezier curve between points
  bezierCurveTension: 0.3,
  //Boolean - Whether to show a dot for each point
  pointDot: false,
  //Number - Radius of each point dot in pixels
  pointDotRadius: 4,
  //Number - Pixel width of point dot stroke
  pointDotStrokeWidth: 1,
  //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
  pointHitDetectionRadius: 20,
  //Boolean - Whether to show a stroke for datasets
  datasetStroke: true,
  //Number - Pixel width of dataset stroke
  datasetStrokeWidth: 2,
  //Boolean - Whether to fill the dataset with a color
  datasetFill: true,
  //String - A legend template
  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
  //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  maintainAspectRatio: true,
  //Boolean - whether to make the chart responsive to window resizing
  responsive: true
};

//Create the line chart
areaChart.Line(areaChartData, areaChartOptions);
};
</script>

@include('master.script')
<script src="{{url('')}}/plugins/chartjs/Chart.min.js"></script>

@stop
