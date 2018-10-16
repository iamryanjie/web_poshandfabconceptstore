<?php

require_once('db.php');
session_start();
//echo $_SESSION['userId'];
if ( $_POST['begindate'] && $_SESSION['userId'] && $_POST['stopdate']){
//echo $_SESSION['userId]];
	// convert string to date
	$stopdate = $_POST["stopdate"];
	$begindate = strtotime($_POST["begindate"]);
	$begindate = date("Y-m-d", $begindate);
	$stopdate = strtotime($_POST["stopdate"]);
	$stopdate = date("Y-m-d", $stopdate);

	//query to get data from the table
	// SELECT * from tbl_order o inner join tbl_product p on o.col_productid = p.col_productid inner join tbl_transaction t on o.col_transactionid = t.col_transactionid 
	$query = sprintf("SELECT * from tbl_product p inner join tbl_order o on o.col_productid = p.col_productid inner join tbl_transaction t on o.col_transactionid = t.col_transactionid WHERE col_dateofpurchase >= date('".$begindate."') AND col_dateofpurchase <= date('".$stopdate."') ORDER BY col_dateofpurchase DESC");
	if($_SESSION['usertype'] != '1'){
		$query = sprintf("SELECT * from tbl_product p inner join tbl_order o on o.col_productid = p.col_productid inner join tbl_transaction t on o.col_transactionid = t.col_transactionid WHERE p.col_useraccountsid = '".$_SESSION['userId']."' AND col_dateofpurchase >= date('".$begindate."') AND col_dateofpurchase <= date('".$stopdate."') ORDER BY col_dateofpurchase DESC" );	
	}
	$data = array();
	$result = mysqli_query($db, $query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$data[] = $row;
	}

	echo json_encode($data);
	
	
}

?>
