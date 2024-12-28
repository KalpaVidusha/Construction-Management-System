<?php

//include data
require_once "AdminconnectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST ["first_name"];
    $lname = $_POST ["last_name"];
    $username = $_POST ["user_name"];
    $pass = $_POST ["pass"];
    $email = $_POST ["email"];

    //insert data to database

    $sql = "INSERT INTO staff_member (first_name , last_name , user_name , pass , email) VALUES ('$fname' , '$lname' , '$username' , '$pass' , '$email')" ; 

    //check data insert correctly

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('User added successfully!') </script>";
        echo "<script> window.location.href = 'AdminDataDisplayTable.php' </script>";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();
?>