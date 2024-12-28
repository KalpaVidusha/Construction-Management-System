<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management site</title>
    <link rel="stylesheet" href="styles\styles.css"> 
    <link rel="stylesheet" href="styles\loginStyles.css">
    
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
            if (isset($_SESSION['userId'])) {
                // If logged in, display "My Profile" and "Logout" links
                echo '<li><a href="profile.php">My Profile</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                // If not logged in, display "Register" and "Login" links
                echo '<li><a href="signup.php">Register</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>


        <div class="container">
        <div class="center">
            <h2>Login</h2>
            <form action="includes/login.inc.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button name="submit" type="submit">Login</button>
                </div>
            </form>
                <p>Not a member?<a href="signup.php">Register</a></p>
                <p>If staff <a href="staffloginall.html">click here</a></p>

        </div>
    </div>
    

	<footer>
		
	</footer>

    <!-- footer -->

    

</body>
</html>


