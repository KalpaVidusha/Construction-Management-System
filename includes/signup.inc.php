<?php

if (isset($_POST["submit"])) {
    $fName = $_POST["first-name"];
    $lName = $_POST["last-name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $confirmPwd = $_POST["confirm-password"];

    require_once 'dbh.inc.php';

    
    $sql = "INSERT INTO user (userFname, userLname, userAddress, userEmail, userPhone, userUsername, userPwd) 
            VALUES ('$fName', '$lName', '$address', '$email', '$phone', '$username', '$pwd')";

    $results = mysqli_query($conn, $sql);

    if ($results) {
        echo "<html><head></head><body><script>
                alert ('Succesfully Registerd, Please log in');
                window.location.href='../login.php';
                </script>
                </body>
                </html>";
    } else {
        die(mysqli_error($conn));
    }
} else {
    header('Location: ../login.php');
    exit();
}

