
<?php
include("../connect.php");


if(isset($_POST['addcust']))
{
    $id=$_POST['id'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $hno=$_POST['hno'];
    $adds=$_POST['adds'];
    $city=$_POST['city'];
    $land=$_POST['land'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $full=$fname." ".$mname." ".$lname;
    $query="INSERT INTO `customer`(`cid`,`fname`,`mname`,`lname`,`email`,`mobile`,`hno`,`adds`,`land`,`city`,`state`,`zip`,`full`)VALUES('$id','$fname','$mname','$lname','$email','$mobile','$hno','$adds','$land','$city','$state','$zip','$full');";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        echo "<script>alert('Customer Added Successfully');</script>";
        echo '<script> window.location="add_cust.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="add_cust.php"; </script>';
    }      

  
}


if(isset($_POST['postUpdate']))
{
    $id=$_POST['id'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $hno=$_POST['hno'];
    $adds=$_POST['adds'];
    $city=$_POST['city'];
    $land=$_POST['land'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $full=$fname." ".$mname." ".$lname;
    $query="UPDATE `customer` SET `cid`='$id',`fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`mobile`='$mobile',`hno`='$hno',`adds`='$adds',`city`='$city',`state`='$state',`zip`='$zip',`full`='$full' WHERE `cid`='$id'";
    $confirm = mysqli_query($conn,$query) or die(mysqli_error());
    if($confirm)
    {
        //echo "<script>alert('Service Updated Successfully');</script>";
        echo '<script> window.location="cust_view.php"; </script>';

    }
    else{
        echo "<script>alert('unsuccessful');
        </script>";         
        echo '<script> window.location="cust_view.php"; </script>';
    }      

  
}
?>



<?php
// DELETE
if(isset($_GET['del'])){
    $bid = $_GET['del'];
    $sql1 = "DELETE FROM customer WHERE cid='$bid'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    //echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="branch.php";</script>';
}

?>
