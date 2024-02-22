<?php

require_once('dbconnect.php');
session_start();

$data = $_SESSION['data'];
$id = $data['0'];

$query = "SELECT U.User_Id,U.Username,E.comment_status from users U, shares_experience E where U.User_Id = E.sender_id AND E.receiver_id = '$id'";

$res = mysqli_query($con,$query);

if(mysqli_num_rows($res) !=0 ){
 
    //echo $record['Username'];
    ?>
    <html lang = 'en'>
        	
	<section id = "section1">
		<div class="title"style="text-align: center; font-size: 35px;"> All Messages sent to me </div>
		<div style="margin-left:10%; margin-right:10%; margin-top:50px; margin-bottom:50px;text-align:center;">
			<table style="text-align: center; font-size: 17px margin-left: 50px;; margin-right:auto;"> 
                <tr style="text-align: center; border: 1px solid black;">
                    <th>   User Id   </th>
                    <th>   Username   </th>
                    <th>   comment_status </th>
                </tr>        
            <?php
                while($row = mysqli_fetch_assoc($res)){
            ?>
                <tr>
				<td>    <?php echo $row['User_Id'] ?>   </td>
				<td>    <?php echo $row['Username'] ?>   </td>
				<td>    <?php echo $row['comment_status'] ?>   </td>
                </tr>
            <?php
                }
            ?>    
            </table>     
        </div>
    </section>
    </html>
     
<?php                         
}else{
    echo 'No Messages to view';
}
?>
<html>
 
    <form action="Received_id_input.php" style="text-align: center;">
        <input type="submit" value="View message sent to me">
    </form>
    <form action="Send_id_input.php" style="text-align: center;">
            <input type="submit" value="Send Message to someone">
    </form>
    <form action="home.php" class="submission" method="post" style= "text-align: center">
        <input type="submit" value="Return to Home">
    </form>
</html>
