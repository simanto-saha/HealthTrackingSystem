<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$data = $_SESSION['data'];
$uid = $data['0'];

$expertAdviceQuery =  "SELECT * FROM expert_advice E, given_to G where E.Advice_id = G.Advice_id and G.User_Id = '$uid'";
$result = $conn->query($expertAdviceQuery);

if ($result->num_rows > 0) {
    echo "<h2 style=text-align: center>Expert Advice For You</h2>";
    echo "<table border='1'><tr><th>Advice ID</th><th>Nutritional Advice</th><th>Exercise Advice</th><th>Expert Name</th><th>Health Tips</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Advice_Id"] . "</td><td>" . $row["Nutritional_Advice"] . "</td><td>" . $row["Exercise_Advice"] . "</td><td>" . $row["Expert_name"] . "</td><td>" . $row["Health_tips"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "NO ADVICE BASED ON YOUR ACTIVITY RECORDS";
}

$conn->close();
?>

<html lang = 'en'>  
    <form action="home.php" style="text-align: center;">
 
        <input type="submit" value="Return">
    </form>
</html>
  