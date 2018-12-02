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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="resources/style.css" rel="stylesheet" type="text/css">
  </head>
  
  <body>
    <?php include 'nav.php';?>
   
  <h1 id="title"><strong>rEDUce</strong></h1>
  
  <div class="content">
    </div>
      <main role="riding" class="container">
        <div class="jumbotron">
          <h1>Riding</h1>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <a href ="rideform.php">Find a ride</a></button>
          
        </div>
      </main>
      <main role="offering" class="container">
        <div class="jumbotron">
          <h1>Offering</h1>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            <a href ="offerform.php">Offer a ride<a>
          </button>
          
        </div>
      </main>
    </div>
    <div id = "create">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><a href ="history.php">Ride History</a></button>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>