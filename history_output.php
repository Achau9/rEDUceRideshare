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

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
$sql = "SELECT rideid, username, state, city, date FROM riders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "</br>__>>> RIDING FROM STATE: \t" . $row["state"] . "-- CITY:\t" . $row["city"] . "-- DATE: \t" . $row["date"] . "";
    }
} else {
    echo "0 results";
}
$conn->close();
?>