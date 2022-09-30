<?php
require_once('../connect.php');

$request = $_POST['request'];

// multiple order status change
if($request=='cheakedNewOrders'){
    $newOrderIds = $_POST['newOrderIds'];
    foreach ($newOrderIds as $orderId) {
    $q="UPDATE `couterorder` SET `status`='1' WHERE `coId` ='$orderId';";
    $conf=mysqli_query($conn,$q);
    }
    echo "Selected Orders Status changed";
}

// single order change
if($request=='oneNewOrders'){
    $orderId = $_POST['newOrderIds'];
    $q="UPDATE `couterorder` SET `status`='1' WHERE `coId` ='$orderId';";
    $conf=mysqli_query($conn,$q);
    echo "Selected Orders Status changed";
}

?>