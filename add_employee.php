<?php include("sidebar.php");
include('connect.php');
$update="true";
$fname="";
$mname ="";
$lname ="";
$gen ="";
$mob ="";
$email ="";
$adds ="";
$city ="";
$state ="";
$pin ="";
$des ="";
 ?>

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
             <h2 class="" style=" font-weight: 600">Employee Registration</h2>
        </div>
        <hr style="margin: 0px;">
       
    </div>
</div>


        <?php
            $query ="SELECT * FROM `staff` order by id desc";
            $confirm = mysqli_query($conn,$query) or die(mysqli_error());
            $out=mysqli_fetch_array($confirm);
            $id=$out['id'] + 1;
            
            $username="vff".$id; $password="vff".rand(10000,100000);
        ?>
        <?php
                    if(isset($_GET['edit']))
                    { 
                        $id=$_GET['edit'];
                        $qry="SELECT * FROM staff WHERE id='$id'";
                        $exc=mysqli_query($conn,$qry);
                        while($row=mysqli_fetch_array($exc))
                        {
                            $id=$row['id'];
                            $fname=$row['fname'];
                            $mname =$row['mname'];
                            $lname =$row['lname'];
                            $gen =$row['gen'];
                            $mob =$row['mobile'];
                            $email =$row['email'];
                            $adds =$row['adds'];
                            $city =$row['city'];
                            $state =$row['state'];
                            $pin =$row['pin'];
                            $des =$row['des'];
                            $branch =$row['branch'];
                            $update="false";

                            
                        }

                    }
        ?>

<main class="page-content">
    <div class="container">
        <form action="add_emp.php" method="post" enctype="multipart/form-data">
            <center><h4>Personal Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Employee Id</label>
                    
                    <input type="text" readonly value="<?php echo $id; ?>" class="form-control form-control-sm" name="id" id="id" placeholder="Employee Id">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">First Name</label>
                    <input type="text" class="form-control form-control-sm" required name="fname" id="fname" value="<?php echo $fname; ?>" placeholder="First Name"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Middle Name</label>
                    <input type="text" class="form-control form-control-sm" required name="mname" id="mname" value="<?php echo $mname; ?>" placeholder="Middle Name"/>
                </div></br>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Last Name</label>
                    <input type="text" class="form-control form-control-sm" required name="lname" id="lname" value="<?php echo $lname; ?>" placeholder="Last Name"/>
                </div>
                <?php
                if($update=='true') 
                { ?>
                    <div class="group-form col-md-4">

                    
                        <label class="form_label" for="company_name">Gender</label>
                    
                        <select class="form-control form-control-sm" required name="gen" id="gen">
                            <option>Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        <select>
                    </div>
                <?php
                }
                else{
                    ?>
                    <div class="group-form col-md-4">

                    
                        <label class="form_label" for="company_name">Gender</label>
                    
                        <select class="form-control form-control-sm" required name="gen" id="gen">
                            <option><?php echo $gen; ?></option>
                            <option>Male</option>
                            <option>Female</option>
                        <select>
                    </div>
                    <?php
                }
                ?>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Upload Profile</label>
                    <input type="file" class="form-control form-control-sm" name="upl" id="upl" accept="image/x-png,image/jpg,image/jpeg" />
                </div></br>
            </div></br>
            <center><h4>Contact Information</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" class="form-control form-control-sm" name="adds" value="<?php echo $adds; ?>" id="adds" placeholder="Add Address">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">City</label>
                    <input type="text" required class="form-control form-control-sm" name="city" id="city" value="<?php echo $city; ?>" placeholder="Add City">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">State</label>
                    <input type="text" class="form-control form-control-sm" required name="state" id="state" value="<?php echo $state; ?>" placeholder="Add State"/>
                </div>
            </div>   
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Zip Code</label>
                    <input type="text" class="form-control form-control-sm" required name="pin" value="<?php echo $pin; ?>" id="pin" placeholder="Pin Code"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Mobile Number</label>
                    <input type="text" required class="form-control form-control-sm" name="mobile" id="mobile" value="<?php echo $mob; ?>" placeholder="Add Mobile">
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="email" class="form-control form-control-sm" required name="email" id="email" value="<?php echo $email; ?>" placeholder="Add Email"/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Upload Document</label>
                    <input type="file" class="form-control form-control-sm" name="upl1" id="upl1" accept="image/x-png,image/jpg,image/jpeg" />
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Upload Document2</label>
                    <input type="file" class="form-control form-control-sm" name="upl2" id="upl2" accept="image/x-png,image/jpg,image/jpeg" />
                </div>
            </div></br>
            
            <center><h4>Login Information</h4></center><hr></br>
            <div class="row mt-2">
            <?php
                if($update=='true') 
                { ?>
                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Branch</label>
                        <select class="form-controls form-control-sm" required name="branch" id="branch">
                            <option value="">Select Branch</option> 
                            <?php
                                $query="SELECT `bname` FROM `branch` ORDER BY `bid` ASC";
                                $exc=mysqli_query($conn,$query);
                                while($res=mysqli_fetch_array($exc))
                                {
                                    ?>
                                        <option><?php echo $res['bname']; ?></option>
                                    <?php
                                } 
                            ?>
                            
                                
                        </select>
                    </div>
                    <?php
                }else
                {
                    ?>
                        <div class="group-form col-md-4">
                            <label class="form_label" for="company_name">Branch</label>
                            <select class="form-controls form-control-sm" required name="branch" id="branch">
                                <option><?php echo $branch; ?></option> 
                                <?php
                                    $query="SELECT `bname` FROM `branch` ORDER BY `bid` ASC";
                                    $exc=mysqli_query($conn,$query);
                                    while($res=mysqli_fetch_array($exc))
                                    {
                                        ?>
                                            <option><?php echo $res['bname']; ?></option>
                                        <?php
                                    } 
                                ?>
                                
                                    
                            </select>
                        </div>
                    <?php
                }
                
                if($update=='true') 
                { ?>           
                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Designation</label>        
                        <select class="form-controls form-control-sm" required name="des" id="des" onchange="user1()">
                            <option value="">Select Designation</option>
                            <option>Shop Keeper</option>
                            <option>Delevery Boy</option>
                            <option>Other Staff</option>
                        </select>
                    </div>
                <?php
                }else
                {
                    ?>

                    <div class="group-form col-md-4">
                        <label class="form_label" for="company_name">Designation</label>
                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $des; ?>" name="des" id="des" placeholder="des">
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
                if($update=='true') 
                { ?>
                    <div id="hides">
                        <div class="row mt-2">
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">Username</label>
                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $username; ?>" name="shopk" id="shopk" placeholder="username">
                            </div>
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">Password</label>
                                <input type="text" readonly class="form-control form-control-sm" name="pass" value="<?php echo $password; ?>" id="pass" placeholder="password">
                            </div>
                        </div>
                    </div>
                <?php
                }else
                {
                    echo "";
                }
            ?>
            <div class="row mt-2">
                <div class="group-form col-md-2">
                <?php
                    if($update=='true') 
                    { ?>
                        <label class="form_label" for="company_name"></label>
                        <button type="submit" name="submit" class="btn btn-sm btn-primary col-md-12">Submit</button>
                    <?php
                    }else
                    {?>
                        <label class="form_label" for="company_name"></label>
                        <button type="submit" name="update" class="btn btn-sm btn-danger col-md-12">Update</button>
                </div>
                <div class="group-form col-md-2" style="margin-top:20px;">
                        <a href="view_employee.php" type="button" class="btn btn-sm btn-primary col-md-12">Back</a> 
                    <?php
                    }
                ?>
                </div>
            </div>
            
        </form>
    </br>
    </br>
    </br>
</div>
</main>

<?php
if($update=='true') 
{ ?>
    <script>
        document.getElementById("hides").style.display= "none";
        function user1()
        {
            //alert("hii");
            var wingname = document.getElementById('des').value;
            if(wingname=='Other Staff')
            {
                document.getElementById("hides").style.display= "none";
                
            }
            else
            {
                document.getElementById("hides").style.display= "";
            }
            return;
        }
    </script>
<?php
}
?>