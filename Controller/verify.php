<?php
include("db.php");

session_start();
// Get values paste from form in login.php file
$username = $_POST['uname'];
$password = $_POST['psw'];


//$username = $db->real_escape_string($username);
// sprintf("UPDATE tbl_useraccounts SET col_password = '".$password."' WHERE col_useraccountsid = $userid ")
$query = "SELECT * FROM tbl_useraccounts WHERE col_user = '$username' AND col_password ='$password' and col_usertypeid != 2";
$result = mysqli_query($db, $query);
$rowcount=mysqli_num_rows($result);


if($rowcount == 1) 
{
	$row = mysqli_fetch_assoc($result);
	$_SESSION['user'] = $username;
	$_SESSION['usertype'] = $row['col_usertypeid'];
	$_SESSION['userId']  = $row['col_useraccountsid'];
	$_SESSION['userLastname']  = $row['col_lastname'];
	$_SESSION['userFirstname']  = $row['col_firstname'];
	$_SESSION['userMiddlename']  = $row['col_middlename'];
	$_SESSION['userAddress']  = $row['col_address'];
	$_SESSION['userGender']  = $row['col_gender'];
	$_SESSION['userConnum']  = $row['col_contactnum'];
	

	header('Location:../index.php');  
}

else{ 
	header('Location:../login.php?error=Invalid User');
}
?>