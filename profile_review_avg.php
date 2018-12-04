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
$sql = "SELECT ROUND(AVG(StarRating),2) as average FROM comments c WHERE '$user_var' = c.ReviewedUser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 'Average Rating: '.$result->fetch_object()->average.'/5';
} else {
    echo "User not yet rated";
}
$conn->close();
?>
</body>

</html>