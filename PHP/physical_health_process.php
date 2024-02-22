<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');
$H_record_Id= $_POST['H_record_Id '];
$cholesterol = $_POST['cholesterol'];
$blood_pressure = $_POST['blood_pressure'];


$sql = "INSERT INTO physical_health VALUES ('$H_record_Id ','$cholesterol', '$blood_pressure')";
if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: display_physical_health.php");

$conn->close();

?>