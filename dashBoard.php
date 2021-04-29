<?php
session_start();
require_once 'components/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
$sqlSelect = "SELECT * FROM user WHERE status != ? ";
$stmt = $connect->prepare($sqlSelect);
$stmt->bind_param("s", $status);
$work = $stmt->execute();
$result = $stmt->get_result();
//this variable will hold the body for the table
$tbody = ''; 


if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
            <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
            <td>" . $row['date_of_birth'] . "</td>
            <td>" . $row['email'] . "</td>
            <td><a href='admin_update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
};
include_once "components/cars_sql.php";
include_once "components/user_sql.php";
include_once "components/bookings_sql.php";
$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adm-DashBoard</title>
        <?php require_once 'components/boot.php'?>
        <style type="text/css">        
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }
            .img-car {
                width: 300px;
                heigth: 180px;
            }
            td{
                text-align: center;
                vertical-align: middle;
            }
            tr{
                text-align: center;
            }
            .userImage{
                width: 100px;
                height: auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <div class="row">
                <div class="col-2">
                    <img class="userImage" src="pictures/admavatar.png" alt="Adm avatar">
                    <p class="">Administrator</p>
                    
                    <a href="logout.php?logout">Sign Out</a>
                </div></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">User</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Cars</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Bookings</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><?php require_once "components/user.php" ?></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><?php require_once "components/cars.php" ?></div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php require_once "components/bookings.php" ?></div>
</div>


        </div>
        <?php require_once "components/boot_js.php" ?>
    </body>
</html>