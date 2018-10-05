<?php include "../inc/dbinfo.inc"; ?>
<?php

  define('DB_NAME', 'db_poshconceptstorefinal');

  $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

//  $database = mysqli_select_db($db, DB_DATABASE);
  echo "sucess";
?>

