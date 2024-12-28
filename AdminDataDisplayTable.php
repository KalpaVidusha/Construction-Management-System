<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="AdminDisplayTableCss.css">
<script>
function redirectToUpdateForm(id) {
    // Redirect to the update form with the specific ID
    window.location.href = 'AdminUpdateForm.php?id=' + id;
}
</script>
</head>
<body>
<table class="usertableview">
        <tr class="tablehead">
            <th>Staff ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
        </tr>

        <?php
        include ("AdminconnectDB.php");

        $sql = "SELECT * FROM staff_member";
        $result = $conn->query($sql);

        if(!$result){
            die("Invalid query: ".$conn->error);
        }

       
         while($row = $result->fetch_assoc()){
            $id=$row['id'];
            $firstname=$row['first_name'];
            $lastname=$row['last_name'];
            $username=$row['user_name'];
            $password=$row['pass'];
            $email=$row['email'];

            echo '<tr>
            <td>'. $id.'</td>
            <td>'. $firstname.'</td>
            <td>'. $lastname.'</td>
            <td>'. $username.'</td>
            <td>'. $password.'</td>
            <td>'. $email.'</td>
            <td>
                <button onclick="redirectToUpdateForm('.$row["id"].')">Update</button>
                <button><a href="AdminDelete.php?deleteid='.$id.'" class="delebtn">Delete</a></button>
            </td>
        </tr>';
        }
        ?>
    </table>
  
</body>
</html>
