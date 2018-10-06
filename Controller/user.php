<?php
function view_user()
{
	$db = mysqli_connect('localhost', 'root','','db_poshconceptstorefinal');
	if (!$db)
	{
		trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
	}	
					$result = mysqli_query($db,"SELECT * from tbl_useraccounts u
					inner join tbl_usertype b on u.col_usertypeid = b.col_usertypeid
					");
									
						while ($row = mysqli_fetch_assoc($result))
						 {
							$Lname = 	$row['col_lastname'];
							$Fname= 	$row['col_firstname'];
							$Mname= 	$row['col_middlename'];
							$usertype = $row['col_userrole'];
							$status= 	$row['col_status'];
							
							echo '<tr class="odd gradeX">
									<td>'.$Lname.'</td>
									<td>'.$Fname.'</td>
									<td>'.$Mname.'</td>
									<td>'.$usertype.'</td>
									<td>'.$status.'</td>
									
								</tr>';
						 }
						}
							 					 
?>