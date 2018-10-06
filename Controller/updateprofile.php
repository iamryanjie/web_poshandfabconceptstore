<?php
include("db.php");

session_start();
// Get values paste from form in login.php file
$email = $_POST['pro-email'];
$fname = $_POST['pro-fname'];
$lname = $_POST['pro-lname'];
$mname = $_POST['pro-mname'];
$address = $_POST['pro-address'];
$contact = $_POST['pro-contact'];
$gender = $_POST['pro-gender'];
// $email = $_POST['pro-email'];
$userid = $_SESSION['userId'];

$password = (string)$password;
$query = sprintf("UPDATE tbl_useraccounts SET col_firstname = '".$fname."', col_lastname = '".$lname."', col_middlename = '".$mname."', col_address = '".$address."', col_contactnum = '".$contact."', col_gender = '".$gender."'  WHERE col_useraccountsid = $userid ");
// echo $query;
$result = mysqli_query($db, $query);
echo $result;


?>