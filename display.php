<?php
// Assuming this file contains the database connection logic
require_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operation</title>
    <!--Link to an external file CSS file named 'mstyle.css' for styling-->
    <link rel="stylesheet" href="mstyle.css">
</head>
<body>
    <!--Create background container with a class 'background-container'-->
<div class="background-container"></div>
<!--Create a container for the main content-->
<div class="container">
    <!--Create a button that links to the 'user.php' page to add a user-->
   <button class="btn btn-primary my-5"><a href="user.php" class="text-light">Add Invoice</a></button>
   <!--Create an HTML table to display data-->
   <table class="table">
       <thead>
           <tr>
               <th scope="col">Invoice ID</th>
               <th scope="col">Project ID</th>
               <th scope="col">Description</th>
               <th scope="col">Payment</th>
               <th scope="col">Payment Status</th>
               <th scope="col">Operations</th>
           </tr>
       </thead>
       <tbody>
           <?php
           //Select all data from the 'fmdcrud' table
           $sql = "SELECT * FROM fmdcrud";
           $result = mysqli_query($conn, $sql);

           //Check if the query was successful
           if ($result) {
            //Loop through the results and display them in the table
               while ($row = mysqli_fetch_assoc($result)) {
                   $invoiceId=$row['invoiceId'];
                   $projectId = $row['projectId'];
                   $description = $row['description'];
                   $payment = $row['payment'];
                   $paymentStatus = $row['paymentStatus'];
                   echo '<tr>
                   <td>'.$invoiceId.'</td>
                   <td>'.$projectId.'</td>
                   <td>'.$description.'</td>
                   <td>'.$payment.'</td>
                   <td>'.$paymentStatus.'</td>
                   <td>

                     <button class="btn btn-primary"><a href="mupdate.php ?updateinvoiceId='.$invoiceId.'">Update</a></button>
                     <button class="btn btn-danger"><a href="delete.php ?deleteinvoiceId='.$invoiceId.'">Delete</a></button>
                   </td>
               </tr>';
           }
       }
       ?>



   </tbody>
</table>
</div>
</body>
</html>