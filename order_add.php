<?php include("sidebar.php");
include('connect.php');?>

<style>
.cc {
    margin-bottom: 10px;
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
    <script>
    $(document).ready(function() {
        $('.add_more').click(function(e) {
            e.preventDefault();
            $('#show').after(`<tr style="background-color: #ebf9f7;">
                    <th scope="row" style="display: none;">
                            <div class="group-form col-md-2" >
                                <label class="form_label" for="company_name">Product Id</label>
                                <input type="text" class="form-control form-control-sm" readonly
                                    value="<?php echo $idd; ?>" name="pid[]" id="pid" />
                            </div>
                    </th>
                    <td colspan="2">
                    <label class="form_label" for="company_name">Select Addon</label>
                    <select class="form-controls form-control-sm" required name="addn[]" id="addn" onchange="c_addn1()">
                        <option value="">Select Addon</option>
                        <?php
                            $query="SELECT DISTINCT `addon` FROM `addon` ORDER BY `id` ASC";
                            $confirm=mysqli_query($conn,$query);
                            while($loca=mysqli_fetch_array($confirm)){?>
                        <option><?php echo $loca['addon']; ?></option>
                        <?php } ?>
                    </select>
                    </td>
                    <td> <label class="form_label" for="company_name">Product Rate</label>
                    <input type="text" class="form-control form-control-sm" readonly name="price[]" id="price" /></td>
                    <td> 
                        <label class="form_label" for="company_name">Add Qty</label>
                    <input type="text" class="form-control form-control-sm" require name="qtyy[]" id="qtyy" />
                    </td>
                    <td>
                    <label class="form_label" for="company_name">Total</label>
                    <input type="text" class="form-control form-control-sm" readonly name="tot[]" id="tot" />
                    </td>
                    <td>
                    <br/>
                     <button class="btn btn-sm btn-danger form-control-sm remove">Remove</button>
                    </td>
                </tr>`);
        });
        $(document).on('click', '.remove', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
        //ajax insert
        $('#add_form').submit(function(e) {
            e.preventDefault();
            //$('#order-ajax1').val('Adding...');
            var data1 = $(this).serialize();
            alert(data1);
            $.ajax({
                type: "POST",
                url: 'addon_ajax.php',
                data: $(this).serialize(),
                success: function(data) {
                    console.log(data);
                }
            });
        });

    });
    </script>
    <script>
        
function c_addn1()
{
    //alert('hii');
    var addn = $('#addn').val();
        $.ajax({
            url: 'ajaxrequest/getAddonRate.php',
            type: "POST",
            dataType: 'json',
            data: {
                addn : addn,
            },
            success: function(data) {
                console.log(data);
                $('#price').val(data);
                
            }
         });
   

}
    </script>


    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <center>
                <h4>Order Summary</h4>
            </center>
            <hr />

            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Order Id</label>
                    <input type="text" readonly class="form-control form-control-sm" name="id" id="orderId"
                        value="<?php echo $id; ?>" placeholder=" Id">
                </div>

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Select Customer</label>
                    <select class="form-controls form-control-sm" required name="customer" id="customer" onchange="custo1()">
                        <option value="">Select Cutomer</option>
                        <?php
                            //$query="SELECT DISTINCT `cid`,`full` FROM `customer` ORDER BY `cid` ASC";
                            //$confirm=mysqli_query($conn,$query) or die(mysqli_error());
                            //while($loca=mysqli_fetch_array($confirm))
                            $query="SELECT DISTINCT `full` FROM `customer` ORDER BY `cid` ASC";
                            $confirm=mysqli_query($conn,$query) or die(mysqli_error());
                            while($loca=mysqli_fetch_array($confirm))
                            {?>
                        <!--<option value="<?php //echo $loca['cid']; ?>"><?php //echo $loca['full']; ?></option>-->
                            <option><?php echo $loca['full']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-form col-md-6">
                    <label class="form_label" for="company_name">Cust Name</label>
                    <input type="text" class="form-control form-control-sm" required name="cust" id="cust"
                        placeholder="Customer Name" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Mobile</label>
                    <input type="text" class="form-control form-control-sm" required name="mob" id="mob"
                        placeholder="Add mobile" />
                </div>

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Address</label>
                    <input type="text" required class="form-control form-control-sm" name="adds" id="adds"
                        placeholder="Add Address">
                </div>

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">H.no</label>
                    <input type="text" class="form-control form-control-sm" required name="hno" id="hno"
                        placeholder="Hno" />
                </div>
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Zipcode</label>
                    <input type="text" class="form-control form-control-sm" required name="zip" id="zip"
                        placeholder="zipcode" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">Email</label>
                    <input type="text" class="form-control form-control-sm" required name="email" id="email"
                        placeholder="Add Email" />
                </div>

                <div class="group-form col-md-6">
                    <label class="form_label" for="company_name">Delivery Address</label>
                    <input type="text" required class="form-control form-control-sm" name="adds1" id="adds1"
                        placeholder="Delivery Address">
                </div>

                <div class="group-form col-md-3">
                    <label class="form_label" for="company_name">GSTN</label>
                    <input type="text" class="form-control form-control-sm" required name="gstn" id="gstn" placeholder="GSTN" />
                </div>
            </div><br>
            <hr>
            <center>
                <h4>Pickup Date And Delivery Date</h4>
            </center>
            <hr>
            <div class="row mt-2">
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Pickup Date</label>
                    <input type="Date" class="form-control form-control-sm" required name="from" id="pickupDate" />
                    <script>
                    $(document).ready(function() {
                        var yourDateValue = new Date();
                        var formattedDate = yourDateValue.toISOString().substr(0, 10)
                        $('#pickupDate').val(formattedDate);
                    });
                    </script>
                </div>
                <!--<div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Date</label>
                    <input type="Date" class="form-control form-control-sm" required name="date1" id="date1" />
                </div>-->
                <div class="group-form col-md-4">
                    <label class="form_label" for="company_name">Delivery Type</label>
                    <select class="form-controls form-control-sm" required name="type" id="delivaryType">
                        <option value="">Select Type</option>
                        <option>By Counter</option>
                        <option>Delivery Boy</option>
                    </select>
                </div>
            </div>
        </form>
        <br>
        <hr>
        <center>
            <h4>Add Order</h4>
        </center>

        <table class="table table-bordered">
            <thead>
            </thead>
            <tbody id="show">
                <tr style="background-color: #ebf9f7;">
                    <th colspan="1">
                        <label class="form_label" for="company_name">KG/UNIT</label>
                        <select class="form-controls form-control-sm" required name="kg" id="orderUnit"
                            onchange="kgWiseRate()">
                            <option value="">Kg/unit</option>
                            <option value="unit">unit</option>
                            <option value="kg">Kg</option>
                        </select>
                    </th>
                    <th colspan="2">
                        <label class="form_label" for="company_name">Select Service</label>
                        <select class="form-controls form-control-sm" required name="service" id="service"
                            onchange="service1()">
                            <option value="">Select Services</option>
                            <?php
                       $query="SELECT DISTINCT `title` FROM `services` ORDER BY `sid` ASC";
                       $confirm=mysqli_query($conn,$query); 
                       while($loca=mysqli_fetch_array($confirm))
                    {?>
                            <option><?php echo $loca['title']; ?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th colspan="3"><br/><h5 style="display: none;" id="kgrateshow">Service Rate : <spam id="kgRateShow"></spam> per KG </h5></th>
                    
                </tr>


                <tr style="background-color: #ebf9f7;">
                    <th colspan="2">
                        <label class="form_label" for="company_name">Select Products</label>
                        <select class="form-controls form-control-sm" required name="product" id="product"
                            onchange="product1()">
                            <option value="">Select Products</option>
                        </select>
                    </th>
                    <th>
                        <div>
                            <label class="form_label" for="company_name">Product Ouantity</label>
                            <input type="text" class="form-control form-control-sm" name="productQuantity"
                                id="productQuantity" />
                        </div>
                    </th>
                    <th>
                    <productRate>
                            <label class="form_label" for="company_name">Product Rate</label>
                            <input type="text" class="form-control form-control-sm" readonly name="price1"
                                id="productRate" />
                        </productRate>
                        <productWeight style="display: none;">
                            <label class="form_label" for="company_name">Total Weight In Gram</label>
                            <input type="text" class="form-control form-control-sm" name="price1"
                                id="productWeight" onkeyup="calKgRate()" />
                        </productWeight>
                    </th>
                    <th colspan="2">
                        <label class="form_label" for="company_name">Amount</label>
                        <input type="text" class="form-control form-control-sm" readonly name="tot" id="productAmount" />
                    </th>
                </tr>

                <tr>
                    <th>
                        <button class="btn btn-sm btn-primary add_more">Add Addons</button>
                    </th>
                    <th colspan="5">
                        <h5>Add Addon</h5>
                    </th>
                </tr>

                <tr style="background-color: #ebf9f7;">
                    <td colspan="2">
                        <label class="form_label" for="company_name">Select Addon</label>
                        <select class="form-controls form-control-sm" required name="addn[]" id="addn"
                            onchange="c_addn1()">
                            <option value="">Select Addon</option>
                            <?php
                            $query="SELECT DISTINCT `addon` FROM `addon` ORDER BY `id` ASC";
                            $confirm=mysqli_query($conn,$query);
                            while($loca=mysqli_fetch_array($confirm)){?>
                            <option><?php echo $loca['addon']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td> <label class="form_label" for="company_name">Addon Rate</label>
                        <input type="text" class="form-control form-control-sm" readonly name="price[]" id="price" />
                    </td>
                    <td>
                        <label class="form_label" for="company_name">Add Qty</label>
                        <input type="text" class="form-control form-control-sm" require name="qtyy[]" id="qtyy" />
                    </td>
                    <td>
                        <label class="form_label" for="company_name">Total</label>
                        <input type="text" class="form-control form-control-sm" readonly name="tot[]" id="tot" />
                    </td>
                    <td>
                        <br />
                        <button class="btn btn-sm btn-danger form-control-sm remove">Remove</button>
                    </td>
                </tr>

            </tbody>
            <tfoot>
                <tr style="background-color: #ebf9f7;">
                    <th colspan="2">
                        <label class="form_label" for="company_name">Remark</label>
                        <input type="text" class="form-control form-control-sm"  name="remark" id="remark" />
                    </th>
                    <th style="width: 20%;">
                        <label class="form_label" for="company_name"></label>
                        <button type="button" class="btn btn-sm btn-info col-md-12 order-ajax">Add Item</button>
                    </th>
                    <th style="width: 20%;"><label class="form_label" for="company_name"></label>
                    <button type="reset" name=""
                            class="btn btn-sm btn-danger col-md-12">clear</button></th>
                    <th colspan="5"></th>
                </tr>
            </tfoot>
        </table>

        <div class="table-responsive" style="width:100%">
            <div class="show-message">
            </div>

            <center>
                <h4>View Order</h4>
            </center>
            <table id="example" class="cell-border mb-5" style="width:100%">
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th colspan="2">Perticuler </th>
                        <th>Rate</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody class="order-data">
                    <item>
                        <tr>
                            <th rowspan="4">1.</th>
                            <th>Service</th>
                            <th colspan="5">Wash & Iron (KG Wise)</th>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td colspan="2">Shirt</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th rowspan="2">Addons</th>
                            <td colspan="2">Softner</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td colspan="2">Softner</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                    </item>
                    <item>
                        <tr>
                            <th rowspan="4">2.</th>
                            <th>Service</th>
                            <th colspan="5">Wash & Iron (Unit Wise)</th>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td colspan="2">Pant</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <th rowspan="2">Addons</th>
                            <td colspan="2">Softner</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td colspan="2">Softner</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                    </item>
                    <item>
                        <tr>
                            <th rowspan="2">3.</th>
                            <th>Service</th>
                            <th colspan="5">Wash & Iron (Unit Wise)</th>
                        </tr>
                        <tr>
                            <th>Product</th>
                            <td colspan="2">Coat</td>
                            <td>10</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                    </item>

                    <totalBill>
                        <tr>
                            <th colspan="5" rowspan="5"></th>
                            <th>Basic Amount</th>
                            <th>700</th>
                        </tr>
                        <tr>
                            <th>
                                <h6>Discount
                                    <input type="number" style="width: 45px;">
                                    %
                                </h6>
                            </th>
                            <th>-63</th>
                        </tr>
                        <tr>
                            <th>CGST 9%</th>
                            <th>51.6</th>
                        </tr>
                        <tr>
                            <th>SGST 9%</th>
                            <th>51.6</th>
                        </tr>
                    </totalBill>

                </tbody>
                <thead>

                    <tr>
                        <th colspan="5"></th>
                        <th>Total</th>
                        <th>700</th>
                    </tr>
                </thead>

                <tbody class="mt-5">
                    <tr style="background-color: #FDF3F3;">
                        <th colspan="7">
                            <div class="m-3 col-3">
                                <label class="form_label" for="company_name">Payment Type</label>
                                <select class="form-controls form-control-sm" required name="ptype" id="ptype">
                                    <option value="">Select Type</option>
                                    <option>Now</option>
                                    <option>On Delivery</option>
                                </select>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div class="col-md-12">
                                <button type="submit" onclick="addOrder()"
                                    class="btn btn-sm btn-success col-md-12">Submit</button>
                            </div>
                        </th>
                        <th colspan="2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-danger col-md-12">Cancel</button>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
</main>

<script>
$(document).ready(function() {
    getdata();
    $('.order-ajax').click(function(e) {
        e.preventDefault();
        var kg = $('#kg').val();
        var ser = $('#service').val();
        var pro = $('#product').val();
        var price = $('#price1').val();
        var qty = $('#qty').val();
        var tot = $('#tot1').val();
        var qot = $('#qot').val();
        //console.log(qot);

        if (kg != '' & ser != '' & pro != '' & qty != '') {
            $.ajax({
                type: "POST",
                url: "or_ad.php",
                data: {
                    'checking_add': true,
                    'kg': kg,
                    'ser': ser,
                    'pro': pro,
                    'price': price,
                    'qty': qty,
                    'tot': tot,
                    'qot': qot,
                },
                success: function(response) {
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
        } else {
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

function getdata() {
    $.ajax({
        type: "GET",
        url: "order_fetch.php",
        success: function(response) {
            //console.log(response)
            $.each(response, function(key, value) {
                console.log(value['product']);
                $('.order-data').append('<tr>' +
                    '<td>' + value['id'] + '</td>\
                                    <td>' + value['kg'] + '</td>\
                                    <td>' + value['service'] + '</td>\
                                    <td>' + value['product'] + '</td>\
                                    <td>' + value['rate'] + '</td>\
                                    <td>' + value['qty'] + '</td>\
                                    <td>' + value['tot'] + '</td>\
                                    <td>' + value['tot'] + '</td>\
                                        </tr>');

            });

        }
    });
}
</script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        "ordering": false
    });

});
</script>
<script>

function custo1(){
    alert('hiiiiii');
    //var wingname = document.getElementById('customer').value;
    var wingname=$('#customer').val();
    //alert(wingname);
        $.ajax({
            url: 'ser_ajax.php',
            type: "POST",
            dataType: 'json',
            data: {
                wingname : wingname,
            },
            success: function(data) {
            //alert('hii');
            console.log(data);
            //alert("hii")
            $("#cust").val(data[0]);
            $("#mob").val(data[1]);
            $("#adds").val(data[2]);
            $("#hno").val(data[3]);
            $("#zip").val(data[4]);
            $("#email").val(data[5]);
            $("#adds1").val(data[6]);
            $("#gstn").val(data[7]);
            window.g_x2 = data[2];
            
        }

    });

}
</script>

<script>
function service1()
{
    //alert('hii');
    var service = $('#service').val();
    var orderUnit = $('#orderUnit').val();
    if (orderUnit == "kg") {
        $.ajax({
            url: 'ajaxrequest/getKgServiceRate.php',
            type: "POST",
            dataType: 'json',
            data: {
                service : service,
            },
            success: function(data) {
                console.log(data);
                $('#kgrateshow').show();
                $('#kgRateShow').html(data);
            }
         });
    }
        //alert('hello');
        let log = $.ajax({
        url: 'ajaxrequest/getProduct.php',
        type: "POST",
        dataType: 'json',
        data: {
            service : service,
        },
        success: function(data){
            console.log(data);
            $("#product option").remove();
            var opt = document.createElement("option");
            opt.text = "Select..";
            opt.value = "";
            var x = document.getElementById("product");
            x.add(opt);
            for (var i = 0; i < data.length; i++) {
                var option = document.createElement("option");
                option.text = data[i].productName;
                option.value = data[i].pid;
                x.add(option);
            }
        }
    });
    console.log(log);
    
    
}


function product1() {
    var product = $('#product').val();
    var orderUnit = $('#orderUnit').val();
    var ser = $("#service").val();
    if(orderUnit == "unit")
    {
       let log =  $.ajax({
        url: 'ajaxrequest/getProductRate.php',
        type: "POST",
        dataType: 'json',
        data: {
            product : product,
            ser: ser
        },
        success: function(data) {
            $("#productRate").val(data);
        }
    });
    console.log(log);
    } 
}
</script>
<script>
$(document).ready(function() {
    $("#productQuantity").blur(function() {
        //alert("hii");            
        var price = parseFloat($("#productRate").val());
        var qty = parseFloat($("#productQuantity").val());
        //alert(mrp)
        //var mrp1 =  parseFloat($("#onemrp").val());
        //alert(mrp+"--"+qty);                    
        $("#productAmount").val((qty * price).toFixed(0));

    });
    $("#qtyy").blur(function() {
        //alert("hii");            
        var price = parseFloat($("#price").val());
        var qty = parseFloat($("#qtyy").val());
        //alert(mrp)
        //var mrp1 =  parseFloat($("#onemrp").val());
        //alert(mrp+"--"+qty);                    
        $("#tot").val((qty * price).toFixed(0));

    });
});
</script>




<script>
function kgWiseRate() {
    // alert('hiiiiii');
    var orderUnit = $('#orderUnit').val();
    if (orderUnit == "kg") {
        $('productWeight').show();
        $('productRate').hide();
    } else if (orderUnit == "unit") {
        $('productRate').show();
        $('productWeight').hide();
        $('#kgrateshow').hide();
    } else {
        $('#kgrateshow').hide();
        alert("select Unit To Bill");
    }
    console.log(orderUnit);

}
</script>
<script type="text/javascript">
function submitdata() {
    var qot = document.getElementById("qot");
    var kg = document.getElementById("kg");
    alert(qot);
    var course = document.getElementById("course_of_user");

    $.ajax({
        type: 'post',
        url: 'insertdata.php',
        data: {
            user_name: name,
            user_age: age,
            user_course: course
        },
        success: function(response) {
            $('#success__para').html("You data will be saved");
        }
    });

    return false;
}
</script>



<!-- add order codding -->

<script>
function clearInput() {
    $('#productAmount').val('');
    $('#productWeight').val('');
}

function calKgRate()
{
    let kgRate = $('#kgRateShow').html();
    let gramRate = kgRate / 1000;
    let productWeight =  $('#productWeight').val();
    let amount = gramRate * productWeight;
    $('#productAmount').val(amount);
}

function addOrder() {
    var orderId = $('#orderId').val();
    var customerId = $('#customer').val();
    var pickupDate = $('#pickupDate').val();
    var delivaryType = $('#delivaryType').val();

    //    order tabel information
    var orderUnit = $('#orderUnit').val();
    var service = $('#service').val();
    alert(delivaryType);
}


</script>