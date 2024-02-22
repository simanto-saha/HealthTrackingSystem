<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$activity = $_SESSION['activity'];
$activity_id= $activity['0'];
$activityType=$activity['1'];
$activeMinutes=$activity['2'];
$caloriesBurnt=$activity['3'];
$duration=$activity['4'];
$stepsTaken=$activity['5'];

$data = $_SESSION['data'];
$uid = $data['0'];
 

if ($activeMinutes < 10) {
    $workout = 1;
 
}elseif ($duration < 30 ) {
    $workout = 2;
 
}elseif ($caloriesBurnt < 750) {
    $workout = 3;
  
}elseif ($stepsTaken > 1250 ) {
   $workout = 4;
}

$workout_input = "UPDATE activity_record SET Workout_id = '$workout' WHERE A_Record_id = $activity_id";
$workout_execution = mysqli_query($conn,$workout_input);

$existence_test = "SELECT * FROM recommended_to where User_Id = $uid and Workout_id = '$workout'";  
$res = $conn->query($existence_test);

if ($res->num_rows == 0){
    $user_relation_input = "INSERT INTO recommended_to VALUES ('$uid','$workout')";
    $user_execution = mysqli_query($conn,$user_relation_input);
}    
?>