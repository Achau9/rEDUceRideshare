<!-- <div class="HistoryOutput">
 -->  
<!-- </div> -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rideshare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $sql = "SELECT all comments for specified user";
$sql = "SELECT * FROM comments c WHERE EXISTS(SELECT * FROM users u WHERE c.ReviewedUser = u.username)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output comments in each row and calculate star rating
    while($row = $result->fetch_assoc()) {
        echo $row["ReviewPoster"] . ": " . $row["StarRating"] . " Stars" . "<br>" . "\t" . $row["TextReview"];
        echo "<br><br>";
    }
} else {
    echo "No comments exist yet for this user";
}
$conn->close();
?>