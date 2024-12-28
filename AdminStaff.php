<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management System</title>
    <link rel="stylesheet" type="text/css" href="AdminStaffccs.css">

</head>
<body>
    <h1>Staff Management System</h1>

    <div class="user-form">
        <h2>Add Staff Member</h2>
        <form id="addUserForm" action="./AdmintDataincert.php" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required><br>

            <label for="user_name">Username:</label>
            <input type="text" id="last_name" name="user_name" required><br>

            <label for="pass">Password:</label>
            <input type="text" id="last_name" name="pass" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <button type="submit">Add Member</button>


        </form>
    </div>

   

</body>
</html>
