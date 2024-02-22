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

$expertAdviceQuery =  "SELECT * FROM workout_plan W, recommended_to R where W.Workout_id = R.Workout_id and R.User_Id = '$uid'";
$result = $conn->query($expertAdviceQuery);

if ($result->num_rows > 0) {
    echo "<h2 style=text-align: center>Expert Advice For You</h2>";
    echo "<table border='1'><tr><th>Advice ID</th><th>Nutritional Advice</th><th>Exercise Advice</th><th>Expert Name</th><th>Health Tips</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Workout_Id"] . "</td><td>" . $row["Workout_type"] . "</td><td>" . $row["intensity"] . "</td><td>" . $row["Duration"] . "</td><td>" . $row["Description"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "NO Workout plan for you";
}

$conn->close();
?>

<html lang = 'en'>  
    <form action="home.php" style="text-align: center;">
 
        <input type="submit" value="Return">
    </form>
</html>