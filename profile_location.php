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

// Get current profile's username
$user_var = $_GET['user'];

// Get City, State, Email of current profile
$from = "SELECT city, state, email FROM users c WHERE '$user_var'=c.username";
$result = $conn->query($from);
$row = $result->fetch_assoc();

echo 'From: '.$row['city'],", ",$row['state'];
?>
<body>
    <h4>
        <?php echo 'E-mail: ',$row['email'];?>
    </h4>

</body>
<?php
$conn->close();
?>