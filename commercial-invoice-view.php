<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));
$id = $_GET['id'];
$data = getCommercialInvoice($id);

?>

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Commercial Invoice
                            <small><?=$info['shop_name']?> Admin Panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Commercial Invoice</li>
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
                        <h5>Commercial Invoice</h5>
                    </div>
                    <div class="card-body">
                        <table class="table-responsive table">
                            <tr>
                                <td rowspan="2">Notify</td>
                                <td rowspan="2"><textarea name="notify" class="form-control" rows="5">SQ Birichina Ltd.
PLOT NO 221, 222,223
JAMIRDIA, VALUKA, MYMENSING</textarea></td>
                                <td>LC NO</td>
                                <td><input type="text" name="lc_no" class="form-control"></td>
                                <td>DATE</td>
                                <td><input type="date" name="date1" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>EXPORT CONTRACT NUMBER</td>
                                <td><input type="text" name="lc_no" class="form-control"></td>
                                <td>DATE</td>
                                <td><input type="date" name="date2" class="form-control"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Issuing bank (Consignee)</td>
                                <td>Final Destination </td>
                                <td>Shop Address</td>
                            </tr>
                            <tr>
                                <td><textarea rows="5" class="form-control" name="issuing_bank">MERCANTILE BANK LTD
GULSHAN BRANCH,
106, GULSHAN AVENUE,
DHAKA 1212, BANGLADESH</textarea></td>
                                <td><textarea rows="5" class="form-control" name="issuing_bank">Notify: -SQ Birichina Limited
PLOT NO 221, 222,223
JAMIRDIA, VALUKA, MYMENSING
BANGLADESH</textarea></td>
                                <td><textarea rows="5" class="form-control" name="shop_address">S.S Printers
Rainbow Market, Sha-78
Uttar Badda,
(Beside Govt, Primary School)
Badda, Dhaka-1212, Phone: 88-02-55056596</textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>SL</td>
                                <td>Goods Discription</td>
                                <td>PO Number (WFX-)</td>
                                <td>PI number</td>
                                <td>PI Dated</td>
                                <td>Unit</td>
                                <td>Unit Price</td>
                                <td>BillIing Quantity</td>
                                <td>Amount</td>
                            </tr>
                            <?php
                                $count = 0;
                                while($row = mysqli_fetch_assoc($data)){
                            ?>
                            <tr>
                                <td><?=++$count;?></td>
                                <td><?=$row['goods_description'];?></td>
                                <td><?=$row['po_number'];?></td>
                                <td><?=$row['pi_number'];?></td>
                                <td><?=$row['format_date'];?></td>
                                <td><?=$row['unit'];?></td>
                                <td><?=$info['currency']." ".number_format($row['po_unit_price']);?></td>
                                <td><?=$row['bill_qty'];?></td>
                                <td><?=$info['currency']." ".number_format($row['po_unit_price']*$row['bill_qty']);?></td>
                            </tr>
                        <?php } ?>
                        </table>

                        <div class="form-group  text-center">
                            <button class="btn btn-primary">Print</button>
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