<?php
$db = mysqli_connect('localhost', 'root', '','db_poshconceptstorefinal');
if (!$db){
trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());}

?>