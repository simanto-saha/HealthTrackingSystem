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
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> health_profile </div>
			<!--<div class="col-md-10" style="text-align: right"> 
				<a href="#"> mental_health </a> 
				<a href="#" style="margin-left: 20px;"> physical_health</a> 
				<!--<a href="#" style="margin-left: 20px;"> Teachers  </a>--> 
		</div>  
		</div>
	</section>
	
	<!--<section id = "section1">
		<div class="title"> SIGN IN </div>
		
		<form action="signin.php" class="form_design" method="post">
			Username: <input type="text" name="fname"> <br/>
			Password: <input type="password" name="pass"> <br/> <br/>
			<input type="submit" value="Sign In">
		</form>
	</section>

	--->
	<!----- Footer ----->

    <h1>Health Profile</h1>
    <form action="process.php" method="post">
        <label for="H_record_Id">Health Record ID:</label>
        <input type="text" name="H_record_Id" required><br>

        <label for="height">Height (in meters):</label>
        <input type="text" name="height" required><br>

        <label for="date_of_record">Date:</label>
        <input type="date" name="date_of_record" required><br>


        <label for="weight">Weight (in kilograms):</label>
        <input type="text" name="weight" required><br>

        
    

        <input type="submit" value="Submit">
    </form>
	<section id="footer"> 
	
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>