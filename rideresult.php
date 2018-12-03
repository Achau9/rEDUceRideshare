<?php 
  session_start(); 

  // if (!isset($_SESSION['username'])) {
  //  $_SESSION['msg'] = "You must log in first";
  //  header('location: login.php');
  // }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
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
      <?php include 'nav.php'; ?>
     
   
   <h1 id="title"><strong>rEDUce</strong></h1>

   
<?php
  $server = 'localhost';
  $user = 'root';
  $pass = '';
  $dbname = 'rideshare';
  if(isset($_POST['go'])){
    try {
      //create database
      $city=$_POST['city'];
      $state=$_POST['state'];
      $r_date=$_POST['date'];
      $dbconn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
      $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $ins=$dbconn->prepare(
        'INSERT INTO `riders` (rideid,username,state,city,date)
        VALUES (:rideid,:username,:state,:city,:date)'
      );
      $username=$_SESSION['username'];
      $dt=new DateTime($r_date);
      $r_date=$dt->format('Y-m-d');
      $ins->bindParam(':rideid',$id);
      $ins->bindParam(':username',$username);
      $ins->bindParam(':state',$state);
      $ins->bindParam(':city',$city);
      $ins->bindParam(':date',$r_date);
      $ins->execute();
      
      // $query = $dbconn->prepare('SELECT * FROM `drivers` WHERE state = :d_state AND city = :d_state;');
      // $query->execute(array(':d_state'=>$state,':d_city'=>$city));
      $query = $dbconn->prepare('SELECT * FROM `drivers`;');
      $query->execute();

      $result = $query->fetchAll();
      // var_dump($result);
      foreach($result as $value){
        echo("<div class = \"results\"><ul class=\"list-unstyled mt-3 mb-4\">");
        echo("<li><h3>Driver:$value[username]</h3></li><li>Departure Date: $value[date]</li><li>Destination: $value[city], $value[state]</li></ul><button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">
            <a href =\"profile.php?user=$value[username]\">View Profile<a>
          </button></div>");
        
      }
      // var_dump($result);
      // echo("$result");
      
    }
    catch(PDOException $e){
      
      echo "<br>" . $e->getMessage();
    }
  }

?>
  <div class = "results">
    <ul class="list-unstyled mt-3 mb-4">
      <li>30 users included</li>
      <li>30 users included</li>
      <li>30 users included</li>
      
    </ul> 
  </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>