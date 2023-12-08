<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $existingFirstName = $_POST['firstname'];
    $existingLastName = $_POST['lastname'];
    $existingEmail = $_POST['email'];
    $existingpassword = $_POST['password'];
    $existingconfirm_password = $_POST['confirm_password'];
    $existingrole = $_POST['role'];

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET firstname='$existingFirstName', lastname='$existingLastName', email='$existingEmail', password='$existingpassword', confirm_password='$existingconfirm_password', role='$existingrole'  WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: readSp.php");
        exit(); 
    } else {
        echo "Error updating record: " . $conn->error;
    }
    

    $conn->close();
}
?>
