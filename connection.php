<?php

$servername = "localhost";
$username = "abc";
$password = "123";
$db="cms_user";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>









