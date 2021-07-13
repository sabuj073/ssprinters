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
                        <h3>Delivery Chalan
                            <small><?=$info['shop_name']?> Admin Panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Delivery Chalan</li>
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
                        <h5>Delivery Chalan</h5>
                    </div>
                    <div class="card-body">                    
                        <div class="table-responsive">
                          <div class="card-body vendor-table">
                            <table class="display" id="edit">
                                <thead>
                                        <th>SL.</th>
                                        <th>PI Numbers</th>
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
                getalldata_master : 1,
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