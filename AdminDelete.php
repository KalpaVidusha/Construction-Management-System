<?php
require_once './AdminconnectDB.php';

if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];

    $sql = "DELETE FROM staff_member WHERE id = $deleteid";
    $result = $conn->query($sql);

    if ($result) {
        echo ("<script>alert('Deleted Successfully !')</script>");
        header('Location: AdminDataDisplayTable.php');
    } else {
        die("Connection failed !");
    }
}

