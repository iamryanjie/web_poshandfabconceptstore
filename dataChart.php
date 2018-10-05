<?php

require_once('db.php');
session_start();
if ( $_POST['fromdate'] && $_SESSION['userId'] && $_POST['todate']){

	// convert string to date
	$todate = $_POST["todate"];
	$fromdate = strtotime($_POST["fromdate"]);
	$fromdate = date("Y-m-d", $fromdate);
	$todate = strtotime($_POST["todate"]);
	$todate = date("Y-m-d", $todate);

	//query to get data from the table
	$query = sprintf("SELECT col_dateofpurchase as date, col_totalprice as sales FROM tbl_transaction WHERE  col_dateofpurchase >= date('".$fromdate."') AND col_dateofpurchase < date('".$todate."') GROUP by col_dateofpurchase ORDER BY col_dateofpurchase ASC" );	

	$data = array();
	$result = mysqli_query($db, $query);
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		$data[] = $row;
	}

	echo json_encode($data);
	
	
}else{
	

	//query to get data from the table
	$query = sprintf("SELECT col_dateofpurchase as date,col_totalprice as sales FROM tbl_transaction GROUP by col_dateofpurchase ORDER BY col_dateofpurchase ASC");
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




