<?php require ('header.php'); ?> 

  <body class="hold-transition skin-red-light sidebar-mini">
	<?php include 'headernav.php'; ?>

   <div class= "content-wrapper">

        <section class="content-header">
         <h1>
              <h1> Cashier Table </h1>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">

              <div class="box">
			
                <div class="box-body">

                    <div class="input-group" style="width: 300px;" align="right" >
                      <input type="text" name="table_search" id="searchInput" onkeyup="searchFunc()" class="form-control input-sm pull-right" placeholder="Search. . . .">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-danger" >Go</button>
                      </div>	
                    </div>
					
							<!--div class="panel_body" align="right">
			<b>From:</b>
			<input type="date" name="" value="">
			<b>To:</b>
			<input type="date" name="" value="">
               </div-->
			   </div>
			   <table id="cashierTable" class="table table-bordered table-hover">
				<tr>
                <tbody>
											<th>Username</th>
											  
                      <th>Last Name</th>
											<th>First Name</th>
											<th>Middle Name</th>
											 
											 <?php
									require 'cashierquery.php'
									?>
                                        
                   
				   
                                    <?php 
									
                                    view_user();
                                    ?>
                                        
                                    </tbody>
									</tr>
				</table>


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
