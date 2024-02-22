<?php
require_once('dbconnect.php');
session_start();

$data = $_SESSION['data'];
$sid = $data['0'];
$rid = $_POST['rid'];
$msg = $_POST['message'];

$ref_query = "SELECT * FROM users WHERE  User_Id = '$rid'";
$reference_check = mysqli_query($con,$ref_query);

if(mysqli_num_rows($reference_check) !=0 ){

    $sql = "SELECT * FROM shares_experience WHERE sender_id = '$sid' AND receiver_id = '$rid'";
        
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) !=0 ){
        
        $query = "UPDATE shares_experience SET message = '$msg', comment_status = 'Unread' WHERE sender_id = '$sid' AND receiver_id = '$rid'";
        $exec = mysqli_query($con,$query);
        if(mysqli_affected_rows($con)){
            echo "Message sent successfully";
        }else{
            echo "message sending failed";
        }
    }else{
        $query = "INSERT INTO shares_experience Values ('$sid','$rid','Unread','$msg')"; 
        $exec = mysqli_query($con,$query);
        if(mysqli_affected_rows($con)){
            echo "Message sent successfully";
        }else{
            echo "message sending failed";
        }
    }
    ?>
    <html lang = 'en'>  
        <form action="view_messages.php" style="text-align: center;">
            <input type="submit" value="Return to Message view">
        </form>
    </html>
<?php     
}else{    
?>
<html lang = 'en'>  
    <form action="Send_id_input.php" style="text-align: center;">
        <p> No User exists with this id</p>
        <input type="submit" value="Try a different Id">
    </form>
</html>
<?php               
}
?>