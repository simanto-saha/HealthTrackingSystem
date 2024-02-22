<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> THE TITLE </title>
    
      <!-- core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css" rel="stylesheet"/> 
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
 
session_start();
$data = $_SESSION['data'];
$user_id = $data['0'];
$height = $_POST['Height'];
$date = $_POST['Date'];
$weight = $_POST['Weight'];

// Insert data into the database
$sql = "INSERT INTO health_profile VALUES (NULL, '$height', '$date','$weight', '$user_id')";

if ($conn->query($sql) === TRUE) {
    $last_id = mysqli_insert_id($conn);
    $_SESSION['hid'] = $last_id;
  ##  echo "Record added successfully";
} else {
   ## echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="SELECT * FROM health_profile ORDER BY h_record_id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $bmi = $row['weight'] / ($row['height'] * $row['height']);
        echo "User ID: " . $row['User_Id'] .   " | BMI: " . $bmi . "<br>";

       
    }
} else {
    echo "No health records found";
}



$conn->close();
?>
