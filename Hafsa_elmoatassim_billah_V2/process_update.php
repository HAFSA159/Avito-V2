<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $newTitle = $_POST['new_title'];
    $newDescription = $_POST['new_description'];
    $newPrice = $_POST['new_price'];
    $newCategory = $_POST['new_category'];

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Construct the SQL query for updating data in the 'contact' table
    $sql = "UPDATE contact SET title='$newTitle', description='$newDescription', price='$newPrice', category='$newCategory' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: home.php");
        exit(); 
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
