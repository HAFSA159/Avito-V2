<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'contactinfo';



$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    echo 'failed';  
}

 ?>
