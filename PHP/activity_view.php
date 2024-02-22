<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require "view_html.php";
session_start();
        
$data = $_SESSION['data'];
$uid = $data['0'];

$sql = "SELECT * FROM activity_record A, updates U where A.A_record_id = U.A_record_id and U.User_Id = $uid";

$result = $conn->query($sql);

if ($result->num_rows>0){
    echo "<table border='1'>";
    echo "<tr><th>Activity Record ID</th><th>Active Minutes</th><th>Activity_type</th><th>Calorie
    Burned</th><th>Duration(min)</th><th>Steps Taken</th><th>Date of record</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td><center>" . $row['A_Record_id']. "</td></center>";
        echo "<td><center>" . $row['Active_minutes']. "</td></center>";
        echo "<td><center>" . $row['Activity_type']. "</td></center>";
        echo "<td><center>" . $row['Calorie_Burned']. "</td></center>";
        echo "<td><center>" . $row['duration']. "</td></center>";
        echo "<td><center>" . $row['Steps_taken']. "</td></center>";
        echo "<td><center>" . $row['Date_of_record']. "</td></center>";
        echo"</tr>";
        
    }
    require "activity_nav.php";
}else{
    ?>
    <html lang ='en'>
        <div class= "text" style="font-size: 22px;text-align: center;">
            <h style="text-align: center; font-size: 25px">No Record to show</p>
            <form action="activity_insert.php" style= "text-align: center;"> 
                <input type="submit" value="LOG NEW Activity"><br/>  
            </form>
            <form action="home.php" style= "text-align: center;">
                <input type="submit" value="RETURN TO HOME"><br/> 
            </form>        
        </div>
    </html> 
    <?php
  
}

$conn->close();
?>  