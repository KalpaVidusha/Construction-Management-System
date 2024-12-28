<?php
session_start();
if(isset($_POST['submit']))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

     

    require_once 'dbh.inc.php';

    // To prevent SQL injection
    $sql = "SELECT * FROM user WHERE userUsername = ? AND userPwd = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();

        // Store user details in session variables
       
        $_SESSION['username'] = $row['userUsername'];

        //if Valid username and password
        echo "<html><head></head><body><script>
            alert ('login successful');
            window.location.href='../index.php';
            </script>
            </body>
            </html>";
            
        exit(); 
            
    } else {
        // if Invalid username or password
        echo "<html><head></head><body><script>
        alert ('invalid user');
        window.location.href = '../login.php';
        </script>
        </body>
        </html>";
        }
        
    $stmt->close();
        
    $conn->close();
    }
?>