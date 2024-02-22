<?php

require_once('dbconnect.php');

if ($_POST['uname'] != '' && $_POST['jname']!= '' && $_POST['mail']!= '' && $_POST['pass']!= '' && $_POST['sex']!= '' && $_POST['dob']!= ''){
    
    $u = $_POST['uname'];
	$j = $_POST['jname'];
	$m = $_POST['mail'];
	$p = $_POST['pass'];
    $g = $_POST['sex'];
	$b = $_POST['dob'];
	
	$user_check = "SELECT * FROM users Where Username = '$u'";
	$query = mysqli_query($con,$user_check);
	if(mysqli_num_rows($query) != '0'){
?>
<html lang="en">
	<form action="register.php" class="submission" method="post" style= "text-align: center">
	   	<p> Username Already Taken<br/>Try a different Username </p>
		 <input type="submit" value="Return to Sign Up Screen">
	 </form>		
</html>
<?php
		
	}else{
    	$sql = " INSERT INTO Users Values (NULL,'$j','$u','$p','$m','$g','$b')";

    	$res = mysqli_query($con,$sql);

    	if(mysqli_affected_rows($con)){
?>
<html lang="en">
	<form action="index.php" class="submission" method="post" style= "text-align: center">
	   	<p> Account Created Successfully</p>
		 <input type="submit" value="Return to Log in Screen">
	 </form>		
</html>
<?php		
		}
	}	
}else{
?>
<html lang="en">
	<form action="index.php" class="submission" method="post" style= "text-align: center">
	   	<p> Account creation failed</p>
		 <input type="submit" value="Return to Login Pge">
	 </form>		
</html>
<?php	
} 
?>