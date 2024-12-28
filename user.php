<?php
// Assuming this file contains the database connection logic
require_once 'includes/dbh.inc.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectId = $_POST['projectId'];
    $description = $_POST['description'];
    $payment = $_POST['payment'];
    $paymentStatus = $_POST['paymentStatus'];

    // Construct an SQL query to add a Financial Record
    $sql = "INSERT INTO fmdcrud (projectId, description, payment, paymentStatus) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, 'ssss', $projectId, $description, $payment, $paymentStatus);

        if (mysqli_stmt_execute($stmt)) {
           // echo '<script>alert("Financial record added successfully")</script>';
           header('location:display.php');
        } else {
            // Handle execution error gracefully
            echo '<script>alert("Failed to add financial record. Please try again later.")</script>';
            error_log("Error: " . mysqli_error($con));
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle statement preparation error gracefully
        echo '<script>alert("An internal error occurred. Please try again later.")</script>';
        error_log("Error: " . mysqli_error($con));
    }
}
?>




<!doctype html>
<html lang="ar" dir="ltl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <style>
         body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            background-image: url("https://startupbiz.co.zw/wp-content/uploads/2023/05/7-Construction-Business-Ideas-For-Zimbabwe.jpg");
            background-size:Cover;
        }

        h2{
            margin-left: 30px;
            font-family: arial;
            font-weight: bold;
            color:blanchedalmond;
        }

        form{
            margin: 10px;
            width: 95%;
            padding: 10px;
        }
        input[type="text"]{
            display: flex;
            margin-left: 10px;
            width: 300px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            border-color: black;
         }
         .box1{
            margin: 5px;
            padding: 10px;
        }
        .box2{
            margin: 5px;
            padding: 10px;
        }
        .box3{
            margin: 5px;
            padding: 10px;
        }
        .box4{
            margin: 5px;
            padding: 10px;
        }
        button{
            background-color: blanchedalmond;
            margin: 10px;
            width: 100px;
            height: 40px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            
            
        }
        
    </style>
   
    <title>Financial Manager Dashboard</title>
</head>

<body>
    <div class="banner-img"></div>
    <div class="container my-5">
    <h2>Financial Records</h2>
        <form method="post">
            <div class="box1">
                <label>Project ID</label>
                <input type="text" class="form-control" placeholder="Enter the project id" name="projectId">
            </div>

            <div class="box2">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter the description" name="description">
            </div>

            <div class="box3">
                <label>Payment</label>
                <input type="text" class="form-control" placeholder="Enter the payment" name="payment">
            </div>

            <div class="box4">
                <label>Payment Status</label>
                <input type="text" class="form-control" placeholder="Enter the payment status" name="paymentStatus">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>