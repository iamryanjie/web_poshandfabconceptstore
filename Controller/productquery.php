<?php
function view_product()
{
	require_once ('Controller/db.php');
	if (!$db)
	{
		trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	}	
					$result = mysqli_query($db,"select * from tbl_product P
                INNER JOIN tbl_brandpartner B ON P.col_useraccountsid = B.col_useraccountsid 
                INNER JOIN tbl_category C ON C.col_categoryid = P.col_categoryid 
                where P.col_status='unarchived'");
									
						while ($row = mysqli_fetch_assoc($result))
						 {
							$pcode= $row['col_productcode'];
							$pname= $row['col_productname'];
							$pprice= $row['col_productprice'];
							$pbrand= $row['col_useraccountsid'];
							$pcategory= $row['col_categoryid'];
							$col_status= $row['col_status'];

							echo '<tr class="odd gradeX">
									
									<td>'.$pcode.'</td>
									<td>'.$pname.'</td>
									<td>'.$pprice.'</td>
									<td>'.$pbrand.'</td>
									<td>'.$pcategory.'</td>
									<td>'.$col_status.'</td>



									
								</tr>';
						 }
						}
							 					 
?>