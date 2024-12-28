<html>
<head>
  <title>Add Project</title>
  
  <link rel="stylesheet" href="crudStyles.css">
</head>
<body>
<button><a href="managerDashboard.php">Manager Dashboard</a></button>
<h1 id = "topic">Add Projects</h1>
  <div class="addproject">
    <div class = "projectManager">
    <form action="addproject.php" method="post" id = "crudByProjectmanager">
    
    <label for="projectName">Project Name:</label>
      <br>
      <input type="text" id="sachiniCrud" name="projectName" required>
      <br><br>

      <label for="details">Details:</label>
      <br>
      <textarea id="sachiniCrud" name="details" rows="4" required></textarea>
      <br><br>

      <label for="sdate">Start_Date:</label>
      <br>
      <input type="date" id="sachiniCrud" name="sdate" required>
      <br><br>

      <label for="ddate">Due_Date:</label>
      <br>
      <input type="date" id="sachiniCrud" name="ddate" required>
      <br><br>
    

      <input type="submit" value="Add Project">
    </form>
  </div>
</div>

<!-- edit/delete project section -->

<div class="editproject">
  
    <h1 style = "text-align : center;">Overall Projects</h1>
 
  <?php
  $servername = "localhost";
  $username = "abc";
  $password = "123";
  $dbname = "cms_user";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM addproject";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $projectId = $row['Project_ID'];
      $projectName = $row['Project_Name'];
      $details = $row['Details'];
      $sdate = $row['Start_Date'];
      $ddate = $row['Due_Date'];

      
      echo '<div class="project-details">';
      echo $projectId;
      
      echo '<form action="updateproject.php" method="post">';
      echo '<input type="hidden" name="projectId" value="' . $projectId . '">';
      
      echo '<label for="projectName">Project Name:</label><br>';
      echo '<input type="text" id="projectName" name="projectName" value="' . $projectName . '" required><br>';
      
      echo '<label for="details">Details:</label><br>';
      echo '<textarea id="details" name="details" rows="4" required>' . $details . '</textarea><br>';
      
      echo '<label for="sdate">Start_Date:</label><br>';
      echo '<input type="date" id="sdate" name="sdate"  value="'. $sdate . '"required><br>' ;
      
      echo '<label for="ddate">Due_Date:</label><br>';
      echo '<input type="date" id="ddate" name="ddate" value="'. $ddate . '"required><br>' ;
      
      echo'<form action="Projectadd.php" method="post"><br>';
	    echo '<input type="submit" name="editProject" value="Update">';
      echo '</form>';

      echo '<form action="deleteproject.php" method="post">';
      echo '<input type="hidden" name="projectId" value="' . $projectId . '">';
      echo '<input type="submit" name="deleteProject" value="Delete">';
      echo '</form>';

      echo '</div>';
      
    }
  } else {
    echo '<div class="project-details">';
    echo '<p>No projects found.</p>';
    echo '</div>';
  }

  $conn->close();
  ?>
</div>
<br><br><br>
</body>
</html>
