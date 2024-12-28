<?php
//Assuming this file contains the database connection logic
require_once 'includes/dbh.inc.php';
//Check if the HTTP request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'updateinvoiceId' is set and not empty
    if (isset($_POST['updateinvoiceId']) && !empty($_POST['updateinvoiceId'])) {
        //Sanitize and retrieve data from the POST request
        $invoiceId = mysqli_real_escape_string($conn, $_POST['updateinvoiceId']);
        $projectId = mysqli_real_escape_string($conn, $_POST['projectId']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $payment = mysqli_real_escape_string($conn, $_POST['payment']);
        $paymentStatus = mysqli_real_escape_string($conn, $_POST['paymentStatus']);

//Create an SQL query to update a Financial Record
        $sql = "UPDATE fmdcrud SET projectId='$projectId', description='$description', payment='$payment', paymentStatus='$paymentStatus' WHERE invoiceId='$invoiceId'";
        //Execute the SQL query
        $result = mysqli_query($conn, $sql);

        //Check if the query was successfull or display and error message 
        if ($result) {
            echo '<script>alert("Financial Record updated successfully")</script>';
            //Redirect to the 'display.php' page
            header('location:display.php');
        } else {
            die(mysqli_error($conn));
        }
    }
}

// Fetch the initial data for the form
$invoiceId = $_GET['updateinvoiceId'];
$sql = "SELECT * FROM fmdcrud WHERE invoiceId=$invoiceId";
$result = mysqli_query($conn, $sql);
$_GET = mysqli_fetch_assoc($result);
$projectId = $_GET['projectId'];
$description = $_GET['description'];
$payment = $_GET['payment'];
$paymentStatus = $_GET['paymentStatus'];
?>

<!doctype html>
<html lang="ar" dir="ltl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                <input type="text" class="form-control" placeholder="Enter the project id" name="projectId" value="<?php echo $projectId; ?>">
            </div>

            <div class="box2">
                <label>Description</label>
                <input type="text" class="form-control" placeholder="Enter the description" name="description" value="<?php echo $description; ?>">
            </div>

            <div class="box3">
                <label>Payment</label>
                <input type="text" class="form-control" placeholder="Enter the payment" name="payment" value="<?php echo $payment; ?>">
            </div>

            <div class="box4">
                <label>Payment Status</label>
                <input type="text" class="form-control" placeholder="Enter the payment status" name="paymentStatus" value="<?php echo $paymentStatus; ?>">
            </div>

            <!-- Add a hidden input field to pass 'updateinvoiceId' -->
            <input type="hidden" name="updateinvoiceId" value="<?php echo $invoiceId; ?>">
            
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html> 