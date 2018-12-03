<?php 
  session_start(); 
    echo $_SESSION['username'];
  if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	header('location: splashpage.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: splashpage.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="resources/style.css" rel="stylesheet" type="text/css">
    <title>Profile</title>
  </head>
  <body>
     <?php include 'nav.php';?>
  
	<h1 id="title"><strong>Welcome User<div class="Type"></h1>
	<div class="center_div" action="rideform.php" method="post">
		<div class="row">
				<div class="col">
				  <img src="https://content-static.upwork.com/uploads/2014/10/02123010/profilephoto_goodcrop.jpg"></img>
				</div>
				<div class="col">
				  <h2> <?php echo $_GET['user']; ?> </h2>
				  <p> Troy, NY </p>
				</div>
		</div>
		<div class="row">
				<div class="col">
				  <h3> Comments: </h3>
				  <table>
					<tr>
						<th> jill says:</th>
					</tr>
					<tr>
						<td style="text-indent: 20px;">good stuff</td>
					</tr>

				  </table>
				</div>
				
		</div>
		
		
  </div>
  
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="resources/ridesform.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>