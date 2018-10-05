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

$userid = $_SESSION['userId'];

$query = sprintf("UPDATE tbl_useraccounts SET col_firstname = '".$fname."', col_lastname = '".$lname."', col_middlename = '".$mname."', col_address = '".$address."', col_contactnum = '".$contact."', col_gender = '".$gender."', col_email = '".$email."' WHERE col_useraccountsid = $userid ");
// echo $query;
$result = mysqli_query($db, $query);

$_SESSION['userLastname']  = $lname;
$_SESSION['userFirstname']  = $fname;
$_SESSION['userMiddlename']  = $mname;
$_SESSION['userAddress']  = $address;
$_SESSION['userGender']  = $gender;
$_SESSION['userConnum']  = $contact;
$_SESSION['userEmail']  = $email;

echo $result;


?>