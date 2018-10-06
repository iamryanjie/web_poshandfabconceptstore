<?php
require("db.php");

session_start();
// Get values paste from form in login.php file
$password = $_POST['cpassword'];
$userid = $_SESSION['userId'];

$password = (string)$password;
$query = sprintf("UPDATE tbl_useraccounts SET col_password = '".$password."' WHERE col_useraccountsid = $userid ");
// echo $query;
$result = mysqli_query($db, $query);
echo $result;


?>
