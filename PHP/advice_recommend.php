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
$activityType=$activity['1'];
$activeMinutes=$activity['2'];
$caloriesBurnt=$activity['3'];
$duration=$activity['4'];
$stepsTaken=$activity['5'];

function recommend($ad){

    $activity = $_SESSION['activity'];
    $activity_id= $activity['0'];
    $data = $_SESSION['data'];
    $uid = $data['0'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "health_tracker";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $activity_relation_input = "INSERT INTO based_on VALUES ('$activity_id','$ad')";
    $activity_execution = mysqli_query($conn,$activity_relation_input);

    $existence_test = "SELECT * FROM given_to where User_Id = $uid and Advice_id = '$ad'";  
    $res = $conn->query($existence_test);

    if ($res->num_rows == 0){
        $user_relation_input = "INSERT INTO given_to VALUES ('$uid','$ad')";
        $user_execution = mysqli_query($conn,$user_relation_input);
    }
}


if ($activeMinutes < 10) {
    $advice = 'HRT004';
    recommend($advice);
} elseif ($activeMinutes < 30 && $stepsTaken < 5000) {
    $advice = 'Ad001';
    recommend($advice);
}
if ($caloriesBurnt < 1500) {
    $advice = 'Ad012';
    recommend($advice);
}
if ($activityType == "strength" && $duration >= 60) {
    $advice = 'NUT001';
    recommend($advice);
 
}
if ($activityType == "cardio" && $duration < 20) {
    $advice = 'CR001';
    recommend($advice);
}
if($activeMinutes >= 150 && $stepsTaken >= 10000) {
    $advice = 'Ad002';
    recommend($advice);
}    
?>