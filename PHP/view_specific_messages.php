<?php
require_once('dbconnect.php');
session_start();

$data = $_SESSION['data'];
$rid = $data['0'];
$sid = $_POST['sid'];


$query = "SELECT message from shares_experience  where sender_id = $sid AND receiver_id = '$rid'";

$res = mysqli_query($con,$query);

if(mysqli_num_rows($res) !=0 ){
    $record = mysqli_fetch_assoc($res);
    $read_stat ="UPDATE shares_experience SET comment_status = 'Read' where sender_id = $sid AND receiver_id = '$rid'";
    $update_read = mysqli_query($con,$read_stat);
    ?>
    <html lang="en">
        <form action="send_id_input.php" class="submission" method="post" style= "text-align: center">
               <?php  echo $record['message']; ?>
             <input type="submit" value="Reply">
         </form>
         <form action="view_messages.php" class="submission" method="post" style= "text-align: center">
             <input type="submit" value="Return to Message view">
         </form>		
    </html>
    <?php 
}else{
    ?>
    <html lang="en">
        <form action="home.php" class="submission" method="post" style= "text-align: center">
               <p> No Messages sent by this User to you</p>
             <input type="submit" value="Return to Home page">
         </form>		
    </html>
    <?php 
}
?>    