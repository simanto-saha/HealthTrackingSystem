<?php
// Connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM health_profile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $bmi = $row['Weight'] / ($row['Height'] * $row['Height']);
        echo "User ID: " . $row['User_id'] . " | BMI: " . $bmi . "<br>";
    }
} else {
    echo "No health records found";
}

$conn->close();
?>
