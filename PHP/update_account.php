<?php

require_once('dbconnect.php');
session_start();
$data = $_SESSION['data'];
$id = $data['0'];

if ($_POST['jname']!= '' && $_POST['mail']!= '' && $_POST['pass']!= '' && $_POST['sex']!= '' && $_POST['dob']!= ''){
    
	$j = $_POST['jname'];
	$m = $_POST['mail'];
	$p = $_POST['pass'];
    $g = $_POST['sex'];
	$b = $_POST['dob'];

    $query = "UPDATE users SET Name = '$j', Email = '$m', Password = '$p', Gender = '$g', Date_of_birth = '$b' WHERE User_Id = '$id'";
    $update = mysqli_query($con,$query);

    if (mysqli_affected_rows($con)){
     ?>
<html lang ='en'>
    <form action="index.php" style= "text-align: center;">
        <p> Account Updated Successfully</br>Log in again to view changes </p>
        <input type="submit" value="Return to Log in screen">
    </form>
</html> 
<?php    
    } else {
        echo "Account Info Update Failed";
        header('home.php');
    }
}
?>