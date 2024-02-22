<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');
$H_record_Id=$_POST['H_record_Id'];
$stress_level = $_POST['stress_level'];
$anxiety_level = $_POST['anxiety_level'];



$sql = "INSERT INTO mental_health VALUES ('$H_record_Id','$stress_level','$anxiety_level')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: display_mental_health.php");

$conn->close();

?>