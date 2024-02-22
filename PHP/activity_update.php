<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require "activity_update_input.php";


if(isset($_POST["submit"])){

    
    $userId = isset($_POST['Activity_Record_id']) ? $_POST['Activity_Record_id'] : '';

    $dateOfRecord = isset($_POST['dateOfRecord']) ? $_POST['dateOfRecord'] : '';
    $activeRecord = isset($_POST['activeRecord']) ? $_POST['activeRecord'] : '';

    $newActiveMinutes = isset($_POST['Update_Active_Minutes']) ? $_POST['Update_Active_Minutes'] : '';
    
    $calorieBurned = isset($_POST['calorieBurned']) ? $_POST['calorieBurned'] : '';
    $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
    $stepsTaken = isset($_POST['stepsTaken']) ? $_POST['stepsTaken'] : '';

    session_start();     
    $data = $_SESSION['data'];
    $uid = $data['0'];

    $existence_test = "SELECT * FROM activity_record A, updates U where A.A_record_id = $userId and A.A_record_id = U.A_record_id and U.User_Id = $uid";

    $res = $conn->query($existence_test);

    if ($res->num_rows>0){
        $sql = ("UPDATE `activity_record` SET `Active_Minutes` = '$newActiveMinutes',`Date_of_record`='$dateOfRecord',
        `Activity_type`='$activeRecord',`Calorie_Burned` = '$calorieBurned',`Duration`= $duration, `Steps_taken`='$stepsTaken'
        WHERE `A_Record_id` = '$userId'");
        if ($conn->query($sql) === TRUE) {
            $activity = array($userId,$activeRecord, $newActiveMinutes,$calorieBurned, $duration, $stepsTaken );
		 
            $_SESSION['activity'] = $activity;
            require 'advice_recommend.php';
            require 'workout_recommend.php';
            ?>
            <html lang = 'en'>  
                <form action="activity_view.php" style="text-align: center;">
                    <br/>Updated successfully<br/><br/>
                    <input type="submit" value="Return">
                </form>
            </html>
            <?php
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }else{
        ?>
        <html lang = 'en'>  
            <form action="activity_view.php" style="text-align: center;">
                <br/>You have No record with this ID<br/><br/>
                <input type="submit" value="Return">
            </form>
        </html>
        <?php
    }
}

$conn->close();
?>