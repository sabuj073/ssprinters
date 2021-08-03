<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));
if(isset($_GET['oid'])){
  $oid = $_GET['oid'];
}else{
  echo "<script>window.location.href='home'</script>";
}
$info = getinfo();
$data = gerperformadata($oid);

if(isset($_POST['submit'])){


    mysqli_query($con,"DELETE from proforma_invoice where proforma_id = '$oid'");

    $invoice_no = mysqli_real_escape_string($con,$_POST['invoice_no']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $buyer_name = mysqli_real_escape_string($con,$_POST['buyer_name']);
    $ref = mysqli_real_escape_string($con,$_POST['ref']);
    $buyer = mysqli_real_escape_string($con,$_POST['buyer']);
    $to = mysqli_real_escape_string($con,$_POST['to']);
    $terms = mysqli_real_escape_string($con,$_POST['terms']);
    $shop_address = mysqli_real_escape_string($con,$_POST['shop_address']);

    $goods_description = $_POST['goods_description'];
    $po_number = $_POST['po_number'];
    $uom = $_POST['uom'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];


    $sql = "INSERT INTO `proforma_invoice` (proforma_id,`invoice_no`, `date`, `buyer_name`, `ref`, `shop_address`, `buyer`, `to_name`, `terms`) VALUES ('$oid','$invoice_no', '$date', '$buyer_name', '$ref','$shop_address','$buyer', '$to', '$terms')";

    $query = mysqli_query($con,$sql);
    $id = $oid;

    $count = count($goods_description);
    for($i = 0 ; $i<$count ; $i++){


        $sql = "INSERT INTO `porforma_details` (porforma_id,`goods_description`, `po_number`, `uom`, `price`, `unit`) VALUES ('$id', '$goods_description[$i]', '$po_number[$i]', '$uom[$i]', '$price[$i]', '$unit[$i]')";
        $query = mysqli_query($con,$sql);
    }

    if($query){
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
                        <h3>Proforma Invoice
                            <small><?=$info['shop_name']?> Admin Panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Proforma Invoice</li>
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
                <form method="post" action="">
                    <div class="card">
                        <div class="card-header">
                            <h5>Proforma Invoice</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Invoice Number</th>
                                    <td>
                                        <input type="text" class="form-control" value="<?=$data['invoice_no']?>" name="invoice_no">
                                    </td>
                                    <th>Date</th>
                                    <td><input type="date" class="form-control" value="<?=$data['date']?>" name="date"></td>
                                </tr>
                                <tr>
                                    <th>Buyer Name</th>
                                    <td>
                                        <input type="text" class="form-control" value="<?=$data['buyer_name']?>" name="buyer_name">
                                    </td>
                                    <th>REF</th>
                                    <td><input type="text" class="form-control" value="<?=$data['ref']?>" name="ref"></td>
                                </tr>
                                <tr>
                                    <th>Messesers(Buyer)</th>
                                    <td colspan="3"><textarea class="form-control" id="editor3" name="buyer"><?=$data['buyer'];?></textarea></td>
                                </tr>
                                <tr>
                                    <th>To</th>
                                    <td colspan="3"><textarea class="form-control" id="editor4" name="to"><?=$data['to_name'];?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Terms & Condition</th>
                                    <td colspan="3"><textarea id="editor1" class="form-control" name="terms"><?=$data['terms'];?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Shop Addrees</th>
                                    <td colspan="3"><textarea id="editor5" class="form-control" name="shop_address"><?=$data['shop_address'];?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Products</th>
                                    <td colspan="3"><button class="btn btn-secondary" type="button" onclick="add_size()">Add More</button></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <table class="table" id="size_table">
                                            <thead>
                                                <tr>
                                                    <th>Goods</th>
                                                    <th>PO Number</th>
                                                    <th>UOM</th>
                                                    <th>Perice/uom</th>
                                                    <th>Unit</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $count = 2000;
                                                $print_data = getperformainvoiceDetails($oid);
                                                while($row = mysqli_fetch_assoc($print_data)){
                                                    $count++;
                                                    ?>
                                                    <tr id="size_<?=$count;?>">
                                                        <td><input type="text" name="goods_description[]" value="<?=$row['goods_description'];?>" placeholder="Goods Description" class="form-control"></td>
                                                            <td><input type="text" name="po_number[]" value="<?=$row['po_number'];?>" placeholder="PO Number" class="form-control"></td>
                                                                <td><input type="text" name="uom[]" value="<?=$row['uom'];?>" placeholder="UOM" class="form-control"></td>
                                                                <td><input type="text" name="price[]" value="<?=$row['price'];?>" placeholder="Perice/uom" class="form-control"></td>
                                                                <td><input type="text" name="unit[]" value="<?=$row['unit'];?>" placeholder="Perice/uom" class="form-control"></td>
                                                                <td onclick="delete_row('size_<?=$count;?>')"><i class="fa fa-times" aria-hidden="true"></i></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <?php include 'includes/footer.php'; ?>
        <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

        <script type="text/javascript">
            var size_count = 1;

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
                CKEDITOR.replace( 'editor1' );
                CKEDITOR.replace( 'editor3' );
                CKEDITOR.replace( 'editor4' );
                CKEDITOR.replace( 'editor5' );
                ClassicEditor.create( document.querySelector( '#editor2' ) )
                .then( editor => {
                    console.log( editor );
                } )
                .catch( error => {
                    console.error( error );
                } );
            });

            function add_size(){
                $("#size_table tr:last").after('<tr id="size_'+size_count+'"><td><input type="text" name="goods_description[]" placeholder="Goods Description" class="form-control"></td><td><input type="text" name="po_number[]" placeholder="PO Number" class="form-control"></td><td><input type="text" name="uom[]" placeholder="UOM" class="form-control"></td><td><input type="text" name="price[]" placeholder="Perice/uom" class="form-control"></td><td><input type="text" name="unit[]" placeholder="Perice/uom" class="form-control"></td><td onclick="delete_row(\'size_'+size_count+'\')"><i class="fa fa-times" aria-hidden="true"></i></td></tr>');

            }

            function delete_row(id){
                $("#"+id).remove();
            }

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
        <style type="text/css">
        .fa-times{
            background-color:red;
            padding:5px;
            color:#fff;
            cursor:pointer;
        }
    </style>