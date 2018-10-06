<?php
//database connection from web
 // define('DB_HOST', 'bigdata.clgps38zjdow.us-east-2.rds.amazonaws.com:3306');
 // define('DB_USERNAME', 'root');
 // define('DB_PASSWORD', 'abcefg13!#');

// database connection from XAMPP 
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_poshconceptstorefinal');

// Create connection
$db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	//$db = mysqli_connect("bigdata.clgps38zjdow.us-east-2.rds.amazonaws.com","root",
		//			"db_poshconceptstorefinal",3306);
			
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}





?>
