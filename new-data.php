<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));
if(isset($_POST['add'])){
    $date = $_POST['date'];
    $unit = mysqli_real_escape_string($con,$_POST['unit']);
    $po_provider = mysqli_real_escape_string($con,$_POST['po_provider']);
    $po_number = mysqli_real_escape_string($con,$_POST['po_number']);
    $bill_qty = mysqli_real_escape_string($con,$_POST['bill_qty']);
    $goods_description = mysqli_real_escape_string($con,$_POST['goods_description']);
    $po_value = mysqli_real_escape_string($con,$_POST['po_value']);
    $po_unit_price = mysqli_real_escape_string($con,$_POST['po_unit_price']);
    $po_costing = mysqli_real_escape_string($con,$_POST['po_costing']);
    $profit = mysqli_real_escape_string($con,$_POST['profit']);
    $challan_number = mysqli_real_escape_string($con,$_POST['challan_number']);
    $pi_number = mysqli_real_escape_string($con,$_POST['pi_number']);
    $received_lc = mysqli_real_escape_string($con,$_POST['received_lc']);
    $query = mysqli_query($con,"INSERT INTO `new_data` (`new_data_id`, `date`, `unit`, `po_provider`, `po_number`, `bill_qty`, `goods_description`, `po_value`, `po_unit_price`, `po_costing`, `profit`, `challan_number`, `pi_number`, `received_lc`) VALUES (NULL, '$date', '$unit', '$po_provider', '$po_number', '$bill_qty', '$goods_description', '$po_value', '$po_unit_price', '$po_costing', '$profit', '$challan_number', '$pi_number', '$received_lc')");

    if($query){
        echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
      echo "<script>window.location.href='all-data'</script>";

  }else{
    echo mysqli_error($con);
    echo "<script> window.onload = function() {
      update_error();
  }; </script>";

}

}
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add new data
                            <small><?=$info['shop_name']; ?> Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Add new data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row product-adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>New Data</h5>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="digital-add needs-validation row">

                               <div class="form-group col-md-6">
                                <label for="date" class="col-form-label pt-0"><span>*</span> Date</label>
                                <input class="form-control" id="date" type="date" required="" name="date">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="unit" class="col-form-label pt-0"><span>*</span> Buisness Unit</label>
                                <input class="form-control" id="unit" type="text" name="unit" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="po_provider" class="col-form-label pt-0"><span>*</span> Po Provider</label>
                                <select class="form-control select2" id="po_provider" name="po_provider" required >
                                   <option value="">--Select--</option>
                                   <?php
                                   $cat = getPoprovider();
                                   while($row = mysqli_fetch_assoc($cat)){ 
                                    ?>
                                    <option value="<?=$row['po_provider_id'];?>"><?=$row['provier_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="po_number" class="col-form-label pt-0"><span></span>Po Number (WFX)</label>
                            <input class="form-control" id="po_number" type="text" name="po_number" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="bill_qty" class="col-form-label"><span>*</span>Billing Quantity</label>
                            <input class="form-control" id="bill_qty" type="text"  name="bill_qty" onkeyup="calculate_profit()">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="goods_description" class="col-form-label"><span>*</span>Goods Description</label>
                            <textarea class="form-control" id="goods_description" name="goods_description"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="po_value" class="col-form-label"><span>*</span>Po Value</label>
                            <input class="form-control" id="po_value" type="text" required="" name="po_value">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="po_unit_price" class="col-form-label"><span>*</span>Po unit Price</label>
                            <input class="form-control" id="po_unit_price" type="text" required="" name="po_unit_price" onkeyup="calculate_profit()">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="po_costing" class="col-form-label"><span>*</span>Po Costing</label>
                            <input class="form-control" id="po_costing" type="text" required="" name="po_costing" onkeyup="calculate_profit()">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profit" class="col-form-label"><span>*</span>Profit <span id="detail_data"></span></label>
                            <input class="form-control" id="profit" type="text" required=""  name="profit">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="challan_number" class="col-form-label"><span></span>Challan Number</label>
                            <input class="form-control" id="challan_number" type="text"  name="challan_number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pi_number" class="col-form-label"><span></span>Pi Number</label>
                            <input class="form-control" id="pi_number" type="text" name="pi_number" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="received_lc" class="col-form-label"><span></span>Received Lc</label>
                            <input class="form-control" id="received_lc" type="text" name="received_lc">
                        </div>
                        <div class="form-group col-md-6 mb-0">
                            <div class="product-buttons text-center">
                                <input type="submit" class="btn btn-primary" name="add">
                                <button type="button" class="btn btn-light">Discard</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
</div>
<!-- Container-fluid Ends-->

</div>
}

<?php include 'includes/footer.php'; ?>
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
    function getsubcat(){
     var cat = $("#cat").val();

     $.ajax({
        url:"action2.php",
        method:"POST",
        data:{
            getsubcat:1,
            cat:cat,
        },
        success:function(response){
            console.log(response);
            $("#subcat").html(response);
        }   

    });
 }
</script>

<script src="assets/ckeditor/ckeditor.js"></script>
<script>
 CKEDITOR.replace('editor1');
</script>

<script type="text/javascript">
    function calculate_profit(){
        var po_unit_price = Number($("#po_unit_price").val());
        var bill_qty = Number($("#bill_qty").val());
        var po_costing = Number($("#po_costing").val());

        if(po_unit_price !="" && bill_qty != "" && po_costing != ""){
            var profit = (po_unit_price*bill_qty) - (po_costing*bill_qty);
            $("#profit").val(profit);
            $("#detail_data").html("( "+bill_qty+"*"+(po_unit_price-po_costing+" )"));
        }
    }

</script>

<style>
.fa-times{
    background-color:red;
    padding:5px;
    color:#fff;
    cursor:pointer;
}
tr{
    border-bottom:1px solid #efefef;
}
td{
    text-align:center;
}
.select2-results__option{
    width: 100%;
}
}
</style>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>