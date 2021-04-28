<?php

require_once 'components/db_connect.php';

// if ($_GET['id']) {
//     $id = $_GET['id'];
    $bres = mysqli_query($connect ,"SELECT * FROM booking JOIN cars ON fk_car = cars.id JOIN user ON fk_user = user.id
    WHERE fk_user = user.id");
    $bbody=''; // this variable will hold the body for the table
    if(mysqli_num_rows($bres)  > 0) {     
        while($brow = mysqli_fetch_array($bres, MYSQLI_ASSOC)){         
            $bbody .= "<tr>
                <td><img class='img-thumbnail' src='./pictures/".$brow['picture']."'</td>
                <td>" .$brow['first_name']."</td>
                <td>" .$brow['brand']."</td>
                <td>" .$brow['model']."</td>
            </tr>";
        };
    } else  {
        $bbody = "<tr><td colspan='5'><center>No Bookings</center></td></tr>";
    }
// }
   
?>