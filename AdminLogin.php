<?php
require ("AdminconnectDB.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Genesis Builders</title>
    <link rel="stylesheet" type="text/css" href="AdminCss.css">

    <script>
      alert("Admin Login Panel loaded!");
      document.write();
  </script>
  
</head>

<body>


    
    
    
    <center>
        <h1>Login as an Admin</h1>
        <div class="container">
            <form  method="POST">
                <label for="Username"><b>Admin ID</b></label> <br>
                <input type="text" placeholder="Enter Admin ID" name="Username" required> <br>
                <label for="Password"><b>Password</b></label> <br>
                <input type="password" placeholder="Enter Password" name="Password" required> <br>
                <button type="submit" name ="login">Login</button>
            </form>
        </div>
    </center>

 

    <?php
        if(isset($_POST['login']))
        {
            $query="SELECT * FROM `adminlog` WHERE `AdminName` ='$_POST[Username]' AND `AdminPass` = '$_POST[Password]'";
            $result = mysqli_query ($conn,$query);

            if ( mysqli_num_rows($result) == 1)
            {
                session_start();
                $_SESSION['AdminLoginID']=$_POST['AdminName'];
                header("Location: AdminDashboard.html");
            }
            else
            {
                echo "<script>alert(' Login Failed !')</script>";
            }
        }

    ?>


</body>

</html>