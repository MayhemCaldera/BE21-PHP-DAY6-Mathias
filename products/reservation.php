<?php 
session_start();
require_once '../components/db_connect.php';


// if (isset($_SESSION['adm'])) {
//     header("Location: dashboard.php");
//     exit;
// }

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}
// create booking
if (isset($_POST['submitb'])) {
    $p_id = $_POST['pID'];
    $u_id = $_SESSION['user'];
    $queryCheck = "SELECT * FROM booking WHERE fk_car ='$p_id'";
    $cres = mysqli_query($connect, $queryCheck);
    $count = mysqli_num_rows($cres);
    if ($count != 0) {
        $messageA = "Product is already booked";
        echo "<script type='text/javascript'>alert('$messageA');</script>";
    } else {
        $sqlin = "INSERT INTO booking (fk_car, fk_user) VALUES ('$p_id', '$u_id')";
        if ($connect->query($sqlin) === TRUE) {
            $messageB = "Booking successfully";
            echo "<script type='text/javascript'>alert('$messageB');</script>";
        } else {
            echo "Error: " . $sqlin . "<br>" . $connect->error;
        };
    };  
}


$tbody=''; //this variable will hold the body for the table
if ($_GET["id"]) {
    $p_id = $_GET['id']; 
    
    // echo $p_id;
    // echo "hi";
$sql = "SELECT * FROM cars WHERE id = '$p_id'";
$result = mysqli_query($connect ,$sql);

if(mysqli_num_rows($result)  > 0) {     
     while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){         
        $tbody .= "<tr>
            <td><img src='../pictures/" .$row['picture']."'</td>
            <td>" .$row['brand']."</td>
            <td>" .$row['model']."</td>
            <td>" .$row['status']."</td>
            <td>" .$row['horse_power']." PS"."</td>
            <td>" .$row['price']." €"."</td>
            <td><form action='reservation.php' method='post'>
            <input type ='hidden' name='pID' class='form-control' value='".$row['id']."'/>
            <button class='btn btn-primary btn-sm' name='submitb' type='submit'>Rent Me</button>
        </form>
            
            </td>
         </tr>
        ";
        
     };
} else  {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
};
}


$connect->close();

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Reservation</title>
    <style>
        td 
        {          
            text-align: center;
            vertical-align: middle;
        }
        tr
        {
            text-align: center;
        }
        img {
            width: 300px;
            height: 180px;
        }
    
    </style>
</head>
<body>
    
<header>
<?php require_once "../components/navbar.php" ?>
</header>
<div class="container">
<div class="manageProduct w-90 mt-3">    
   
   <p class='h2'>Cars for Rental</p>
   
   <table class='table table-striped'>
       <thead class='table-success'>
           <tr>
               <th>Picture</th>
               <th>Brand</th>
               <th>Model</th>
               <th>Status</th>
               <th>Horsepower</th>
               <th>Price per Day</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
          <?= $tbody; ?>
          
       </tbody>
   </table>
</div>
</div>
<?php require_once "../components/boot_js.php" ?>
</body>
</html>