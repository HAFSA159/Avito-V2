<?php 
require "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>usersignup page</title>

<!-- le tableau qui affiche les info -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');
        *{
        margin:0;
        padding: 0;
        outline: 0;
        }
       .title{
        background-color: rgb(89, 89, 167);
        height: 100px;
       }
       .title h1{
        display: flex;
        justify-content: center;
        padding-top: 1em;
        color: #fafafa ;
        letter-spacing: 7px;
        font-family: 'Montserrat', sans-serif;
       }
    
       .addAnn button{
        background-color: rgb(102, 102, 177);
        border: none;
        border-radius: 10px;
        padding: 1em;
        margin-top: 25px;
        color: #fff;
        margin-left: 23em;
       }
        
        table{
        position: relative;
        z-index: 2;
        margin: 30px auto;
        max-width:700px; 
        border-collapse: collapse;
        border-spacing: 0;
        box-shadow: 0 2px 15px rgba(64,64,64,.7);
        border-radius: 12px 12px 0 0;
        overflow: hidden;

        }
        td , th{
        padding: 15px 20px;
        text-align: center;

        }

        .btn{
            background-color: rgba(117, 117, 244, 0.342);
        }

        th{
        background-color: rgb(89, 89, 167);
        color: #fafafa;
        font-family: 'Open Sans',Sans-serif;
        font-weight: 200;
        text-transform: uppercase;

        }
        tr{
        width: 100%;
        background-color: #fafafa;
        font-family: 'Montserrat', sans-serif;
        }
        tr:nth-child(even){
        background-color: #eeeeee;
        }
       
        /* Basic styling for the buttons */
        .main-button {
            background-color: rgb(89, 89, 167);
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .delete-button{
            background-color: #e74c3c;
            color: #fff;
            padding: 8px 15px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .update-button {
            background-color: rgb(37, 37, 155);
            color: #fff;
            padding: 8px 15px;
            margin-left: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    
</head>
<body>
  
    <nav style="background-color: #5959A7;">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
      
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
    
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
        <a href="index.php"><img class="h-8 w-auto" src="./img/avito_logo.png" alt=""></a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <a href="readSp.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"><u>Users Liste</u></a>
            <a href="home.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Annonce Liste</a>
            <a href="annonce.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add an annonce</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
    
    <table>
        <thead>       
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" class="main-button">Operation</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <!-- <td><?php echo substr($row['password'], 0, 12) ; ?></td>  
                        <td><?php echo substr($row['confirm_password'], 0, 12) ; ?></td>  -->
                        <td><?php echo $row['role']; ?></td>
                        <td>
                        <?php
                        if(isset($_SESSION['role'])){
                            if ( $_SESSION['role']  == 'admin') {
                                echo "<button class='delete-button'>";
                                echo "<a href='./deleteSp.php?id=" . $row['id'] . "' style='color: #fafafa; text-decoration:none;'>Delete</a>";
                                echo "</button>";
                                echo "<button class='update-button'>";
                                echo "<a href='./updateSp.php?id=" . $row['id'] . "' style='color: #fafafa; text-decoration:none;'>Update</a>";
                                echo "</button>";
                            } else{
                                echo "-";
                            }
                          }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No user found</td></tr>";
            }

            ?>
        </tbody>
    </table>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>