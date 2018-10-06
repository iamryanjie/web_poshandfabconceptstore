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
						<form method="post">
							<b>From:</b>
							<input type="date" name="fromdate" id="fromdate" placeholder="From">
							<b>To: </b>
							<input type="date" name="todate" id="todate" placeholder="To">  
							<input class = "btn btn-danger btn-md btn-daterange" type="button" id="submit" name="submit" value="GO">
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
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <?php include 'footer_jqueries.php'; ?>




  </body>
</html>
