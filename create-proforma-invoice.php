<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));
$id = $_GET['id'];

if(isset($_POST['submit'])){


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


    $sql = "INSERT INTO `proforma_invoice` (`invoice_no`, `date`, `buyer_name`, `ref`, `shop_address`, `buyer`, `to_name`, `terms`) VALUES ('$invoice_no', '$date', '$buyer_name', '$ref','$shop_address','$buyer', '$to', '$terms')";

    $query = mysqli_query($con,$sql);
    $id = mysqli_insert_id($con);

    $count = count($goods_description);
    for($i = 0 ; $i<$count ; $i++){


        $sql = "INSERT INTO `porforma_details` (porforma_id,`goods_description`, `po_number`, `uom`, `price`, `unit`) VALUES ('$id', '$goods_description[$i]', '$po_number[$i]', '$uom[$i]', '$price[$i]', '$unit[$i]')";
        $query = mysqli_query($con,$sql);
    }

    echo "<script>window.location.href='print-proforma-invoice?id=".$id."'</script>";

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
                                    <input type="text" class="form-control" name="invoice_no">
                                </td>
                                <th>Date</th>
                                <td><input type="date" class="form-control" name="date"></td>
                            </tr>
                            <tr>
                                <th>Buyer Name</th>
                                <td>
                                    <input type="text" class="form-control" name="buyer_name">
                                </td>
                                <th>REF</th>
                                <td><input type="text" class="form-control" name="ref"></td>
                            </tr>
                            <tr>
                                <th>Messesers(Buyer)</th>
                                <td colspan="3"><textarea class="form-control" name="buyer">SQ Birichina Ltd.<br>
PLOT NO 221, 222,223
JAMIRDIA,<br>VALUKA, MYMENSING</textarea></td>
                            </tr>
                            <tr>
                                <th>To</th>
                                <td colspan="3"><textarea class="form-control" name="to">Asekor Rahman Chowdhury<br />
(Executive, M&amp;M, SQBL)<br />
<strong>Shipping Mark&nbsp;</strong><br />
SQ Birichina Ltd.//Mymensing Mymensigh</textarea></td>
                            </tr>
                            <tr>
                                <th>Terms & Condition</th>
                                <td colspan="3"><textarea id="editor1" class="form-control" name="terms"><p>1. Origin: Bangladesh&nbsp;<br />
2. Payment: By 100% confirmed and irrevocable at 90 days sight L/C in USD &amp; MUST BE PAYMENT BY US $ ONLY AT MATURITY DATE. 3. Offer validity: 45 days after issuing Proforma Invoice.&nbsp;<br />
4. Packing: Export Standard Packing&nbsp;<br />
5. Delivery: Within 5 days from PO Issue Date.&nbsp;<br />
6. Bank: United Commercial Bank Ltd. Hazi Abdul Hashem Market, 1st Floor, 27, Kamarpara, Uttara, Turag, Dhaka, Bangladesh<br />
7. Maturity date is to be counted from the date of PI submission.&nbsp;<br />
8. All charge of issuing bank including reimbursement, remittance etc. will be on L/C applicant&#39;s account.&nbsp;<br />
9. Payment after export realization is not allowed.&nbsp;<br />
10. Partial delivery is to be allowed.&nbsp;<br />
11. Vat number : 003710187-0101</p>
</textarea></td>
                            </tr>
                            <tr>
                                <th>Shop Addree</th>
                                <td colspan="3"><textarea id="editor1" class="form-control" name="shop_address">S.S Printers<br>
Rainbow Market, Sha-78
Uttar Badda,
(Beside Govt, Primary School)
Badda, Dhaka-1212, Phone: 88-02-55056596                                                                                                                                                                      </textarea></td>
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
                                        <tr id="size_0">
                                            <td><input type="text" name="goods_description[]" placeholder="Goods Description" class="form-control"></td>
                                            <td><input type="text" name="po_number[]" placeholder="PO Number" class="form-control"></td>
                                            <td><input type="text" name="uom[]" placeholder="UOM" class="form-control"></td>
                                            <td><input type="text" name="price[]" placeholder="Perice/uom" class="form-control"></td>
                                            <td><input type="text" name="unit[]" placeholder="Perice/uom" class="form-control"></td>
                                            <td onclick="delete_row('size_0')"><i class="fa fa-times" aria-hidden="true"></i></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit" class="btn btn-primary">Create</button>
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