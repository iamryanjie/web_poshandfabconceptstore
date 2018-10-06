<?php require ('header.php'); ?> 

  <body class="hold-transition skin-red-light sidebar-mini">
 <?php include 'headernav.php'; ?>

 <div class= "content-wrapper">

        <section class="content-header">
         <h1>
              <h1> Damage Product </h1>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">

              <div class="box">
			
                <div class="box-body">

                    <div class="input-group" style="width: 300px;" align="right" >
                      <input type="text" name="table_search" id="searchInputDamage" onkeyup="searchFuncDamage()" class="form-control input-sm pull-right" placeholder="Search. . . .">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-danger"><i class="fa fa-search"></i></button>
                      </div>	
                    </div>
					
							<!--div class="panel_body" align="right">
			<b>From:</b>
			<input type="date" name="" value="">
			<b>To:</b>
			<input type="date" name="" value="">
               </div-->
			   </div>
			   <table id="damageTable" class="table table-bordered table-hover">
									<tr>
                                <tbody>
                                            <th>Transaction Code</th>
										    <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>	
                                            <th>Returned Quantity</th>
                                            <th>Status</th>
											
											<?php
									require 'Controller/damagequery.php'
									?>
									
									
                                        <?php
										view_damageproduct();
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
