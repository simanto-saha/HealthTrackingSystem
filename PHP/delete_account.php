<?php
require_once('dbconnect.php');
session_start();
$data = $_SESSION['data'];
$id = $data['0'];

$sql = "DELETE FROM users WHERE User_Id = '$id'";

$delete = mysqli_query($con,$sql);

if (mysqli_affected_rows($con)){
    ?>
<html lang ='en'>
    <form action="index.php" style= "text-align: center;">
        <p> Account Deleted Successfully </p>
        <input type="submit" value="Return to log-in Screen">
    </form>
</html> 
<?php    
} else {
    echo "Account Deletion Failed";
    header('home.php');
}
?>