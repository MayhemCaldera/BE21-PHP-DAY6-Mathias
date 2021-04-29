<?php
$sql_sum = ("SELECT COUNT(id) AS sum FROM user WHERE user.id");
$result_count = mysqli_query($connect, $sql_sum);
if (mysqli_num_rows($result_count) > 0) {
    while ($srow = $result_count->fetch_array(MYSQLI_ASSOC)) {
        $user_sum = $srow['sum'];
    };
}
?>