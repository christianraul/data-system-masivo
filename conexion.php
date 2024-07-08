<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db30');

//get connection
$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$con){
	die("Connection failed: " . $con->error);
}
//echo "Connected successfully";
// mysqli_close($mysqli);
?>