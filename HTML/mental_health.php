<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mental Health Profile</title>
</head>
<body>
    <h1>Mental Health Profile</h1>
    <form action="mental_health_process.php" method="post">
    <label for="user_id">health_record_id</label>
        <input type="user_id" name="user_id" required><br>

        <label for="anxiety_level">Anxiety Level:</label>
        <input type="text" name="anxiety_level" required><br>

        <label for="stress_level">Stress Level:</label>
        <input type="text" name="stress_level" required><br>

       

        <input type="submit" value="Submit">
    </form>
</body>
</html>
