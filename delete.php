<?php
require_once 'includes/dbh.inc.php';
if(isset($_GET['deleteinvoiceId'])){
    $invoiceId=$_GET['deleteinvoiceId'];

    $sql="delete from `fmdcrud` where invoiceId=$invoiceId";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "Deleted Successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }
}


?>