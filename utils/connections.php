<?php
// $servername = "mysql8010.site4now.net";
// $username = "aa8ebb_queue";
// $password = "@12queueing";
// $database = "db_aa8ebb_queue";
$servername = "localhost";
$username = "root";
$password = "";
$database = "queueing_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
