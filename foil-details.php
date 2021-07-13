<?php include 'includes/header.php';
if(isset($_GET['del'])){
    $check = deletefoildetails($_GET['del']);
    if($check){
        echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
  }else{
    echo "<script> window.onload = function() {
      update_error();
  }; </script>";
}
}
if(isset($_POST['insert'])){
    $check = insert_foil_details($_POST);
    if($check){
        echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
  }else{
    echo "<script> window.onload = function() {
      update_error();
  }; </script>";
}
}

if(isset($_POST['update'])){
    $check = update_foil_details($_POST);
    if($check){
        echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
  }else{
    echo "<script> window.onload = function() {
      update_error();
  }; </script>";
}
}
?>

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>foil Details
                            <small><?=$info['shop_name']?> Software</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">foil Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Foil Print Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add Foil Print Details</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Foil Print Details</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <form class="needs-validation" method="post" action="">
                                            <div class="modal-body">

                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Foil Print Type :</label>
                                                        <input class="form-control" id="validationCustom01" name="color" type="text" required>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label for="validationCustom02" class="mb-1">Price :</label>
                                                        <input class="form-control" id="validationCustom02" name="price" type="text" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Save" class="btn btn-primary" type="button" name="insert">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!----update -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Update Foil Print Details</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <form class="needs-validation" method="post" action="">
                                            <div class="modal-body">

                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Foil Print Type :</label>
                                                        <input class="form-control" id="update_color" name="color1" type="text" required>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label for="validationCustom02" class="mb-1">Price :</label>
                                                        <input class="form-control" id="update_price" name="price1" type="text" required>
                                                        <input class="form-control" id="id" name="id" type="hidden" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Update" class="btn btn-primary" type="button" name="update">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---update-->
                        </div>

                        <div class="table-responsive">
                          <div class="card-body vendor-table">
                            <table class="display" id="edit">
                                <thead>
                                    <tr>
                                        <th>Foil Print Type</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>

<?php include 'includes/footer.php'; ?>
<script type="text/javascript">

    $(document).ready(function(){
        var table = $('#edit').DataTable({
            "destroy": true,
            lengthChange: false,
            responsive: false,
            buttons: ['csv', 'excel', 'pdf', 'print']
        });
        table.buttons().container().appendTo('#edit_wrapper .col-md-6:eq(0)');

        $.ajax({
            url: "action.php",
            method:"POST",
            data:{
                foildetails : 1,
            }, 
            success: function(result){
                $('#edit').DataTable().clear();
                $('#edit').DataTable().destroy();
                $("#data").html(result);
                var table = $('#edit').DataTable({
                    "destroy": true,
                    lengthChange: false,
                    responsive: false,
                    buttons: ['csv', 'excel', 'pdf', 'print']
                });
                table.buttons().container().appendTo('#edit_wrapper .col-md-6:eq(0)');
            }
        });
    });

    function getid(id,name,price){
        $("#id").val(id);
        $("#update_color").val(name);
        $("#update_price").val(price);
    }
</script>