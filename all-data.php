<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));

if(isset($_POST['update_lc'])){
    $ids = $_POST['ids'];
    $received_lc = mysqli_real_escape_string($con,$_POST['bulk_received_lc']);
    foreach($ids as $val){
        $check = update_received_lc($val,$received_lc);
    }
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

if(isset($_GET['del'])){
    $check = deleteproduct($_GET['del']);
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


  $banner ="shop1/assets/images/".$date.$_FILES["image"]["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],"../public/shop1/assets/images/".$date.$_FILES["image"]["name"]);

  $check = insert_category_details($_POST,$banner);
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
    $banner = "";
    if($_FILES["image1"]["name"]!=""){
        $banner ="shop1/assets/images/".$date.$_FILES["image1"]["name"];
        move_uploaded_file($_FILES["image1"]["tmp_name"],"../public/shop1/assets/images/".$date.$_FILES["image1"]["name"]);
    }
    $check = update_category_details($_POST,$banner);
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
                        <h3>All Data
                            <small><?=$info['shop_name']?> Admin Panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">All Data</li>
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
                        <h5>All Data</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="">
                            <div class="btn-popup pull-left">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Update Pi Number (Bulk)</button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Update Pi Number</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="bulk_received_lc" class="mb-1">Pi Number :</label>
                                                        <input class="form-control" id="bulk_received_lc" name="bulk_received_lc" type="text" required>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Save" class="btn btn-primary" type="button" name="update_lc">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="btn-popup pull-right">
                                <a href="new-data"><button type="button" class="btn btn-secondary">Add Data</button></a>

                            </div>

                            <div class="table-responsive">
                              <div class="card-body vendor-table">
                                <table class="display" id="edit">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>SL.</th>
                                            <th>Date</th>
                                            <th>Po Provider</th>
                                            <th>Po Number</th>
                                            <th>Challan_number</th>
                                            <th>Pi Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php 
                        $data = getdataamount();
                     ?>
                    <p>Total Amount : <?=$info['currency']." ".number_format($data['total']);?></p>
                    <p>Total Cost : <?=$info['currency']." ".number_format($data['costing']);?></p>
                    <p>Total Profit : <?=$info['currency']." ".number_format($data['profit']);?></p>
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
                getalldata : 1,
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

</script>

<script type="text/javascript">
    function convertToSlug(){
        var Text = $("#title").val();

        Text = Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
        $("#url").val(Text);
    }
</script>