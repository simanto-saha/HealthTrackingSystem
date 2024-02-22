<html lang="en">
  <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="description" content="About the site"/>
      <meta name="author" content="Author name"/>
      <title> Homepage </title>
    
      <!-- core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet"/>
      <link href="css/font-awesome.min.css" rel="stylesheet"/>
      <link href="css/animate.min.css" rel="stylesheet"/>
      <link href="css/main.css" rel="stylesheet"/> 
  </head>

  <body> 
	<section id="header">
		<div class="row">  
			<div class="col-md-2" style="font-size: 30px;color:#F2674A;"> B-Healthy </div>
			<div class="col-md-10" style="text-align: right"> 
				<a href="health_index.php"> Health Profile </a> 
				<a href="activity_view.php" style="margin-left: 20px;"> Activity Record </a> 
				<a href="workout_view.php" style="margin-left: 20px;"> Workout Plans  </a>
        <a href="advice_view.php" style="margin-left: 20px;"> Expert Advice  </a>
        <a href="view_messages.php" style="margin-left: 20px;"> Connect </a> 
			</div>
		</div>
	</section>
	  <?php
     session_start();
     $data = ($_SESSION['data']);
    ?>
	<section id = "section1">
		<div class="title" style="background-color:#FFFFFF;"></br> Welcome <?php echo $data[2]; ?> </br></br>
      Your Id: <?php echo $data[0]; ?> </br></br>
    </div>
    <div class= "text" style="font-size: 22px;text-align: center;border-width:10px; border-style:solid; border-color:#33475b;background-color:#FFFFFF"></br></br>
      Name: <?php echo $data[1]; ?> </br></br>
      Gender: <?php echo $data[5]; ?> </br></br>
      Date of birth: <?php echo $data[6]; ?> </br></br>
      E-Mail: <?php echo $data[4]; ?> </br></br></br>
      
    </div> 
	</section>

	<!----- Footer ----->
	<section id="footer">
		<form action="update_input.php" style="margin-left: 35px;"> <!--style= "text-align: left;"-->
			<input type="submit" value="UPDATE ACCOUNT INFO">
    </form>
    <form action="index.php" style="margin-left: 110px;"> <!--style= "text-align: left;"-->
			<input type="submit" value="LOG OUT">
    </form>
		<form action="delete_account.php" style="margin-left: 65px;"> <!--style= "text-align: left;"-->
			<input type="submit" value="DELETE ACCOUNT">
    </form>
	</section>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
  </body> 
</html>	


