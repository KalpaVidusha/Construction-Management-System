<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management Site - Register</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/signupStyles.css">
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
                <li><a href="signup.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div class="center">
            <h2>Register</h2>
            <form action="includes/signup.inc.php" method="POST">
                <div class="form-left">
                    <div class="form-group">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" name="first-name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" name="phone" required maxlength="10" pattern="[0-9]{10}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>
                <div class="form-right">
                    <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" name="last-name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                </div>
                <div class="form-group">
                <button name="submit" type="submit">Register</button>
                </div>
            </form>
            <p>Already a member? <a href="login.php">Login</a></p>
        </div>
    </div>

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <!-- Optional: JavaScript and additional scripts can be added here -->

</body>
</html>
