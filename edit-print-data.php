<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));
$id = $_GET['id'];
$data = getprintdata($id);

if(isset($_POST['submit'])){

    $notify = mysqli_real_escape_string($con,$_POST['notify']);
    $lc_no = mysqli_real_escape_string($con,$_POST['lc_no']);
    $date1 = mysqli_real_escape_string($con,$_POST['date1']);
    $contract_number = mysqli_real_escape_string($con,$_POST['contract_number']);
    $date2 = mysqli_real_escape_string($con,$_POST['date2']);
    $issuing_bank = mysqli_real_escape_string($con,$_POST['issuing_bank']);
    $final_destination = mysqli_real_escape_string($con,$_POST['final_destination']);
    $shop_address = mysqli_real_escape_string($con,$_POST['shop_address']);
    $print_date =  date("Y-m-d");

    $sql = "UPDATE commercian_invoice_print set Notify='$notify',LC_NO='$lc_no',DATE1='$date1',contract_number='$contract_number',DATE2='$date2',Issuing_bank='$issuing_bank',Final_Destination='$final_destination',Shop_Address='$shop_address' where print_id='$id'";
    $check = mysqli_query($con,$sql);
    if($check){
        echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
  }else{
    echo "<script> window.onload = function() {
      update_error();
  }; </script>";
  echo mysqli_error($con);
}

}

$data = getprintdata($id);

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
            <form method="post" action="">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Commercial Invoice</h5>
                        </div>
                        <div class="card-body">
                            <table class="table-responsive table">
                                <tr>
                                    <td rowspan="2">Notify</td>
                                    <td rowspan="2"><textarea name="notify" class="form-control" rows="5"><?=$data['Notify']?></textarea></td>
                                    <td>LC NO</td>
                                    <td><input type="text" name="lc_no" value="<?=$data['LC_NO'];?>" class="form-control"></td>
                                    <td>DATE</td>
                                    <td><input type="date" name="date1" value="<?=$data['DATE1'];?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>EXPORT CONTRACT NUMBER</td>
                                    <td><input type="text" name="contract_number" value="<?=$data['contract_number']?>" class="form-control"></td>
                                    <td>DATE</td>
                                    <td><input type="date" name="date2" value="<?=$data['DATE2']?>" class="form-control"></td>
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
                                    <td><textarea rows="5" class="form-control" name="issuing_bank"><?=$data['Issuing_bank'];?>
                                </textarea></td>
                                <td><textarea rows="5" class="form-control" name="final_destination"><?=$data['Final_Destination'];?></textarea></td>
                                <td><textarea rows="5" class="form-control" name="shop_address"><?=$data['Shop_Address'];?>
                            </textarea></td>
                        </tr>
                    </table>
                    <div class="col-md-12 text-right"><button class="btn btn-primary form-control" type="submit" name="submit">Update</button></div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<!-- Container-fluid Ends-->

</div>

<?php include 'includes/footer.php'; ?>