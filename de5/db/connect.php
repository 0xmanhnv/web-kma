 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "giai_bt_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?> 