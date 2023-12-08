<?php 

include "connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$role= mysqli_real_escape_string($conn, $_POST['role']);


if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password) || empty($role)) {
    echo "All inputs fields are required!";
    exit();
}

if ($password != $confirm_password) {
    echo "Passwords do not match";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$hashed_password2 = password_hash($confirm_password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users (firstname, lastname, email, password , confirm_password, role)
 VALUES ('$firstname', '$lastname', '$email', '$hashed_password' , '$hashed_password2' , '$role')";

if ($conn->query($sql)) {
    echo "User added successfully.";
    header("location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

}
?>

