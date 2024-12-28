<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$projectName = $_POST['projectName'];
$Details = $_POST['details'];
$s_date = $_POST['sdate'];
$d_date = $_POST['ddate'];

$query = "INSERT INTO addproject (Project_Name,Details,Start_Date,Due_Date) VALUES ('$projectName', '$Details', '$s_date', '$d_date')";

if (mysqli_query($conn, $query)) {
    echo '<script>alert("Project Added Sucessfully")</script>';
	header("location:Projectadd.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>



