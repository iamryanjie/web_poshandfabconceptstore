<?php
function view_damageproduct()
{
	require_once ('Controller/db.php');
	if (!$db)
	{
		trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	}	
					$result = mysqli_query($db,"select t.col_transactioncode, p.col_productcode, 
					p.col_productname, p.col_productprice, d.col_staticquantity, d.col_status from tbl_damage d
                INNER JOIN tbl_order o ON d.col_orderid = o.col_orderid 
                INNER JOIN tbl_transaction t ON t.col_transactionid = o.col_transactionid                
                INNER JOIN tbl_product p ON p.col_productid = o.col_productid
                where d.col_status='Refunded' OR d.col_status='Changed'");
									
						while ($row = mysqli_fetch_assoc($result))
						 { 
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
						}
							 					 
?>