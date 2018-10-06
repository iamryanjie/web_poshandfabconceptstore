<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <!-- <script src="datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="datatables/dataTables.bootstrap.min.js"></script> -->
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
	
    <!-- page script -->
    


    <!-- FOR PROFILE TAB HEREEEE ====== -->
    <script>

    	
      $(function (){
      	showbargraph();
      	// for changing password
		$(".btn-changepass").click(function(){
			var newpass = $("#newpass").val();
			var conpass = $("#conpass").val();

			if(newpass.trim().length == 0 || conpass.trim().length == 0){
				$(".errormessage").html("<span style='color:red; font-weight:strong;'>Error, Password fields are empty!</span>");
				return
			}
			if($("#newpass").val() != $("#conpass").val()){
				$(".errormessage").html("<span style='color:red; font-weight:strong;'>Error, Password does not match!</span>");
				return
			}
			if($("#newpass").val().length < 7 || $("#conpass").val() < 7){

				if($("#newpass").val().length == 0 || $("#conpass").val() == 0){
					$(".errormessage").html("<span style='color:red; font-weight:strong;'>Error, Password fields are empty!</span>");
					return

				}else{
					$(".errormessage").html("<span style='color:red; font-weight:strong;'>Error, You got a weak Password!</span>");
					return
				}
			}
			if($("#newpass").val() == $("#conpass").val()){
				var passdata = {'cpassword':$("#newpass").val()}
				$.ajax({  
				    type: 'POST',  
				    url: "Controller/changepassword.php",
				    data: {cpassword:$("#newpass").val()},
				    success: function(response) {
				        $("#newpass").val("");
						$("#conpass").val("");
				        if(response == '1'){
							$(".errormessage").html("<span style='color:green; font-weight:strong;'>Success, Password updated!</span>");        	
				        }else{
				        	$(".errormessage").html("<span style='color:red; font-weight:strong;'>Error, Contact Administrator!</span>");
				        }
				    }
				});
				
						
			}
		});

		// for profile update
		$(".udpateprofile").click(function(){
			if($("#newpass").val() == $("#conpass").val()){
				var profiledata = {
					"pro-fname": $("#pro-fname").val(),
					"pro-lname": $("#pro-lname").val(),
					"pro-mname": $("#pro-mname").val(),
					"pro-address": $("#pro-address").val(),
					"pro-contact": $("#pro-contact").val(),
					"pro-gender": $("#pro-gender").val(),
					"pro-email": $("#pro-email").val(),
				}
				$.ajax({  
				    type: 'POST',  
				    url: "Controller/updateprofile.php",
				    data: profiledata,
				    success: function(response) {
				    	if(response == '1'){
							$(".errormessage").html("<span style='color:green; font-weight:strong;'>Success, Password updated!</span>");        	
				        }else{
				        	$(".errormessage").html("<span style='color:red; font-weight:strong;'>Error, Contact Administrator!</span>");
				        }
				    }
				});
				
						
			}
		}); 

      });
	</script>
	<!-- END OF PROFILE TAB JQUERIESS -->





	<!-- FOR BAR GRAPH IN DASHBOARD TAB HEREEEE ====== -->
    <script>
    
	  $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */
         $(".btn-daterange").click(function(){
         	var fromdate = $("#fromdate").val();
         	var todate = $("#todate").val();
         	console.log($("#fromdate").val())
         	console.log($("#todate").val())
         	showbargraph(fromdate, todate);

			});
		});
		
		// ======= BAR GRAPH DESIGN BY JQUERY PLUGIN ============ \\
		function showbargraph(fromdate, todate){
			$.ajax({
			type: "POST",
			url: "dataChart.php",
			data: {fromdate : $("#fromdate").val(), todate : $("#todate").val()},
			success: function(data) {

				data = $.parseJSON(data);
				
				/* ChartJS
		         * -------
		         * Here we will create a few charts using ChartJS
		         */
				 
					
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
		}
    </script>
    <!-- END OF GRAPH IN DASHBOARD TAB -->



    <!-- CASHIER TAB HEREEEEE -->
    <script type="text/javascript">
    	function searchFunc() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("searchInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("cashierTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}       
		  }
		}
    </script>
    <!-- END OF CASHIER TAB HEREEEE -->






    <!-- BRAND PARTNERS TAB HEREEEEE -->
    <script type="text/javascript">
	function searchFuncBrandpartners() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("searchInputBrandpartners");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("brandPartnerTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}       
		  }
		}
    </script>
    <!-- END OF BRAND PARTNERS TAB HEREEEE -->


    <!-- SALES TAB HEREEEE -->
    <script type = "text/javascript">
    function searchFuncSales(){
    	var input, filter, table, tr, td, i;
    	input = document.getElementById("searchInputSales");
    	filter = input.value.toUpperCase();
    	table = document.getElementById("salesTable");
    	tr = table.getElementsByTagName("tr");
    	for(i = 2; i < tr.length; i++){
    		td = tr[i].getElementsByTagName("td")[2];
    		if(td){
    			if(td.innerHTML.toUpperCase().indexOf(filter) > -1){
    				tr[i].style.display = "";
    			}else{
    				tr[i].style.display = "none";
    			}
    		}
    	}
    }
    </script>
	  <!-- DAMAGE TAB HEREEEE -->
    <script type = "text/javascript">
    function searchFuncDamage(){
    	var input, filter, table, tr, td, i;
    	input = document.getElementById("searchInputDamage");
    	filter = input.value.toUpperCase();
    	table = document.getElementById("damageTable");
    	tr = table.getElementsByTagName("tr");
    	for(i = 0; i < tr.length; i++){
    		td = tr[i].getElementsByTagName("td")[0];
    		if(td){
    			if(td.innerHTML.toUpperCase().indexOf(filter) > -1){
    				tr[i].style.display = "";
    			}else{
    				tr[i].style.display = "none";
    			}
    		}
    	}
    }
    </script>
