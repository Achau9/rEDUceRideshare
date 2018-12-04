<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	// $_SESSION['msg'] = "You must log in first";
  	header('location: splashpage.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: splashpage.php");
	}
	
	if (isset($_GET['user'])) {
		$dbconn = new PDO("mysql:host=localhost;dbname=rideshare", 'root', '');
		$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$res = $dbconn->query("SELECT count(*) FROM users WHERE username = '".$_GET['user']."';");
		if ($res->fetchColumn() <= 0){
			// maybe make an error page?
			header("location: index.php");
		}
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
    <br>
    <br>
	<h1 id="title"><strong><?php echo $_GET['user']?>'s Profile<div class="Type"></h1>
	<div class="center_div" action="rideform.php" method="post">
		<div class="row">
				<div class="col">
				  <h2> <?php echo $_GET['user']; ?> </h2>
				  <p> <?php include 'profile_location.php'; ?> </p>
                  <br>
                  <a class='btn btn-outline-success' href='profile.php?user=".$_SESSION['username']."&new_comment=true'> Add User Review </a> <span>&ensp;</span>
				</div>
            
                <div class="col">
                    <h2>Reviews: </h2>
                    <div style="height:400px;width:140px;overflow:auto;border:8px double green;padding:2%;width: 75%;">
                        <?php include 'profile_comments.php'; ?>
                    </div>
            </div>
		</div>		
  </div>
  <div><br></div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="resources/ridesform.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>