<!DOCTYPE html>
<html>

<body>
<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
$sachiniUsername = $_POST['sachiniUsername'];
$sachiniPassword = $_POST['sachiniPassword'];



$servername = "localhost";
$username = "abc";
$password = "123";
$db = "cms_user";

//Database Connection
$con = new mysqli($servername,$username,$password,$db);

if($con->connect_error){
    
    die("Failed to connect to the database" .$con->connect_error);
} else{

    $stmt = $con->prepare("select * from projectmanager where username = ?");
    $stmt->bind_param("s",$sachiniUsername);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){

        $data = $stmt_result->fetch_assoc();
        if($data['password'] == $sachiniPassword){

            echo '<script>alert("Login Successfully"); window.location.href = "managerDashboard.php";</script>';
            
        }

else{

    echo '<script>alert("Invalid Email or Password");window.location.href = "sachini_html.html";</script></script>';
    
        }
      
    }
}

}
?>
</body>
</html>