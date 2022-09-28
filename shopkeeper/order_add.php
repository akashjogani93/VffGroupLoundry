<?php include("sidebar.php");
include('connect.php');
 ?>

<style>
    .cc{
        margin-bottom:10px;
    }
</style>
<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">Counter Order</h2>
        </div>
        <hr style="margin: 0px;">
       
    </div>
</div>
                <?php
                    $id = 0;
                    $sql = "SELECT max(id) FROM cust_detail";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $id=$row['max(id)'];
                        $id++;
                    }
                ?>
                <?php
                    $idd = 0;
                    $sql = "SELECT max(id) FROM orderdel";
                    $retval = mysqli_query($conn, $sql );

                    if(! $retval ) {
                        die('Could not get data: ' . mysqli_error($conn));
                    }
                    while($row = mysqli_fetch_assoc($retval)) {
                        $idd=$row['max(id)'];
                        $idd++;
                    }
                ?> 

<main class="page-content">
    <!-- Modal -->
    <div class="modal fade" id="ordermodal" data-target="#CompanyProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" methode="POST" id="add_form">
                        <div id="show">
                            <div class="row mt-2">
                                <div class="group-form col-md-12">
                                    <div class="error-message">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="group-form col-md-2">
                                    <label class="form_label" for="company_name">Product Id</label>
                                    <input type="text" class="form-control form-control-sm" readonly value="<?php echo $idd; ?>" name="pid[]" id="pid"/>
                                </div>
                                <div class="group-form col-md-4">
                                    <label class="form_label" for="company_name">Select Addon</label>
                                    <select class="form-controls form-control-sm" required name="addn[]" id="addn" onchange="c_addn1()">
                                        <option value="">Select Addon</option> 
                                            <?php
                                                $query="SELECT DISTINCT `addon` FROM `addon` ORDER BY `id` ASC";
                                                $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                                while($loca=mysqli_fetch_array($confirm))
                                            {?>
                                                <option><?php echo $loca['addon']; ?></option>
                                            <?php   
                                            }   
                                            ?>   
                                    </select>
                                </div>
                                <div class="group-form col-md-2">
                                    <label class="form_label" for="company_name">Product Rate</label>
                                    <input type="text" class="form-control form-control-sm" readonly name="price[]" id="price"/>
                                </div>
                                <div class="group-form col-md-2">
                                    <label class="form_label" for="company_name">Add Qty</label>
                                    <input type="text" class="form-control form-control-sm" require name="qtyy[]" id="qtyy"/>
                                </div>
                                <div class="group-form col-md-2">
                                    <label class="form_label" for="company_name">Total</label>
                                    <input type="text" class="form-control form-control-sm" readonly name="tot[]" id="tot"/>
                                </div>
                                <div class="group-form col-md-2">
                                    <label class="form_label" for="company_name"></label>
                                    <button class="btn btn-secondary add_more">Add More</button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary order-ajax1" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function()
        {
            $('.add_more').click(function(e)
            {
                e.preventDefault();
                $('#show').prepend(`<div class="row">
                            <div class="group-form col-md-2">
                                <label class="form_label" for="company_name">Product Id</label>
                                <input type="text" class="form-control form-control-sm" readonly value="<?php echo $idd; ?>" name="pid[]" id="pid"/>
                            </div>
                            <div class="group-form col-md-4">
                                <label class="form_label" for="company_name">Select Addon</label>
                                <select class="form-controls form-control-sm" required name="addn[]" id="addn" onchange="c_addn1()">
                                    <option value="">Select Addon</option> 
                                        <?php
                                            $query="SELECT DISTINCT `addon` FROM `addon` ORDER BY `id` ASC";
                                            $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                            while($loca=mysqli_fetch_array($confirm))
                                        {?>
                                            <option><?php echo $loca['addon']; ?></option>
                                        <?php   
                                        }   
                                        ?>   
                                </select>
                            </div>
                            <div class="group-form col-md-2">
                                <label class="form_label" for="company_name">Product Rate</label>
                                <input type="text" class="form-control form-control-sm" readonly name="price[]" id="price"/>
                            </div>
                            <div class="group-form col-md-2">
                                <label class="form_label" for="company_name">Add Qty</label>
                                <input type="text" class="form-control form-control-sm" require name="qtyy[]" id="qtyy"/>
                            </div>
                            <div class="group-form col-md-2">
                                <label class="form_label" for="company_name">Total</label>
                                <input type="text" class="form-control form-control-sm" readonly name="tot[]" id="tot"/>
                            </div>
                            <div class="group-form col-md-2">
                                <label class="form_label" for="company_name"></label>
                                <button class="btn btn-danger remove">Remove</button>
                            </div>
                        </div>`);
            });
            $(document).on('click', '.remove', function(e)
            {
                e.preventDefault();
                let row_item=$(this).parent().parent();
                $(row_item).remove();
            });
            //ajax insert
            $('#add_form').submit(function(e)
            {
                e.preventDefault();
                //$('#order-ajax1').val('Adding...');
                var data1=$(this).serialize();
                alert(data1);
                $.ajax({
                    type:"POST",
                    url: 'addon_ajax.php',
                    data:$(this).serialize(),
                    success: function(data)
                    {
                        console.log(data);
                    }
                });
            });
            
        });
    </script>
    <script>
        function c_addn1()
        {
            alert("hii");
            var wingname = document.getElementById('addn').value;
            alert(wingname);
        }
    </script>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <center><h4>Order Summary</h4></center><hr></br>

            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Order Id</label>                   
                    <input type="text" readonly  class="form-control form-control-sm" name="id" id="id" value="<?php echo $id; ?>" placeholder=" Id">
                </div>

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Select Customer</label>
                    <select class="form-controls form-control-sm" required name="customer" id="customer" onchange="custo1()">
                        <option value="">Select Cutomer</option> 
                            <?php
                                $query="SELECT DISTINCT `full` FROM `customer` ORDER BY `cid` ASC";
                                $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                while($loca=mysqli_fetch_array($confirm))
                            {?>
                                <option><?php echo $loca['full']; ?></option>
                            <?php   
                            }   
                            ?>   
                    </select>
                </div>
                <div class="group-form col-md-6">
                    <label class="form_label" for="company_name">Cust Name</label>
                    <input type="text" class="form-control form-control-sm" required name="cust" id="cust" placeholder="Customer Name"/>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Mobile</label>
                    <input type="text" class="form-control form-control-sm" required name="mob" id="mob" placeholder="Add mobile"/>
                </div>
                
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" required class="form-control form-control-sm" name="adds" id="adds" placeholder="Add Address">
                </div>

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">H.no</label>
                    <input type="text" class="form-control form-control-sm" required name="hno" id="hno" placeholder="Hno"/>
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Zipcode</label>
                    <input type="text" class="form-control form-control-sm" required name="zip" id="zip" placeholder="zipcode"/>
                </div>
            </div><br>
            <center><h4>Pickup Date And Delivery Date</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Pickup Date</label>
                    <input type="Date" class="form-control form-control-sm" required name="from" id="from"/>
                    <script>
                        $(document).ready( function() {
                          var yourDateValue = new Date();
                          var formattedDate = yourDateValue.toISOString().substr(0, 10)
                        $('#from').val(formattedDate);
                        });
                    </script>
                </div>
                <!--<div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Date</label>
                    <input type="Date" class="form-control form-control-sm" required name="date1" id="date1"/>
                </div>-->
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Type</label>
                    <select class="form-controls form-control-sm" required name="type" id="type">
                        <option value="">Select Type</option>
                        <option>By Counter</option>
                        <option>Delivery Boy</option>
                    </select>
                </div>
            </div>
        </form><hr></br>
            <center><h4>Add Order</h4></center><hr></br>
            <div class="row mt-2">
                <div class="group-form col-md-12">
                    <div class="error-message">

                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">KG/UNIT</label>
                    <input type="hidden" readonly  class="form-control form-control-sm" name="qot" id="qot" value="<?php echo $id; ?>" placeholder=" Id">
                    <select class="form-controls form-control-sm" required name="kg" id="kg" onchange="kg1()">
                        <option value="">Kg/unit</option>   
                        <option>unit</option>   
                        <option>Kg</option>   
                    </select>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Select Service</label>
                    <select class="form-controls form-control-sm" required name="service" id="service" onchange="service1()">
                        <option value="">Select Services</option> 
                                <?php
                                    $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                {?>
                                    <option><?php echo $loca['title']; ?></option>
                                <?php   
                                }   
                                ?>   
                    </select>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Select Products</label>
                    <select class="form-controls form-control-sm" required name="product" id="product" onchange="product1()">
                        <option value="">Select Products</option>   
                    </select>
                </div>
            </div></br>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Product Rate</label>
                    <input type="text" class="form-control form-control-sm" readonly name="price1" id="price1"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Add Qty</label>
                    <input type="text" class="form-control form-control-sm" require name="qty" id="qty"/>
                </div>
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Amount</label>
                    <input type="text" class="form-control form-control-sm" readonly name="tot" id="tot1"/>
                </div>
            </div></br>
            <!--<div class="row mt-2">
                <div class="group-form col-md-2">
                    <label class="form_label" for="company_name">Softner</label>
                    <input type="checkbox" class="cc form-control form-control-sm" name="softner[]" id="softner" value="Softner"/>
                    <input type="text" class="form-control form-control-sm"  name="soft" id="soft" placeholder="Softner Quntity"/>
                                <?php
                                    $query="SELECT `rate` FROM `addon` WHERE `addon`='Softner'";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                    {
                                        $soft=$loca['rate'];
                                    }
                                ?>
                    <input type="text" class="form-control form-control-sm"  name="soft" id="soft" value="<?php echo $soft; ?>" placeholder="Softner Quntity"/>

                </div>
                <div class="group-form col-md-2">
                    <label class="form_label" for="company_name">Stain Removal</label> 

                    <input type="checkbox" class="cc form-control form-control-sm" name="softner[]" id="softner" value="Stain Removal"/>
                    <input type="text" class="form-control form-control-sm"  name="stain" id="stain" placeholder="Stain Removal Quntity"/>
                            <?php
                                    $query="SELECT `rate` FROM `addon` WHERE `addon`='Stain Removal'";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                    {
                                        $stain=$loca['rate'];
                                    }
                                ?>
                    <input type="text" class="form-control form-control-sm"  name="soft" id="soft" value="<?php echo $stain; ?>" placeholder="Softner Quntity"/>
                </div>
                <div class="group-form col-md-2">
                    <label class="form_label" for="company_name">Starch</label> 

                    <input type="checkbox" class="cc form-control form-control-sm" name="softner[]" id="softner[]" value="Starch"/>
                    <input type="text" class="form-control form-control-sm"  name="stai" id="stai" placeholder="Starch Quntity"/>
                                <?php
                                    $query="SELECT `rate` FROM `addon` WHERE `addon`='Starch'";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                    {
                                        $Starch=$loca['rate'];
                                    }
                                ?>
                    <input type="text" class="form-control form-control-sm"  name="soft" id="soft" value="<?php echo $Starch; ?>" placeholder="Softner Quntity"/>
                </div>
                <div class="group-form col-md-2">
                    <label class="form_label" for="company_name">Antiseptic</label> 

                    <input type="checkbox" class="cc form-control form-control-sm" name="softner[]" id="Antiseptic" value="Antiseptic"/>
                    <input type="text" class="form-control form-control-sm"  name="anti" id="anti" placeholder="Antiseptic Quntity"/>
                    <?php
                                    $query="SELECT `rate` FROM `addon` WHERE `addon`='Antiseptic'";
                                    $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                                    while($loca=mysqli_fetch_array($confirm))
                                    {
                                        $anti=$loca['rate'];
                                    }
                                ?>
                    <input type="text" class="form-control form-control-sm"  name="soft" id="soft" value="<?php echo $anti; ?>" placeholder="Softner Quntity"/>
                </div>
            </div></br>-->
            <div class="row mt-2">
                <div class="group-form col-md-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ordermodal">
                        Add Addon
                    </button>
                </div>               
                <div class="group-form col-md-2">
                    <button type="button" class="btn btn-sm btn-danger col-md-12 order-ajax">Add Item</button>
                </div>
                <div class="group-form col-md-2">
                    <button type="reset" name="" class="btn btn-sm btn-primary col-md-12">clear</button>
                </div>
            </div>
            
            </br></br>
        <div class="table-responsive" style="overflow-y:scroll; height: 380px; width:80% margin-left: 100px;">
            <div class="show-message">
 
            </div>
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>kg/Unit</th>
                    <th>Services</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quntity</th>
                    <th>Total</th>
                    <th>Action</th>   
                </tr>
            </thead>
            <tbody class="order-data">
            </tbody>
            </table>
        </div>
</main>

<script>
    $(document).ready(function() {
        getdata();
        $('.order-ajax').click(function(e){
            e.preventDefault();
            var kg=$('#kg').val();
            var ser=$('#service').val();
            var pro=$('#product').val();
            var price=$('#price1').val();
            var qty=$('#qty').val();
            var tot=$('#tot1').val();
            var qot=$('#qot').val();
            //console.log(qot);
            
            if(kg !='' & ser !='' & pro !='' & qty !='' )
            {
                $.ajax({
                    type:"POST",
                    url:"or_ad.php",
                    data:{
                        'checking_add':true,
                        'kg':kg,
                        'ser':ser,
                        'pro':pro,
                        'price':price,
                        'qty':qty,
                        'tot':tot,
                        'qot':qot,
                    },
                    success: function(response)
                    {
                        console.log(response);
                        $('.show-message').append('\
                            <div class="alert alert-info alert-dismissible fade show" role="alert">\
                            <strong>Hey! </strong> Record Added\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
                            </div>\ ');

                            $('.order-data').html("");
                            getdata();
                            $('#kg').val("");
                            $('#service').val("");
                            $('#product').val("");
                            $('#price1').val("");
                            $('#qty').val("");
                            $('#tot1').val("");





                    }
                });
            }else
            {
                //console.log("Enter All Feild!..")error-message
                $('.error-message').append('\
                            <div class="alert alert-info alert-dismissible fade show" role="alert">\
                            <strong>Hey! </strong> Enter All Feild!..\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                <span aria-hidden="true">&times;</span>\
                            </button>\
                            </div>\ ');  

            }
            
        });
    });
    function getdata()
    {
        $.ajax({
            type:"GET",
            url: "order_fetch.php",
            success: function(response) {
                //console.log(response)
                $.each(response, function(key, value){
                    console.log(value['product']);
                    $('.order-data').append('<tr>'+
                                    '<td>'+value['id']+'</td>\
                                    <td>'+value['kg']+'</td>\
                                    <td>'+value['service']+'</td>\
                                    <td>'+value['product']+'</td>\
                                    <td>'+value['rate']+'</td>\
                                    <td>'+value['qty']+'</td>\
                                    <td>'+value['tot']+'</td>\
                                    <td>'+value['tot']+'</td>\
                                        </tr>');

                });

            }
        });
    }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable({
        "ordering": false
    });
    
});
</script>
<script>
    function service1()
    {
        //alert("hii");
        var wingname = document.getElementById('service').value;
        //alert(wingname);
        $.ajax({
            url: 'service_to.php',
            type: "POST",
            dataType:'json',
            data:  {
                wingname: wingname,

            }
            , success:function(data) {
                //$("#pdnam").val(data[0]);
                $("#product option").remove();

                var opt = document.createElement("option");
                opt.text = "Select..";
                opt.value = "";



                var x = document.getElementById("product");
                x.add(opt);
                for(var i=0;i<data.length;i++){
                    var option = document.createElement("option");
                    option.text = data[i];
                    option.value = data[i];

                    x.add(option);
                }
            }

        });

    }
    function product1()
    {
        //alert("hii");
        var product = document.getElementById('product').value;
        var ser = $("#service").val();
        //alert(product);
        $.ajax({
            url: 'service_to1.php',
            type: "POST",
            dataType:'json',
            data:  {
                product: product,
                ser: ser

            }
            , success:function(data) 
            {
                $("#price1").val(data);
            }
        });
        

    }
</script>
<script>
$(document).ready(function()
{
    $("#qty").blur(function () 
    {    
        //alert("hii");            
        var price = parseFloat($("#price1").val());
        var qty = parseFloat($("#qty").val());
        //alert(mrp)
        //var mrp1 =  parseFloat($("#onemrp").val());
        //alert(mrp+"--"+qty);                    
        $("#tot1").val((qty*price).toFixed(0));
        
    });
});
</script>

<script>
            function custo1(){
                //alert('hiiiiii');
                var wingname = document.getElementById('customer').value;
                 //alert(wingname);
                $.ajax({
                    url: 'ser_ajax.php',
                    type: "POST",
                    dataType:'json',
                    data:  {
                       
                        wingname: wingname
                       

                    }
                    , success:function(data) {
                        //alert("hii")
                        $("#cust").val(data[0]);
                        $("#mob").val(data[1]);
                        $("#adds").val(data[2]);
                        $("#hno").val(data[2]);
                        $("#zip").val(data[2]);
                        
                        //                        window.g_x1 = data[1];
                        //                        window.g_x2 = data[2];
                    }

                });

            }
</script>

    
<script>
    function kg1()
    {
        //alert('hiiiiii');
        var wingname = document.getElementById('kg').value;
        //alert(wingname);
        $.ajax({
            url: 'vendar_path-ajax.php',
            type: "POST",
            dataType:'json',
            data:  {
                company: cmpy,
                wingname: wingname,
                size: size,
                flavar: flav

            }
            , success:function(data) {
                alert(data[1])
                $("#hscode2").val(data[0]);
                $("#path2").val(data[1]);
                //                        window.g_x1 = data[1];
                //                        window.g_x2 = data[2];
            }

        });
        
    }
</script>
<script type="text/javascript">

function submitdata()
{
 var qot=document.getElementById( "qot" );
 var kg=document.getElementById( "kg" );
 alert(qot);
 var course=document.getElementById( "course_of_user" );

 $.ajax({
  type: 'post',
  url: 'insertdata.php',
  data: {
   user_name:name,
   user_age:age,
   user_course:course
  },
  success: function (response) {
   $('#success__para').html("You data will be saved");
  }
 });
	
 return false;
}

</script>