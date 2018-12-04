<!-- <div class="HistoryOutput">
 -->
<!-- </div> -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rideshare";
?>
<!doctype html>
<html>

    <body>
        <?php
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Get current profile's username
    $user_var = $_GET['user'];
    // Get all comments for specified user";
    $sql = "SELECT ROUND(AVG(StarRating),2) as aver FROM comments c WHERE '$user_var' = c.ReviewedUser";
    $result = $conn->query($sql);
    
    $avgVar = ($result->fetch_object())->aver;

    if ($avgVar > 0) {
        echo 'Average Rating: '. $avgVar .'/5';
    } else {
        echo "User not yet rated";
    }
    $conn->close();
    ?>
    </body>

</html>