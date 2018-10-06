<?php require_once ('Controller/db.php'); ?> 

<?php require_once ('header.php'); ?> 

  <body class="hold-transition skin-red-light sidebar-mini">
	<?php include 'headernav.php'; ?>
   
   <div class="content-wrapper">

    
	   <section class="content-header">
           <h1> Sales Table </h1>
           <br/>
          <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"></span>
                  <div class="info-box-content">

                    <span class="info-box-text">Number of Transactions</span>
                    <span class="info-box-number"> <?php
                       
                      $result=mysqli_query($db, 'SELECT Count(col_transactioncode) as sales FROM tbl_transaction');
                      $row = mysqli_fetch_assoc($result);
                      $sum = $row['sales'];
                      echo $sum;
                    ?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>

              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"> </span>
                    <div class="info-box-content">
            
                      <span class="info-box-text">Total Sales</span>
                      <span class="info-box-number"> 
                      <?php
                        
                        $result=mysqli_query($db, 'SELECT SUM(col_totalprice) as value FROM tbl_transaction');
                        $row = mysqli_fetch_assoc($result);
                        $sum = $row['value'];
                        echo $sum;
                      ?>
                      </span>
                    </div><!-- /.info-box-content -->
                  </div><!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">


                            <div class="info-box">
                              <span class="info-box-icon bg-green"></span>
                              <div class="info-box-content">
                      
                                <span class="info-box-text">Number of Sales</span>
                                <span class="info-box-number"> <?php
                                  
                                  $result=mysqli_query($db, 'SELECT Count(col_orderstatus) as sales FROM tbl_order where col_orderstatus="Sales"');
                                  $row = mysqli_fetch_assoc($result);
                                  $sum = $row['sales'];
                                  echo $sum;
                                ?></span>
                              </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"></span>
                  <div class="info-box-content">
          
                    <span class="info-box-text">Void Items</span>
                    <span class="info-box-number"> <?php
                      

                      $result=mysqli_query($db, 'SELECT Count(col_orderstatus) as void from tbl_order where col_orderstatus="Void"');

                      $row = mysqli_fetch_assoc($result);
                      $sum = $row['void'];
                      echo $sum;
                    ?></span>
                  </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
              </div>
           </div  >
        </section>
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content --
        <!-- Content Header (Page header) -->
		

        <!-- Main content -->
        <section class="content">
		       
              <div class="box">
			
              <div class="box-body">
                <div class="input-group" style="width: 300px;" align="right" >
                    <input type="text" name="table_search" id="searchInputSales" onkeyup="searchFuncSales()" class="form-control input-sm pull-right" placeholder="Search. . . .">
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-danger">Go</button>
                </div> 
              </div>

                  
            			<div class="panel_body" align="right" style="margin-top: -30px;">
            			  
<!--             			<b>From:</b>
                  <input type="date" name="fromdate" id="fromdate" placeholder="From">
            			<b>To: </b>
                  <input type="date" name="todate" id="todate" placeholder="To">  
 -->        <!--     			<button class = "btn btn-danger btn-md">GO</button> -->
                   <br/>
                   <br/>
            			</div>
            			
            			<table id="salesTable" class="table table-bordered table-hover">
            			<tr>
                        <tbody>
                                  <th>Date Purchased</th>
                                  <th>Transaction Code</th>
            											<th>Product Code</th>
                                  <th>Product Name</th>
                                  <th>Product Price</th>
            											<th>Number of Product Sold</th>
            											<th>SubTotal</th>
            											
            											
                              <?php
            									$query = "SELECT * from tbl_order o
                              inner join tbl_product p on o.col_productid = p.col_productid
                              inner join tbl_transaction t on o.col_transactionid = t.col_transactionid         
                              ";
                              
                              if(isset($_SESSION['userId']) && $_SESSION['usertype'] != '1'){
                                $query = "SELECT * from tbl_order o 
                                inner join tbl_product p on o.col_productid = p.col_productid 
                                inner join tbl_transaction t on o.col_transactionid = t.col_transactionid 
                                inner join tbl_brandpartner b on b.col_useraccountsid = p.col_useraccountsid 
                                where b.col_useraccountsid = " . $_SESSION['userId'] ;
                              }

                              $result = mysqli_query($db, $query);
                                while ($row = mysqli_fetch_assoc($result))
                                 {
                                  $tcode =      $row['col_transactioncode'];
                                  $datepurchased=   $row['col_dateofpurchase'];
                                  $pcode=       $row['col_productcode'];
                                  $productname =    $row['col_productname'];
                                  $price =      $row['col_productprice']; 
                                  $quantity =     $row['col_quantitybought'];
                                  $subtotal =     $row['col_subtotal'];
                                  
                                  echo '<tr class="">
                                      <td>'.$datepurchased.'</td>
                                      <td>'.$tcode.'</td>
                                      <td>'.$pcode.'</td>
                                      <td>'.$productname.'</td>
                                      <td>'.$price.'</td>
                                      <td>'.$quantity.'</td>
                                      <td>'.$subtotal.'</td>
                                      
                                    </tr>';
                                 }
            									?>
            									</tbody>
            									</tr>
            									
                                    
            									</table>
                              
            								

                          </div><!-- /.box -->
                      <!-- /.col -->

                    </section>
            		  <section class="content">

		

            


						
						
						</DIV	>
						
            
         
     </div>
	 
		</section>
    </div><!-- ./wrapper -->
    <?php include 'footer_jqueries.php'; ?>
	  
	
  </body>
</html>
