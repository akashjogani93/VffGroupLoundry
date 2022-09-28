<?php include("sidebar.php");
 ?>

<style type="text/css">
    .table-bordered tr th {
        background-color: #aee7e8;
        color: #000000;
    }


</style>

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-between">
             <h2 class="" style=" font-weight: 600">Counter Customer List</h2>
        </div>
        <hr style="margin: 0px;">
       
    </div>
</div>

<!-- Viewing Registered Users -->
<main class="page-content">
    
<div class="container">
    <div class="table-responsive" style="overflow-y:scroll; height: 580px; width:80% margin-left: 100px;">
    <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>

                    <th>Select</th>
                    <th>order ID</th>
                    <th> Name</th>
                    <th>Phone No</th>
                    <th>Status</th>                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center"> 
                    <td><input type="checkbox" class="form-control form-control-sm"></td>
                    <td>1</td>
                    <td>sagar</td>
                    <td>9899876765</td>
                    <td>underprocess</td>
                   <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                   <td class="text-center"><a href="#"><button class="btn btn-sm btn-success">view</button> </a> 
                   <a href="order_view.php"><button class="btn btn-sm btn-danger">change</button> </a> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</main>
<?php include("footer.php"); ?>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>