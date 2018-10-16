<?php

require_once('db.php');
session_start();
//echo $_SESSION['userId'];
if ( $_POST['fromdate'] && $_SESSION['userId'] && $_POST['todate']){
//echo $_SESSION['userId]];
	// convert string to date
	$todate = $_POST["todate"];
	$fromdate = strtotime($_POST["fromdate"]);
	$fromdate = date("Y-m-d", $fromdate);
	$todate = strtotime($_POST["todate"]);
	$todate = date("Y-m-d", $todate);

	//query to get data from the table
	$query = sprintf("SELECT col_dateofpurchase as date, col_totalprice as sales FROM tbl_transaction WHERE  col_dateofpurchase >= date('".$fromdate."') AND col_dateofpurchase < date('".$todate."') GROUP by col_dateofpurchase ORDER BY col_dateofpurchase ASC" );	

	// change query if brand partner
	if($_SESSION['usertype'] != '1')
	{
		$query = sprintf("SELECT t.col_dateofpurchase as date,t.col_totalprice as sales FROM tbl_transaction t
		inner join tbl_order o on o.col_transactionid = t.col_transactionid 
		inner join tbl_product p on o.col_productid = p.col_productid 
		inner join tbl_brandpartner b on b.col_useraccountsid = p.col_useraccountsid 
		where b.col_useraccountsid = " . $_SESSION['userId'] . 
		" and date(col_dateofpurchase) between date('$fromdate') and date('$todate') 
		GROUP by col_dateofpurchase 
		ORDER BY col_dateofpurchase ASC");
	}
	
	$data = array();
	$result = mysqli_query($db, $query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$data[] = $row;
	}

	echo json_encode($data);
	
	
}else{
	

	//query to get data from the table
	$query = sprintf("SELECT col_dateofpurchase as date,col_totalprice as sales, col_useraccountsid FROM tbl_transaction GROUP by col_dateofpurchase ORDER BY col_dateofpurchase ASC");
	
	if($_SESSION['usertype'] != '1')
	{
		$query = sprintf("SELECT t.col_dateofpurchase as date,t.col_totalprice as sales FROM tbl_transaction t
		inner join tbl_order o on o.col_transactionid = t.col_transactionid 
		inner join tbl_product p on o.col_productid = p.col_productid 
		inner join tbl_brandpartner b on b.col_useraccountsid = p.col_useraccountsid 
		where b.col_useraccountsid = " . $_SESSION['userId'] . 
		" GROUP by col_dateofpurchase 
		ORDER BY col_dateofpurchase ASC");
	}
	
	$data = array();

	//execute query
	$result = mysqli_query($db, $query);
	//loop through the returned data
	foreach ($result as $row) {
		$data[] = $row;
		
	}
	echo json_encode($data);
}



?>





