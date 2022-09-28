
<?php
require_once('connect.php');
echo $sql3 = "TRUNCATE TABLE orderdel";
if (!mysqli_query($conn, $sql3)) {
    die('Error: ' . mysqli_error($conn));
}
header("Location: order_add.php");
?>


