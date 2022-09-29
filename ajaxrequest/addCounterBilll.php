<?php
require_once('../connect.php');

$orderId = $_POST['orderId'];
$customerId = $_POST['customerId'];
$pickupDate = $_POST['pickupDate'];
$delivaryType = $_POST['delivaryType'];
$grossTotal = $_POST['grossTotal'];
$disPer = $_POST['disPer'];
$discount = $_POST['discount'];
$gstAmount = $_POST['gstAmount']*2;
$billAmount = $_POST['billAmount'];
$paymentType = $_POST['paymentType'];

    $q="INSERT INTO `couterorder`(`coId`, `cid`, `pickupDate`, `deleveryType`, `grossAmount`, `discountPer`, `discount`, `gst`, `totAmount`, `paymentType`)
    VALUES ('$orderId','$customerId','$pickupDate','$delivaryType','$grossTotal','$disPer','$discount','$gstAmount','$billAmount','$paymentType')";
    $confirm=mysqli_query($conn,$q);
    if($confirm)
    {
        // get temp product
        $qry1="SELECT * FROM `tempproduct`;";
		$confirm1 = mysqli_query($conn,$qry1);
		while($product = mysqli_fetch_array($confirm1))
		{
            // insert temp product in permant table
            $q2="INSERT INTO `counterproduct`(`coId`, `unit`, `pid`, `pqty`, `weight`, `rate`, `amount`, `remark`) 
            VALUES ('$orderId', '$product[1]', '$product[2]', '$product[3]', '$product[4]', '$product[5]', '$product[6]', '$product[7]')";
            $cfm2=mysqli_query($conn,$q2);

            // fetch tpid from permanat table
            $q3="SELECT `tpid` FROM `counterproduct` ORDER BY `tpid` DESC LIMIT 1;";
            $cfm3=mysqli_query($conn,$q3);
            $row3=mysqli_fetch_array($cfm3);
            echo $row3[0];

            $qry4="SELECT * FROM `tempaddon` WHERE `tpid`='$product[0]';";
            $cfm4 = mysqli_query($conn,$qry4);
            while($addon = mysqli_fetch_array($cfm4))
            {
                $q5="INSERT INTO `counteraddon`(`coId`, `tpid`, `pid`, `addon`, `rate`, `qty`, `total`) VALUES ('$orderId','$row3[0]','$addon[2]','$addon[3]','$addon[4]','$addon[5]','$addon[6]')";
                $cfm5 = mysqli_query($conn, $q5);
            }
        }

        $qry6="TRUNCATE `tempaddon`;";
        $cfm6 = mysqli_query($conn,$qry6);
        $qry7="TRUNCATE `tempproduct`;";
        $cfm7 = mysqli_query($conn,$qry7);

        echo "Order Placed Successfully";
    }
    

?>