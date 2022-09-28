
<?php include("sidebar.php");
include("connect.php");
?>


<link href="assets/css/foms.css" rel="stylesheet">

<div class="page-content container-fluid">
    <div class="footer">
        <div class="d-flex justify-content-center">
             <h2 class="" style=" font-weight: 600">View Staff Details</h2>
        </div>
        <hr style="margin: 0px;">
    </div>
</div>



<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <div class="table-responsive" style="overflow-y:scroll; height: 380px; width:80% margin-left: 100px;">
            <table id="example" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Full Name</th>
                    <th>Mobile</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $qry="select * from staff";
                    $exc=mysqli_query($conn,$qry);
                    while($row=mysqli_fetch_array($exc)){
            
                    ?>
                    <tr class="text-center">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['full'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['des'] ?></td>
                        <td><?php echo $row['adds'] ?></td>
                    <!--  <td><button class="btn btn-sm btn-danger editbutton" type="button">Update</button></td>  -->
                    <td class="text-center">
                            <a href=".php?edit=<?php echo $row['id']?>"><button class="btn btn-sm btn-success">view</button> </a>
                            <a href="add_employee.php?edit=<?php echo $row['id']?>"><button class="btn btn-sm btn-primary">Edit</button> </a>
                            <a onclick="del(<?php echo $row['id']; ?>)"><button class="btn btn-sm btn-danger deletebutton" type="button">Delete</button></a></td> 
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>


</main>



<?php include("footer.php"); ?>


<script>
  function del(id){
    if(confirm("Are you sure?")==true){
      location = "add_emp.php?del="+id;
    }else {

    }
  }
</script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
