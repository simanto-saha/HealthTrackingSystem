<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require 'activity_insert_input.php';


if(isset($_POST["submit"])){
    
    $dateOfRecord = isset($_POST['dateOfRecord']) ? $_POST['dateOfRecord'] : '';
    $activeRecord = isset($_POST['activeRecord']) ? $_POST['activeRecord'] : '';
    $activeMinutes = isset($_POST['activeMinutes']) ? $_POST['activeMinutes'] : '';
  
    $calorieBurned = isset($_POST['calorieBurned']) ? $_POST['calorieBurned'] : '';
    $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
    $stepsTaken = isset($_POST['stepsTaken']) ? $_POST['stepsTaken'] : '';




    $sql = "INSERT INTO `activity_record` (`Date_of_record`, `Activity_type`, `Active_Minutes`,`Calorie_Burned`, `Duration`, `Steps_taken`)
            VALUES ('$dateOfRecord', '$activeRecord', '$activeMinutes','$calorieBurned', '$duration', '$stepsTaken')";
    
  
    if ($conn->query($sql) === TRUE) {
        $last_id = mysqli_insert_id($conn);
        session_start();	
        
        $activity = array($last_id,$activeRecord, $activeMinutes,$calorieBurned, $duration, $stepsTaken );
		 
		$_SESSION['activity'] = $activity;
        
        $data = $_SESSION['data'];
        $uid = $data['0'];
        $relation_input = "INSERT INTO updates VALUES ('$uid','$last_id')";
        $execution = mysqli_query($conn,$relation_input);
  
        require 'advice_recommend.php';
        require 'workout_recommend.php';
        ?>
        <html lang = 'en'>  
            <form action="activity_view.php" style="text-align: center;">
                <br/>Inserted successfully<br/><br/>
                <input type="submit" value="Return">
            </form>
        </html>
        <?php
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}
    
    $conn->close();
    ?>