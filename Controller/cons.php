<?php include "../../../inc/dbinfo.inc"; ?>
<?php

  /* Connect to MySQL and select the database. */
  $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $db = mysqli_select_db($db, DB_DATABASE);
  
  if(!$db){
  echo mysqli_connect_errno();
}else{
	echo "success";
}
?>




