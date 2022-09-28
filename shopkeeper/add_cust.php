<?php include("sidebar.php"); $update='true'; $fname=""; $mname="";
$email=""; $mobile=""; $hno=""; $lname=""; $adds=""; $land=""; $city=""; $state=""; $zip="";?>

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">Customer Registration</h2>
        </div>
        <hr style="margin: 0px;">
       
    </div>
</div>
                <?php
                    $id = 0; 
                    $sql = "SELECT max(cid) FROM customer";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $id=$row['max(cid)'];
                        $id++;
                    }
                ?>

                <?php
                    if(isset($_GET['edit']))
                    { 
                        $id=$_GET['edit'];
                        $qry="SELECT * FROM `customer` WHERE `cid`='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['cid'];
                            $fname=$row['fname'];
                            $mname =$row['mname'];
                            $lname =$row['lname'];
                            $email =$row['email'];
                            $mobile =$row['mobile'];
                            $hno =$row['hno'];
                            $adds =$row['adds'];
                            $land =$row['land'];
                            $city =$row['city'];
                            $state =$row['state'];
                            $zip =$row['zip'];
                            $update="false";

                            
                        }

                    }
                ?>
<main class="page-content">
    <div class="container">
        <form action="cust_submit.php" method="post" enctype="multipart/form-data">
            <center><h4>Customer Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Cust Id</label>
                    
                    <input type="text" readonly  class="form-control form-control-sm" name="id" id="id" value="<?php echo $id; ?>" placeholder="Cust Id">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">First Name</label>
                    <input type="text" class="form-control form-control-sm" required name="fname" id="fname" value="<?php echo $fname; ?>" placeholder="First Name"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Middle Name</label>
                    <input type="text" class="form-control form-control-sm" required name="mname" id="mname" value="<?php echo $mname; ?>" placeholder="Middle Name"/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Last Name</label>
                    <input type="text" class="form-control form-control-sm" required name="lname" id="lname" value="<?php echo $lname; ?>" placeholder="Last Name"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="text" class="form-control form-control-sm" required name="email" id="email" value="<?php echo $email; ?>" placeholder="Email"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Mobile</label>
                    <input type="text" class="form-control form-control-sm" required name="mobile" id="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile"/>
                </div>
            </div></br>
            <center><h4>Address Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">H.no</label>
                    <input type="text" class="form-control form-control-sm" name="hno" id="hno" value="<?php echo $hno; ?>" placeholder="House No">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" required class="form-control form-control-sm" name="adds" id="adds" value="<?php echo $adds; ?>" placeholder="Add adds">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Landmark</label>
                    <input type="text" class="form-control form-control-sm" required name="land" id="land" value="<?php echo $land; ?>" placeholder="Add Landmark"/>
                </div>
            </div>   
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">City</label>
                    <input type="text" class="form-control form-control-sm" required name="city" id="city" value="<?php echo $city; ?>" placeholder="Add City"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">State</label>
                    <input type="text" required class="form-control form-control-sm" name="state" id="state" value="<?php echo $state; ?>" placeholder="Add State">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Zipcode</label>
                    <input type="text" class="form-control form-control-sm" required name="zip" id="zip" value="<?php echo $zip; ?>" placeholder="Zipcode"/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-2">
                    <?php
                        if($update=='true')
                        {
                            ?>
                            <label class="form_label"></label>
                            <button type="submit" name="addcust" class="btn btn-sm btn-primary col-md-12">Submit</button>
                            <?php
                        }else
                        {
                            ?>
                                <label class="form_label"></label>
                                <button type="submit" name="postUpdate" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2">
                    <label class="form_label"></label>
                    <a href="view_cust.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                            <?php
                        }
                    ?>   
                </div>
            </div>
        </form>
    </div>
</main>
                    </br>
                    </br>
                    </br>
<?php include('../footer.php'); ?>