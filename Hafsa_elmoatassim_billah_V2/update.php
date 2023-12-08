<?php
require 'connection.php';

// Assuming you have the ID of the announcement you want to update
$announcementIdToUpdate = $_GET['id']; // Replace with the actual ID

// Ensure the connection is open
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the existing data for the announcement to populate the form
$sql = "SELECT * FROM contact WHERE id = $announcementIdToUpdate";
$result = $conn->query($sql);

// Initialize variables to avoid undefined variable warnings
$existingFirstName = $existingLastName = $existingEmail = $existingCategory = '';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Check if the keys exist in the $row array before accessing them
    $existingFirstName = isset($row['title']) ? $row['title'] : '';
    $existingLastName = isset($row['description']) ? $row['description'] : '';
    $existingEmail = isset($row['price']) ? $row['price'] : '';
    $existingCategory = isset($row['category']) ? $row['category'] : '';
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Update Announcement</title>

    <!-- Add any additional styling if needed -->

</head>
<body class="flex justify-center items-center h-screen bg-gray-200">
<div class="bg-white p-8 rounded-md shadow-md max-w-xl w-full">
<div class="container mt-5">
<h2 class="text-2xl font-bold text-center mb-4">Update Announcement</h2>

    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $announcementIdToUpdate; ?>">

        <div class="mb-3">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre d'Annonce</label>
            <input type="text" class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300" name="new_title" value="<?php echo $existingFirstName; ?>" required>
        </div>

        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300" name="new_description" required><?php echo $existingLastName; ?></textarea>
        </div>


        <div class="mb-4">
           <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
           <input class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300" name="new_price" type="text" value="<?php echo $existingEmail; ?>" required>
        </div>


        <div class="mb-4">
    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
    <select class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300" name="new_category" required>
        <option value="Electronique" <?php echo ($existingCategory == 'Electronique') ? 'selected' : ''; ?>>Electronique</option>
        <option value="Logement" <?php echo ($existingCategory == 'Logement') ? 'selected' : ''; ?>>Logement</option>
        <option value="Voiture" <?php echo ($existingCategory == 'Voiture') ? 'selected' : ''; ?>>Voiture</option>
    </select>
</div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="update">Update</button>
    </form>
</div>

</body>
</html>
