<?php
// Database connection parameters
$servername = "localhost";
$username = "abc";
$password = "123";
$dbname = "cms_user";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
