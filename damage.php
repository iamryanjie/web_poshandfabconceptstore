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
                                        require_once ('db.php');
                                          if (!$db){
                                            trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
                                          }       
                                                if(isset($_SESSION['userId']) && $_SESSION['usertype'] != '1'){
                                                  $result = mysqli_query($db,"SELECT t.col_transactioncode, p.col_productcode, p.col_productname, p.col_productprice, d.col_staticquantity, d.col_status from tbl_damage d INNER JOIN tbl_order o ON d.col_orderid = o.col_orderid INNER JOIN tbl_transaction t ON t.col_transactionid = o.col_transactionid INNER JOIN tbl_product p ON p.col_productid = o.col_productid where (d.col_status='Refunded' OR d.col_status='Changed') AND p.col_useraccountsid = '".$_SESSION['userId']."'");
                                                }else{
                                                  $result = mysqli_query($db,"SELECT t.col_transactioncode, p.col_productcode, p.col_productname, p.col_productprice, d.col_staticquantity, d.col_status from tbl_damage d INNER JOIN tbl_order o ON d.col_orderid = o.col_orderid INNER JOIN tbl_transaction t ON t.col_transactionid = o.col_transactionid INNER JOIN tbl_product p ON p.col_productid = o.col_productid where d.col_status='Refunded' OR d.col_status='Changed' ");
                                                }
                                                $data = mysqli_fetch_assoc($result);
                                                if($data){
                                                    while ($row = mysqli_fetch_assoc($result)){ 
                                                      
                                                        $tcode =  $row['col_transactioncode'];
                                                        $pcode = $row['col_productcode'];
                                                        $pname = $row['col_productname'];
                                                        
                                                        $quantity = $row['col_staticquantity'];
                                                        $pprice = $row['col_productprice'];
                                                        $status = $row['col_status'];
                                                        
                                                        echo '<tr class="odd gradeX">
                                                            <td>'.$tcode.'</td>
                                                          <td>'.$pcode.'</td>
                                                          <td>'.$pname.'</td>
                                                          <td>'.$pprice.'</td>
                                                          
                                                          <td>'.$quantity.'</td>
                                                          <td>'.$status.'</td>
                                                            
                                                          </tr>';
                                                      }
                                                    }else{
                                                        echo '<tr class="odd gradeX">
                                                            <td>No data found.</td>
                                                          </tr>';
                                                      }
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

