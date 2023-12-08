<?php
session_start();

include 'connection.php';


// check if user logged
if (!isset($_SESSION["id"])) {
  header("Location: login.php");
  exit();
}

// logout
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("Location: login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Annonce</title>

  <style>
    body {
      background-color: #f8f9fa;
    }

    .form-button {
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: rgb(89, 89, 167);
      cursor: pointer;
      margin-bottom: 10px;
      margin: 10px;
    }

    .form-button a {
      color: #ffffff;
      text-decoration: none;
    }

    .loginbtn {
      display: flex;
      justify-content: end;
      width: 100%;
    }

    .container {
      max-width: 900px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      padding: 1em;
    }

    label {
      font-weight: bold;
    }

    .btn-primary {
      background-color: rgb(89, 89, 167);
      width: 100%;
    }
  </style>

</head>

<body>

  <form action="add.php" method="post">
    <div class="loginbtn" class="logout">
      <button  class="form-button"><a href="home.php">See the Annouces</a></button>
      <button name="logout" for="logout" class="form-button">Logout</button>
    </div>
  </form>

  <div class="container mt-5">
    <h2>Create an Announcement</h2>

    <form action="add.php" method="post">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" required>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" class="form-control" name="description" required></textarea>
      </div>

      <div class="mb-3">
        <label for="lastname" class="form-label">Price</label>
        <input type="text" class="form-control" placeholder="$$" name="price" required>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category" required>
          <option value="" disabled selected>Select a category</option>
          <option value="Electronique">Electronique</option>
          <option value="Logement">Logement</option>
          <option value="Voiture">Voiture</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
