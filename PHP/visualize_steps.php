<?php
require_once('dbconnect.php');
session_start();
$data = $_SESSION['data'];
$uid = $data['0']; 
$query = "SELECT * FROM activity_record A, updates U where A.A_Record_id = U.A_Record_id and U.User_Id = '$uid' ORDER BY A.Date_of_record LIMIT 10";
$exec = mysqli_query($con,$query);

$arr = array();
$count = 0;
 
while($row = mysqli_fetch_assoc($exec)){
    $arr[$count]["label"] = $row['Date_of_record'];
    $arr[$count]["y"] = $row['Steps_taken'];
    $count = $count+1;
}    
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Steps taken"
	},
	axisY: {
		title: "Steps"
	},
	axisX: {
		title: "Date of record"
	},    
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## steps",
		dataPoints: <?php echo json_encode($arr, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
<form action="visualize_menu.php" style= "text-align: center;">
        <input type="submit" value="Return to Visualization manu">
</form>
</html> 