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
$sql = "SELECT * FROM comments c WHERE '$user_var' = c.ReviewedUser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output comments in each row and calculate star rating
    while($row = $result->fetch_assoc()) {
        echo "&nbsp;&nbsp;" . $row["ReviewPoster"] . " Gave " .$row["StarRating"] . " Stars and said:";?>
    <div style="font-style:italic;">
        <?php echo '"'.$row["TextReview"].'"'; ?>
    </div>
    <?php
    }
    echo "
        <br><br>";
        } else {
        echo "No comments exist yet for this user";
        }
        $conn->close();
        ?>
</body>

</html>