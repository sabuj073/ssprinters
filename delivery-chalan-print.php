<?php
include 'includes/config.php';
include 'includes/functions.php';
if(isset($_GET['id'])){
  $oid = $_GET['id'];
}else{
  echo "<script>alert('Create Commercial Invoice First')</script>";
  echo "<script>window.location.href='home'</script>";
}
$info = getinfo();
$data = getdeliverychalan_info($oid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?=$info['logo'];?>" rel="icon" />
  <title><?=$info['shop_name'];?></title>

<!-- Web Fonts
  ======================= -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
  ======================= -->
  <link rel="stylesheet" type="text/css" href="assets/invoice/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/invoice/all.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/invoice/stylesheet.css"/>
</head>
<body>
  <!-- Container -->
  <div class="container-fluid invoice-container-ladscape">
    <!-- Header -->
    <header>
      <div class="row align-items-center">
        <div class="col-md-12 text-center">
          <h4 class="text-7 mb-0"><u>Delivery Challan</u></h4>
        </div>
      </div>
      <hr>
    </header>

    <!-- Main Content -->
    <main>
      <div class="row">
        <div class="col-md-3">
         <b><u> Notify : </u></b><br>
         <hr>
         <?=$data['Notify'];?>
        </div>
        <div class="col-md-3">
          <b>LC NO</b><br>
          <hr>
          <b>EXPORT CONTRACT NUMBER</b>
        </div> 
        <div class="col-md-2">
          <?=$data['LC_NO']?><br>
          <hr>
          <?=$data['contract_number'];?>
        </div>
        <div class="col-md-2" style="padding-left: 50px;">
          <b>Date</b><br><hr>
          <b>Date</b>
        </div>
        <div class="col-md-2">
          <?=$data['DATE1'];?><br><hr>
          <?=$data['DATE2'];?>
        </div>

      </div>
      <hr>
      <div class="row">
          <div class="col-md-3" style="border-right: 1px solid #ccc;">
          <p><b><u>Issuing bank (Consignee)</u></b></p>
          <?=$data['Issuing_bank']?>
          </div>
          <div class="col-md-3" style="border-right:1px solid #ccc;">
          <p><b><u>Final Destination</u></b></p>
          <?=$data['Final_Destination']?>
          </div>
        <div class="col-md-4 text-center" style="border-right: 1px solid #ccc;">
          <p>Carried - By Truck</p>
          <hr>
          <p>The goods are delivered  according to the specification of proforma Invoice as mentioned below with all the details </p>
        </div>
        <div class="col-md-2">
          <?=$data['Shop_Address'];?>
        </div>
      </div>  
      <hr>
      <div class="card">
        <div>
          <table class="table">
            <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Goods Discription</th>
            <th class="text-center">PO Number (WFX-)</th>
            <th class="text-center" style="width:12%">PI number</th>
            <th class="text-center">PI Dated</th>
            <th class="text-center">Unit</th>
            <th class="text-center">Chalan Number</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">BillIing Quantity</th>
            <th class="text-center">Amount</th>
            <tr>
              <?php
                $count = 0;
                $total_qty = 0;
                $total_count = 0;
                $print_data = getCommercialInvoice($oid);
                while($row = mysqli_fetch_assoc($print_data)){
                  $total_qty += $row['bill_qty'];
                  $total_count += $row['po_unit_price']*$row['bill_qty'];
              ?>
              <tr>
                  <td><?=++$count;?></td>
                  <td><?=$row['goods_description'];?></td>
                  <td><?=$row['po_number'];?></td>
                  <?php
                    if($count==1){
                  ?>
                  <td><?=$row['pi_number'];?></td>
                <?php }else{ ?>
                  <td><h4>"</h4></td>
                <?php } ?>
                  <td><?=$row['format_date'];?></td>
                  <td><?=$row['unit'];?></td>
                  <td><?=$row['challan_number'];?></td>
                  <td><?=$info['currency']." ".number_format($row['po_unit_price']);?></td>
                  <td><?=$row['bill_qty'];?></td>
                  <td><?=$info['currency']." ".number_format($row['po_unit_price']*$row['bill_qty']);?></td>
              </tr>
            <?php } ?>
            <tr>
              <td colspan="7" class="text-right">TOTAL QTY</td>
              <td><?=$total_qty;?></td>
              <td>Total Bill Amount"</td>
              <td><?=$info['currency']." ".$total_count; ?></td>
            </tr>
          </table>
        </div>
    </div><br>
           <div class="col-md-12">
            <div class="row">
            <div class="col-md-3"><?=$data['Shop_Address'];?></div>
            <div class="col-md-6"></div>
            <div class="col-md-3 text-center">
              <div style="padding-top:70px;">…......................................................<br>Authorised Signature</div>

            </div>
            </div>
          </div>
  </main>
  <!-- Footer -->
  <footer class="text-center mt-4">
    <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-primary border text-white-200 shadow-none"> Print</a></div>
  </footer>
</div>
</body>

</html>

<script type="text/javascript">
  javascript:window.print();
</script>

<style type="text/css">
  td{
    text-align: center;
  }
</style>
