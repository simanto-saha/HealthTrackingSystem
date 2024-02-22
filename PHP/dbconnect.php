<?php

$s_name = "localhost";
$u_name = "root";
$password = "";
$db = "health_tracker";

$con = new mysqli($s_name, $u_name, $password);

if($con->connect_error){

	die("Connection failed: " . $con->connect_error);
	
}else{
	mysqli_select_db($con, $db);
	}
?>