<?php
$sql_cars = "SELECT * FROM cars";
$result_cars = mysqli_query($connect ,$sql_cars);
$tbody_cars=''; //this variable will hold the body for the table
if(mysqli_num_rows($result_cars)  > 0) {     
     while($row_cars = mysqli_fetch_array($result_cars, MYSQLI_ASSOC)){         
        $tbody_cars .= "<tr>
            <td><img class='img-car' src='./pictures/" .$row_cars['picture']."'</td>
            <td>" .$row_cars['brand']."</td>
            <td>" .$row_cars['model']."</td>
            <td>" .$row_cars['status']."</td>
            <td><a href='products/update.php?id=" .$row_cars['id']."'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
            <a href='products/delete.php?id=" .$row_cars['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
            </td>
         </tr>
        ";
        
     };
} else  {
    $tbody_cars =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
?>