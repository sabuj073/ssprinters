<?php include 'includes/header.php';
if(isset($_GET['del'])){
    $check = deleteadmin($_GET['del']);
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
                        <h3>User List
                            <small><?=$info['shop_name'];?> Software</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Users Details</h5>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="edit">
                    <colgroup>
                        <col style="width:35%">
                        <col style="width:25%">
                        <col style="width:20%">
                        <col style="width:10%">
                        <col style="width:10%">
                    </colgroup> 
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Create Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="data">

                    </tbody>
                </table>
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
                getuser : 1,
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