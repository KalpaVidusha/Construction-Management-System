<?php
// Assuming this file contains the database connection logic
require_once 'includes/dbh.inc.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
   

    // Construct an SQL query to add user login credentials
    $sql = "INSERT INTO mylogin (username, password) VALUES ( ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

        if (mysqli_stmt_execute($stmt)) {
           // echo '<script>alert("Login successfully!")</script>';
           header('location:user.php');
        } else {
            // Handle execution error gracefully
            echo '<script>alert("Failed to login. Please try again later.")</script>';
            error_log("Error: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle statement preparation error gracefully
        echo '<script>alert("An internal error occurred. Please try again later.")</script>';
        error_log("Error: " . mysqli_error($conn));
    }
}
?>





<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url("https://www.kiowatribe.org/sites/default/files/2023-04/construction_trends_bimcommunity.jpg");
            background-size:Cover;
        }
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            margin-top:150px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            align-items:center;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }
        .login-container h1 {
            text-align: center;
            color: #0000FF;
        }
        .login-container h2 {
            text-align: center;
            color: #333;
        }
        .login-container label, .login-container input {
            display: block;
            margin-bottom: 10px;
        }
        .login-container input[type="text"], .login-container input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h1>Welcome to Genisis Constructions!</h1>
    <h2>Login</h2>
    <form action="mylogin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>