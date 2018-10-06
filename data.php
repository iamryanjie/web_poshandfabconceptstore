<?php require ('header.php'); ?> 

  <body class="hold-transition skin-red sidebar-mini">
   <header class="main-header">
        <!-- Logo -->
        <a href="data.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">PCS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Posh Concept Store </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
           
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
                        
              <!-- Notifications: style can be found in dropdown.less -->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
				  
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>
      </header>
	  
      
  
          <!-- Sidebar user panel -->
         
          <!-- search form -->
		  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          
          <ul class="sidebar-menu">
            <li>
              <a href="data.php">
                <i class="fa fa-th"></i> <span>Sales</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts and Graphs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Pie Charts</a></li>
				<li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Bar Graphs</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cart-arrow-down"></i> <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> Damage</a></li>
                <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Fix</a></li>
              </ul>
            </li>
           
         
        </section>
        <!-- /.sidebar -->
			</ul>
      </aside>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
   </section>
   <div class="content-wrapper">

    
	   <section class="content-header">
          <h1>
           <h1> Sales Table </h1>
          </h1>
          
        </section>
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content --
        <!-- Content Header (Page header) -->
		

        <!-- Main content -->
        <section class="content">
		       
              <div class="box">
			
               <div class="box-body">

                  
			<div class="panel_body" align="right">
			  
			<b>From:</b>
			<input type="t" name="fromdate" id="fromdate" >
			<b>To: </b>
			<input type="date"  name="todate" id="todate" >
			
			</div>
			
			<table id="example2" class="table table-bordered table-hover">
			<tr>
            <tbody>
                                            <th>Transaction Code</th>
											<th>Date Purchased</th>
											<th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
											<th>Number of Product Sold</th>
											<th>SubTotal</th>
											
                  <?php
									require 'Controller/controller.php'
									?>
                                        
                   

                                    <?php 
									
                                    view_sales();
                                    ?>
                                    </tbody>
									</tr>
									
                        
									</table>
                  
									  <h5 class="box-title">Total Sales: Php
									  <?php
									  $db = mysqli_connect('localhost', 'root', '','db_poshconceptstorefinal');
									  if (!$db){trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());}	
									  $result=mysqli_query($db, 'SELECT SUM(col_totalprice) as value FROM tbl_transaction');
									  $row = mysqli_fetch_assoc($result);
									  $sum =$row['value'];
									  echo $sum;
									?>
									</h5>
                    <h5 class="box-title">Number of Sales: 
									<?php
									  $db = mysqli_connect('localhost', 'root', '','db_poshconceptstorefinal');
									  if (!$db){trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());}	
									  $result=mysqli_query($db, 'SELECT Count(col_totalprice) as value FROM tbl_transaction');
									  $row = mysqli_fetch_assoc($result);
									  $sum =$row['value'];
									  echo $sum;
									?>
									</h5>

              </div><!-- /.box -->
          
              
        </section><!-- /.content -->
   </div><!-- /.content-wrapper -->
       </div>
         
     </div>
    </div><!-- ./wrapper -->
		</section>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
	<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function (){
        $('#example2').dataTable({
			
		  "responsive": true,
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true,
          
        });
		 
      });
    </script>
	  
	
  </body>
</html>
