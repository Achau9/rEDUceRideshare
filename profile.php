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
	if (isset($_POST['review'])) {
		try {
		//create database
		$server = 'localhost';
		$user = 'root';
		$pass = '';
		$dbname = 'rideshare';
		$review=$_POST['review'];
		$rating=$_POST['rating'];
		if($rating!=0){
			$dbconn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
			$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$ins=$dbconn->prepare(
				'INSERT INTO `comments` (CommentID,ReviewedUser,ReviewPoster,StarRating,TextReview)
				VALUES (:CommentID,:ReviewedUser,:ReviewPoster,:StarRating,:TextReview)'
			);
			$username=$_SESSION['username'];
			$reviewed=$_GET['user'];
			$ins->bindParam(':CommentID',$id);
			$ins->bindParam(':ReviewedUser',$reviewed);
			$ins->bindParam(':ReviewPoster',$username);
			$ins->bindParam(':StarRating',$rating);
			$ins->bindParam(':TextReview',$review);
			$ins->execute();
		}


		// var_dump($result);
		// echo("$result");

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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="resources/style.css" rel="stylesheet" type="text/css">
        <title>Profile</title>

    </head>

    <body>
        <?php include 'nav.php';?>
        <br>
        <br>
        <h1 id="title" style="margin-bottom:3px;"><strong>
                <?php echo $_GET['user']?>'s Profile
                <!-- <div class="Type"> -->
        </h1>
        <div class="center_div text-center" action="profile.php" method="post">
            <h2>
                <?php include 'profile_review_avg.php'; ?>
            </h2>
            <h3 style="margin-bottom:5px;">
                <?php include 'profile_location.php'; ?>
            </h3>
            <div class="col">
                <div style="height:400px;overflow:auto;border:8px double green;padding:2%;">
                    <h2>Reviews: </h2>
                    <?php include 'profile_comments.php'; ?>
                </div>
            </div>
            <div class="row">
                <?php if (!($_SESSION['username'] === $_GET['user'])) { ?>
                <?php echo ("<form class='center_div' action='profile.php?user=$_GET[user]' method='post'>"); ?>
                <div class="col">
                    <h3 style="color:black;"> Leave a review: </h3>
                    <span style="color:black;">Review Text:<span>
                            <textarea name="review" type="text" class="form-control" placeholder=""></textarea>
                </div>
                <div class="col">
                    <span style="color:black;">Star Rating:</span>
                    <select name="rating">
                        <option value=""></option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>
                <br>
                <button class="btn btn-outline-success" type="submit" name="go">Submit Review</button>
                </form>
            </div>
            <?php } ?>
        </div>
        <div><br></div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-1.12.4.js">
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
        </script>
        <script src="resources/ridesform.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
        </script>
    </body>

</html>