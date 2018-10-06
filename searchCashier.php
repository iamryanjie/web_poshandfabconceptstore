<?php

require_once ('Controller/db.php');

if (!$db)
	{
		trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());

	}	
echo $_GET['keyword'];
$_GET['keyword'] = 'cashier';
if($_GET['keyword']){
	$keyword = $_GET['keyword'];
	$result = mysqli_query($db,"SELECT * from tbl_useraccounts where col_firstname LIKE '%$keyword%' OR col_lastname LIKE '%$keyword%' OR col_middlename LIKE '%$keyword%' OR col_user LIKE '%$keyword%' OR col_status LIKE '%$keyword%' ");
	// $row = mysqli_fetch_assoc($result);

	// $result = mysqli_query($db, $query);

	//loop through the returned data
	$data = array();
	foreach ($result as $row) {
		$data['col_firstname'] = $row['col_firstname'];
		$data['col_lastname'] = $row['col_lastname'];
		$data['col_middlename'] = $row['col_middlename'];
		$data['col_user'] = $row['col_user'];
		$data['col_status'] = $row['col_status'];
	}
	
}

?>

<script type="text/javascript">
// pass PHP variable declared above to JavaScript variable
var data = <?php echo json_encode($data) ?>;
</script>




