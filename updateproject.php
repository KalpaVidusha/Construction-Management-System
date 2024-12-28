<?php
if (isset($_POST['editProject'])) {
  $projectId = $_POST['projectId'];
  $projectName = $_POST['projectName'];
  $details = $_POST['details'];
  $sdate = $_POST['sdate'];
  $ddate = $_POST['ddate'];

  $servername = "localhost";
  $username = "abc";
  $password = "123";
  $dbname = "cms_user";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE addproject SET Project_Name='$projectName', Details='$details', Start_Date='$sdate',Due_Date='$ddate' WHERE Project_ID='$projectId'";

  if ($conn->query($sql) === TRUE) {
    echo "project updated successfully";
	header("location:Projectadd.php");
  } else {
    echo "Error updating project: " . $conn->error;
  }

  $conn->close();
}
?>
