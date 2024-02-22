<?php
require_once('dbconnect.php');
if($_POST['hname'] != '' && $_POST['pas'] != ''){
	$u = $_POST['hname'];
	$p = $_POST['pas'];
	$sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
	
	$query = mysqli_query($con, $sql);
	
	if(mysqli_num_rows($query) !=0 ){
		$record = mysqli_fetch_assoc($query);
		$data = array($record['User_Id'],$record['Name'],$record['Username'],$record['Password'],$record['Email'],$record['Gender'],$record['Date_of_birth']);
		session_start();
		$_SESSION['data'] = $data;

		header("Location: home.php");
	}
	else{
		header("Location: index.php");
	}	
}else{
	header("Location: index.php");
}

?>
