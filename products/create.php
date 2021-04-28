
<?php
session_start();
require_once '../components/db_connect.php';
if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}


// $result = mysqli_query($connect, "SELECT * FROM cars");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php'?>
    <title>PHP CRUD  |  Add Product</title>
    <style>
        /* fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60% ;
        }        */
    </style>
</head>
<body>
<fieldset>
   <legend class='h2'>Add Product</legend>
   <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
   <table class='table'>
           <tr>
               <th>Brand</th>
               <td><input class='form-control' type="text" name="brand"  placeholder="Brand Name" /></td>
           </tr>    
           <tr>
               <th>Model</th>
               <td><input class='form-control' type="text" name="model"  placeholder="Model Name" /></td>
           </tr>    
           <tr>
               <th>Horsepower</th>
               <td><input class='form-control' type="text" name="horse_power"  placeholder="Horsepower" /></td>
           </tr>    
           <tr>
               <th>Color</th>
               <td><input class='form-control' type="text" name="color"  placeholder="Color" /></td>
           </tr>    
           <tr>
               <th>Status</th>
               <td><input class='form-control' type="text" name="status"  placeholder="Available/Reserved" /></td>
           </tr>    
           <tr>
               <th>Price</th>
               <td><input class='form-control' type="number" step="any" name= "price" placeholder="Rental Price" /></td>
           </tr>
           <tr>
               <th>Picture</th>
               <td><input class='form-control' type="file" name="picture" /></td>
           </tr>
           
           <tr>
               <td><button class='btn btn-success' type="submit">Insert Product</button></td>
               <td><a href="../dashboard.php"><button class='btn btn-warning' type="button">Home</button></a></td>
           </tr>
       </table>
   </form>
</fieldset>
</body>
</html>

