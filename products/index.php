 
<?php 
session_start();
require_once '../components/db_connect.php';


// if (isset($_SESSION['user']) != "") {
//     header("Location: index.php");
//     exit;
// }

// if (isset($_SESSION['adm'])) {
//     header("Location: ./dashboard.php");
//     exit;
// }

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ./index.php");
    exit;
}

$sql = "SELECT * FROM cars";
$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {     
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='../pictures/" .$row['picture']."'</td>
            <td>" .$row['brand']."</td>
            <td>" .$row['model']."</td>
            <td>" .$row['status']."</td>
            <td><a href='reservation.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' name='reservation' type='button'>Details/Reservation</button></a>
            </td>
         </tr>
        ";
        
     };
} else  {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        .manageProduct {           
            margin: auto;
        }
        .img-thumbnail{
            width: 300px !important;
            height: 180px !important;
        }
        td 
        {          
            text-align: center;
            vertical-align: middle;
        }
        tr
        {
            text-align: center;
        }
    </style>
</head>


<body>
<header>
<?php require_once "../components/navbar.php" ?>
</header>
<div class="manageProduct w-75 mt-3">    
   
   <p class='h2'>Cars for Rental</p>
   
   <table class='table table-striped'>
       <thead class='table-success'>
           <tr>
               <th>Picture</th>
               <th>Brand</th>
               <th>Model</th>
               <th>Status</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
          <?= $tbody; ?>
          
       </tbody>
   </table>
</div>

<?php require_once "../components/boot_js.php" ?>

</body>
</html>

