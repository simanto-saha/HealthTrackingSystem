<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Physical Health Profile</title>
</head>
<body>
    <h1>Physical Health Profile</h1>
    <form action="physical_health_process.php" method="post">


    <label for="H_record_Id ">H_record_Id </label>
        <input type="H_record_Id " name="H_record_Id " required><br>

        <label for="cholesterol">Cholesterol:</label>
        <input type="text" name="cholesterol" required><br>

        <label for="blood_pressure">Blood Pressure:</label>
        <input type="text" name="blood_pressure" required><br>

       

        <input type="submit" value="Submit">
    </form>
</body>
</html>