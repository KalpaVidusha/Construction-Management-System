<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management site</title>
    <link rel="stylesheet" href="styles\styles.css"> 

    

</head>
<body>
    <!-- Header  -->
    
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
                // If logged in, display "My Profile" and "my projects" links
                echo '<li><a href="logout.php">My Projects</a></li>';
                echo '<li><a href="profile.php">My Profile</a></li>';
                
            } else {
                // If not logged in display "Register" and "Login" links
                echo '<li><a href="signup.php">Register</a></li>';
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

        
        <?php
       if (isset($_SESSION['username'])) {
        echo '<h1>Welcome..!  ' . $_SESSION['username'] . '</h1>';
        }
        ?>
         <div class="content">
            <h2>Welcome To</h2>
        <h1>Genesis Builders</h1>
        <h2>Building Dreams, One Brick at a Time: Your Trusted Construction Partner</h2>

    <h2>What we do</h2>

        <section>
        <h2><small>CIVIL ENGINEERING CONSTRUCTION</small></h2>
        <p>We undertake the Construction of Civil Engineering Projects including Highways, Bridges, Irrigation Canals & Structures, Dams, and Water supply schemes.</p>
    </section>

    <section>
        <h2>COMMERCIAL BUILDING CONSTRUCTION</h2>
        <p>We undertake the construction of all types of buildings from residential houses to multi-story Buildings for the government sector & private sector clients.</p>
    </section>

    <section>
        <h2>CONSTRUCTION OF HOUSES & APARTMENTS</h2>
        <p>We construct houses and apartments at our lands for sale. Also, we undertake to construct residential buildings at clients’ lands as per our plans or clients’ plans.</p>
    </section>

   
    <section>
        <h2>ROAD DEVELOPMENTS & CONSTRUCTIONS</h2>
        
    </section>

    <section>
        <h2>IRRIGATIONS SYSTEMS DEVELOPMENTS</h2>
        
    </section>

    
    </div>
    <video autoplay muted loop id="myVideo">
        <source src="videos/home.mp4" type="video/mp4">
    </video>





<footer>
    <footer class="footer">
        <div class="row">
            <div class="footer-col">
                <h4>
                    Quick Links
                </h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    <li><a href="interiors.html">Interiors</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                </ul>
            </div>
            
            
            <div class="footer-col" style="width: 25%;">
                <h4>
                    Contact Us
                </h4>
                <ul>
                    <li><i class="fa-solid fa-phone"></i> +11 250 8066</li>
                    <li><i class="fa-solid fa-location-dot"></i> No 16, Galle Road, Colombo 4</li>
                    <li><i class="fa-solid fa-at"></i> inquires@genisis.lk</li>
                </ul>
            </div>
            


        </div>
        <br><br><br><br>
        <div class="social">
            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>


            <div class="footer_bottom"><br>
                <p>Copyright &copy;Genesis Builders</p>
            </div>
        </div>
    </footer>
	

    <!-- footer -->

    

</body>
</html>


