<?php

	session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

	$server = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'rideshare';
	if(isset($_POST['go'])){
		try {
			//create database
			$city=$_POST['city'];
			$state=$_POST['state'];
			$date=$_POST['date'];
			$dbconn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
			$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$ins=$dbconn->prepare(
				'INSERT INTO `riders` (rideid,username,state,city,date)
				VALUES (:rideid,:username,:city,:state,:date)'
			);
			$username=$_SESSION['username'];
			$dt=new DateTime($date);
			$date=$dt->format('Y-m-d');
			$ins->bindParam(':rideid',$id);
			$ins->bindParam(':username',$username);
			$ins->bindParam(':city',$city);
			$ins->bindParam(':state',$state);
			$ins->bindParam(':date',$date);
			$ins->execute();
		}
		catch(PDOException $e){
			echo "<br>" . $e->getMessage();
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
    <title>Ride Form</title>
  </head>
  <body>
		<!-- includes navbar -->
		<?php include 'nav.php'; ?>
  
	<h1 id="title"><strong>rEDUce!<div class="Type"><u>RIDERS</u></div></h1>
	<form class="center_div" action="rideform.php" method="post">
   

		<div class="row">
			<div class="col">
			  <input name="state" type="text" class="form-control" placeholder="State">
			</div>
			<div class="col">
			  <input name="city" type="text" class="form-control" placeholder="City">
			</div>
		</div>
		<br>

		<br>
		<div class="form-group ">

		  <div class="input-group">
		   <div class="input-group-addon">
		  <i class="fa fa-calendar">
		  </i>
		   </div>
		   <input class="form-control" id="datepicker" name="date" placeholder="MM/DD/YYYY" type="text"/>
		   <div class="input-group-addon">
		  <i class="fa ">
		  </i>
		   </div>
		  </div>
		 </div>
		</div>
		 <button class="btn btn-outline-success" type="submit"name="go">GO</button>
  </form>
  
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="resources/ridesform.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>