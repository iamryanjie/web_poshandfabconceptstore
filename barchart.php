<?php require ('header.php'); ?> 

 <body class="hold-transition skin-red-light sidebar-mini">
	<?php include 'headernav.php'; ?>

   <div class= "content-wrapper">

        <section class="content-header">
         <h1>
              <h1> Sales Bar Graph </h1>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">

              <div class="box">
			
                <div class="box-body">
					
                    <div class="panel_body" align="left">
						<form action="barChart.php" method="post">
							<b>From:</b>
							<input type="date" name="fromdate" id="fromdate" placeholder="From">
							<b>To: </b>
							<input type="date" name="todate" id="todate" placeholder="To">  
							<input class = "btn btn-danger btn-md" type="submit" id="submit" name="submit" value="GO"  onclick="searchDate();">
						</form>
					</div>
			   </div>

			   <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Bar Graph</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height: 231px; width: 514px;" width="514" height="231"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div>
			   
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php 
//header_remove(); 
 include ('dataChart.php'); 
 ?>   
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>

    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
	
    <!-- page script -->
    <script>
      $(function ()
	  {
        $('#example2').DataTable(
		{
			
		  "responsive": true,
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          
        });
      });
	  $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */
		 function filterFile()
		 {
			 var myfile;
			if(document.getElementById('submit').clicked == true)
			{
				myfile = "dataChartFilter.php";
			}
			else
			{
				myfile = "dataChart.php";
				//myfile = "dataChartFilter.php";
			}
			return myfile;
		 }
				
		$.ajax({
			
		
		url: "dataChart.php", //filterFile(),
		dataType: "json",
		method: "POST",
		success: function(data) {
			console.log(data);
			var date = [];
			var sales = [];

			for(var i in data) {
				date.push(data[i].date);
				sales.push(data[i].sales);
			}

			var areaChartData = {
				labels: date,
				datasets : [
					{
						label: 'Daily Sales',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: sales
					}
				]
			};

		//-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
		};

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);	
		},
		error: function(data) {
			console.log(data);
		}
	});

	});
	
	
	$(function searchDate() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */
		 
			console.log(data);
			var date = [];
			var sales = [];

			for(var i in data) {
				date.push(data[i].date);
				sales.push(data[i].sales);
			}

			var areaChartData = {
				labels: date,
				datasets : [
					{
						label: 'Daily Sales',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: sales
					}
				]
			};

		//-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        var barChartOptions = {
			  //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
			  scaleBeginAtZero: true,
			  //Boolean - Whether grid lines are shown across the chart
			  scaleShowGridLines: true,
			  //String - Colour of the grid lines
			  scaleGridLineColor: "rgba(0,0,0,.05)",
			  //Number - Width of the grid lines
			  scaleGridLineWidth: 1,
			  //Boolean - Whether to show horizontal lines (except X axis)
			  scaleShowHorizontalLines: true,
			  //Boolean - Whether to show vertical lines (except Y axis)
			  scaleShowVerticalLines: true,
			  //Boolean - If there is a stroke on each bar
			  barShowStroke: true,
			  //Number - Pixel width of the bar stroke
			  barStrokeWidth: 2,
			  //Number - Spacing between each of the X value sets
			  barValueSpacing: 5,
			  //Number - Spacing between data sets within X values
			  barDatasetSpacing: 1,
			  //String - A legend template
			  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
			  //Boolean - whether to make the chart responsive
			  responsive: true,
			  maintainAspectRatio: true
			};

			barChartOptions.datasetFill = false;
			barChart.Bar(barChartData, barChartOptions);	
			
		

	});
    </script>
  </body>
</html>
