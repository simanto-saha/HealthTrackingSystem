<html lang="en">
  <head>
      
     
  </head>

  <body> 
    <!-- following section is used for creating the menubar in the webpage -->
	<section id="header">
		<div class="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> BMI </div>
			<div class="col-md-10" style="text-align: right"> 
				<a href="mental_health.php"> mental_health </a> 
				<a href="physical_health.php" style="margin-left: 20px;"> physical_health</a> 
				<!--<a href="#" style="margin-left: 20px;"> Teachers  </a>--> 
			</div>
		</div>
	</section>
</body>
</html>
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

// Retrieve data from the form
$H_record_Id = $_POST['H_record_Id'];
$height = $_POST['height'];
$date_of_record = $_POST['date_of_record'];
$weight = $_POST['weight'];


// Insert data into the database
$sql = "INSERT INTO health_profile VALUES ('$H_record_Id', '$height', '$date_of_record','$weight')";

if ($conn->query($sql) === TRUE) {
  ##  echo "Record added successfully";
} else {
   ## echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="SELECT * FROM health_profile ORDER BY H_record_Id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $bmi = $row['weight'] / ($row['height'] * $row['height']);
        echo "H_record_Id: " . $row['H_record_Id'] .   " | BMI: " . $bmi . "<br>";     
    }
} else {
    echo "No health records found";
}



$conn->close();
?>
