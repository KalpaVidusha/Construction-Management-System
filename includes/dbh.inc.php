<?php
$serverName = "localhost";
$dbUsername = "abc";
$dbPassword = "123";
$dbName = "cms_user";

$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if($conn->connect_error) {
     die("Connection failed: ". $con->connect_error); }


