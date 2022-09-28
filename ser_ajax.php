<?php


require_once('connect.php');

$pdnam=$_POST['wingname'];



$sql="SELECT * FROM `customer` WHERE `full`='$pdnam'";


$a = array();
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row['full'],$row['mobile'],$row['adds'],$row['hno'],$row['zip'],$row['email'],$row['adds1'],$row['gstn']);
    }
}
echo json_encode($a);
mysqli_close($conn);
?>