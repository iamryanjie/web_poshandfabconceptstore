<?php
function view_user()
{

	require_once ('Controller/db.php');
	if (!$db)
	{
		trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	}	
					$result = mysqli_query($db,"SELECT * from tbl_useraccounts where col_usertypeid  = 2 and col_status = 'unarchived'");
									
						while ($row = mysqli_fetch_assoc($result))
						 {
							$Lname = 	$row['col_lastname'];
							$Fname= 	$row['col_firstname'];
							$Mname= 	$row['col_middlename'];
							$Uname= 	$row['col_user'];
							$Pass= 		$row['col_password'];
							$status= 	$row['col_status'];
							
							echo '<tr class="odd gradeX">
									<td>'.$Uname.'</td>
									<td>'.$Pass.'</td>
									<td>'.$Lname.'</td>
									<td>'.$Fname.'</td>
									<td>'.$Mname.'</td>
									
									
									
								</tr>';
						 }
						}
							 					 
?>