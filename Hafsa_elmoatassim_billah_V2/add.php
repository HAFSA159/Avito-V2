<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    if (empty($title) || empty($description) || empty($price) || empty($category) ) {
        echo "All inputs fields are required!";
        exit();
    }

    $sql = "INSERT INTO contact (title, description, price, category) VALUES ('$title', '$description', $price, '$category')";
    $result = mysqli_query($conn,$sql);
    // if ($conn->query($sql)) {
    //     echo "Records added successfully.";
    //     header("location: index.php");
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    header("Location: annonce.php");
}

// Close the connection
$conn->close();
?>

