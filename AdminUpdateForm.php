<?php
// Include database connection
require_once "AdminconnectDB.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the staff member's information based on the provided ID
    $sql = "SELECT * FROM `staff_member` WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row["first_name"];
        $lname = $row["last_name"];
        $username = $row["user_name"];
        $pass = $row["pass"];
        $email = $row["email"];
    } else {
        echo "Staff member not found with the provided ID.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Staff Member</title>
    <link rel="stylesheet" type="text/css" href="AdminUpdateFormCSS.css">
</head>
<body>
    <header>
    <h2>Update Staff Member</h2>
</header>
    <form action= AdminUpdate.php method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="first_name">Update First Name:</label>
        <input type="text" name="first_name" value="<?php echo $fname; ?>"><br>

        <label for="last_name">Update Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $lname; ?>"><br>

        <label for="user_name">Update Username:</label>
        <input type="text" name="user_name" value="<?php echo $username; ?>"><br>

        <label for="pass">Update Password:</label>
        <input type="text" name="pass" value="<?php echo $pass; ?>"><br>

        <label for="email">Update Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>"><br>

        <input actio type="submit" name="update" value="Update">
    </form>
</body>
</html> 
