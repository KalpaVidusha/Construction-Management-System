<?php
session_start();
$username = $_SESSION['username'];

require_once 'includes/dbh.inc.php';

if (!isset($username)) {
    header('location: login.php');
}

$sql = "SELECT * FROM user WHERE userUsername = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fName = $row["userFname"];
    $lName = $row["userLname"];
    $address = $row["userAddress"];
    $email = $row["userEmail"];
    $phone = $row["userPhone"];
    $username = $row["userUsername"];
    $pwd = $row["userPwd"];
   
} else {
    echo "<html><head></head><body><script>
    alert ('Please log in');
    window.location.href='signup.php';
    </script>
    </body>
    </html>";
    exit();
}

if (isset($_POST['update-profile'])) {
    $newFName = $_POST['new-first-name'];
    $newLName = $_POST['new-last-name'];
    $newAddress = $_POST['new-address'];
    $newEmail = $_POST['new-email'];
    $newPhone = $_POST['new-phone'];
    $newpwd = $_POST["new-userPwd"];

    // Update user details
    $updateSql = "UPDATE user SET userFname = ?, userLname = ?, userAddress = ?, userEmail = ?, userPhone = ?, userPwd = ? WHERE userUsername = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssssss", $newFName, $newLName, $newAddress, $newEmail, $newPhone, $newpwd, $username);

    if ($stmt->execute()) {
        echo "<html><head></head><body><script>
        alert ('Update successful');
        window.location.href = 'profile.php';
        </script>
        </body>
        </html>";
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['delete-account'])) {
    // Perform the account deletion
    $deleteSql = "DELETE FROM user WHERE userUsername = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        session_unset();
        session_destroy();
        echo "<html><head></head><body><script>
                alert ('Account deleted successfully!');
                window.location.href='index.php';
                </script>
                </body>
                </html>";
    } else {
        echo "Account deletion failed: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['logout'])) {
    // Clear the session and log the user out
    session_unset();
    session_destroy();
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management site</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/profileStyles.css">
</head>

<body>
    <!-- Header Section -->
    <div class="header">
    <nav>
        <img src="logo.png" alt="Construction Management Logo">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">Our Services</a></li>
            <li><a href="#services">Our Projects</a></li>
            <li><a href="#blog">Contact Us</a></li>
            <li><a href="#contact">About Us</a></li>
            <?php
            // Check if the user is logged in
            if (isset($_SESSION['username'])) {
                // If logged in, display "My Profile" and "Logout" links
                echo '<li><a href="logout.php">My Projects</a></li>';
                echo '<li><a href="profile.php">My Profile</a></li>';
                
            } else {
                // If not logged in, display "Register" and "Login" links
                echo '<li><a href="signup.php">Register</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
    <div class="outer-box">
        <div class="My-Profile-container">
            <h1>My Profile</h1>
            <img src="images/blank-profile-picture-973460_1280.png" alt="User Profile Picture" class="profile-picture">

            <p class="username">Username: <?php echo $username; ?></p>
            <form method="POST" action="">
                <button class="logout-button" name="logout">Log Out</button> <!-- Log Out button  -->
            </form>
            <p>
                <h3>Account Details</h3>
            </p>
            <p>First Name: <?php echo $fName; ?></p>
            <p>Last Name: <?php echo $lName; ?></p>
            <p>Address: <?php echo $address; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Phone Number: <?php echo $phone; ?></p>
        </div>
    </div>
    <div class="outer-box">
        <div class="Manage-Account-container">
            <h2 class="Manage-Account-title">Manage Account</h2>
            <form method="POST" action="" enctype="multipart/form-data"> <!-- Added enctype attribute for file uploads -->
                <div class="account-info">
                    <div class="account-detail">
                        <label for="new-first-name">First Name:</label>
                        <input type="text" id="new-first-name" name="new-first-name" value="<?php echo $fName; ?>">
                        <button class="update-button" name="update-profile">Update</button>
                    </div>
                    <div class="account-detail">
                        <label for="new-last-name">Last Name:</label>
                        <input type="text" id="new-last-name" name="new-last-name" value="<?php echo $lName; ?>">
                        <button class="update-button" name="update-profile">Update</button>
                    </div>
                    <div class="account-detail">
                        <label for="new-address">Address:</label>
                        <input type="text" id="new-address" name="new-address" value="<?php echo $address; ?>">
                        <button class="update-button" name="update-profile">Update</button>
                    </div>
                    <div class="account-detail">
                        <label for="new-email">Email:</label>
                        <input type="text" id="new-email" name="new-email" value="<?php echo $email; ?>">
                        <button class="update-button" name="update-profile">Update</button>
                    </div>
                    <div class = "account-detail">
                        <label for="new-phone">Phone Number:</label>
                        <input type="text" id="new-phone" name="new-phone" value="<?php echo $phone; ?>">
                        <button class="update-button" name="update-profile">Update</button>
                    </div>
                    <div class = "account-detail">
                        <label for="new-userPwd">Password:</label>
                        <input type="text" id="new-userPwd" name="new-userPwd" value="<?php echo $pwd; ?>">
                        <button class="update-button" name="update-profile">Update</button>
                    </div>
                    <div class="account-detail">
                        <button class="delete-button" name="delete-account">Delete Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
