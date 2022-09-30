<?php

 $email = "moneshtilavi22@gmail.com";
 $subject = "About Order Bill";
 $message = "<p>Your order id id  and the bill Amount is .</p>";
 $headers = "From: kittutilavi27@gmail.com";
 $headers .= "MIME-Version: 1.0"."\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";


 if (mail("moneshtilavi22@gmail.com","Success","Send mail from localhost using PHP")) {
     echo "Order Placed Successfully";
 } else {
     echo "Mail has been not sent.";
 }

?>