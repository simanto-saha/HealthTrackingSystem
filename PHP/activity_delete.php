<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require "activity_delete_input.php";

if(isset($_POST["submit"])){
    
    $id = isset($_POST['activityrecordid']) ? $_POST['activityrecordid'] : '';
    session_start();
        
    $data = $_SESSION['data'];
    $uid = $data['0'];

    $existence_test = "SELECT * FROM activity_record A, updates U where A.A_record_id = $id and A.A_record_id = U.A_record_id and U.User_Id = $uid";

    $res = $conn->query($existence_test);

    if ($res->num_rows>0){
        $sql = "DELETE FROM `activity_record` WHERE `A_Record_id` = $id";

        if ($conn->query($sql) === TRUE) {
            ?>
            <html lang = 'en'>  
                <form action="activity_view.php" style="text-align: center;">
                    <br/>Deleted successfully<br/><br/>
                    <input type="submit" value="Return">
                </form>
            </html>
            <?php
        } else {
            echo "Error deleting record: " . $conn->error;
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