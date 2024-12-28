<?php

$con=new mysqli('localhost','root','','login');

if(!$con){
    die(mysqli_error($con));
}

?>