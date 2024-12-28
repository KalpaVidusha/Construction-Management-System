<?php
if (isset($_POST['deleteProject'])) {
  $projectId = $_POST['projectId'];

  include_once
  $servername = "localhost";
  $username = "abc";
  $password = "123";
  $dbname = "cms_user";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM addproject WHERE Project_ID = '$projectId'";

  if ($conn->query($sql) === TRUE) {
    echo "Project deleted successfully.";
	header("location:Projectadd.php");
  } else {
    echo "Error deleting project: " . $conn->error;
  }

  $conn->close();
}
?>
