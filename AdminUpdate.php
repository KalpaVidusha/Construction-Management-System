<?php
// Include database connection
require_once "AdminconnectDB.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST["id"];
    $newFname = $_POST["first_name"];
    $newLname = $_POST["last_name"];
    $newUsername = $_POST["user_name"];
    $newPass = $_POST["pass"];
    $newEmail = $_POST["email"];

    // Perform an SQL UPDATE query to update the staff member's information
    $sql = "UPDATE `staff_member` SET
        first_name = '$newFname',
        last_name = '$newLname',
        user_name = '$newUsername',
        pass = '$newPass',
        email = '$newEmail'
        WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User Details Update Successfully')</script>";
        header("Location: AdminDataDisplayTable.php"); // Corrected header function
        exit(); // Optional, to prevent further script execution
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
