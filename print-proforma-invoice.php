<?php
include 'includes/config.php';
include 'includes/functions.php';
if(isset($_GET['id'])){
  $oid = $_GET['id'];
}else{
  echo "<script>window.location.href='home'</script>";
}
$info = getinfo();
$data = gerperformadata($oid);
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
  <div class="container-fluid invoice-container with-border">
    <!-- Header -->

    <!-- Main Content -->
    <main>
      <div class="row">
        <div class="col-md-5">
            <table style="text-align:left;" class="date_table">
                <tr>
                    <td><b>Proforma Invoice No : &nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                    <td><b><?=$data['invoice_no'];?></b></td>
                </tr>
                <tr>
                    <td><b>Date : </b></td>
                    <td><b><?=$data['date'];?></b></td>
                </tr>
                <tr>
                    <td><b>Buyer : </b></td>
                    <td><b><?=$data['buyer_name'];?></b></td>
                </tr>
                <tr>
                    <td><b>Ref : </b></td>
                    <td><b><?=$data['ref'];?></b></td>
                </tr>
            </table>
        
       </div>

       <div class="col-md-3">
        
      </div> 
      <div class="col-md-4" style="border-left: 1px solid #ccc;">
          <?=$data['shop_address']?>
      </div>
  </div>
  <hr>
  <div class="row text-center">
    <div class="col-md-12 text-center">
        <b>PROFORMA INVOICE</b>
    </div>
  </div>  
  <hr>
  <div class="row">
    <div class="col-md-8">
        <b><u>Messers (Buyer)</u></b>
        <div>
            <?=$data['buyer'];?>
        </div>

    </div>
    <div class="col-md-4" style="border-left:1px solid #ccc;">
        <b>To</b>
        <div>
            <?=$data['to_name'];?>
        </div>
    </div>
    <div class="col-md-12 pt-3">
        The BUYER agree to buy and the VENDOR agree to sell the following products/service(s) with the 
 terms and conditions as stated.<br><br>
    </div>
  </div> 
  <div class="card">
    <div>
      <table class="table po_table">
        <tr>
            <th>SL.No </th>
            <th>Goods Description/Article</th>
            <th>PO Number</th>
            <th>UOM</th>
            <th>Perice/Uom</th>
            <th>Number of Units</th>
            <th>TOTAL AMOUNT USD</th>
            <tr>
              <?php
              $count = 0;
              $total_unit = 0;
              $total_price = 0;
              $print_data = getperformainvoiceDetails($oid);
              while($row = mysqli_fetch_assoc($print_data)){
                $total_unit += $row['unit'];
                $total_price +=$row['price']*$row['unit'];

                  ?>
                  <tr>
                      <td><?=++$count;?></td>
                      <td><?=$row['goods_description'];?></td>
                      <td><?=$row['po_number'];?></td>
                      <td><?=$row['uom'];?></td>
                      <td><?=$info['currency']." ".$row['price'];?></td>
                      <td><?=$row['unit'];?></td>
                      <td><?=$info['currency']." ".number_format($row['price']*$row['unit'],2);?></td>
                  </tr>
              <?php } ?>
              <tr>
                    <td colspan="4"></td>
                    <td><b>TOTAL</b></td>
                    <td><?=number_format($total_unit);?></td>
                    <td><?=$info['currency']." ".number_format($total_price,2);?></td>
              </tr>
          </table>
      </div>
  </div>
        <div class="col-md-12 mt-3">
        <b>Terms & Conditions</b>
          <?=$data['terms'];?>
      </div>
      <div class="col-md-12">
          <div class="row">
              <div class="col-md-6">
                  Accepted By : 
              </div>
              <div class="col-md-6">
                  SS Printers<br>
                  <img src="assets/images/signature.png" alt="signature" style="max-width: 70px;"><br>
                  Mr. Shahidul Islam
              </div>
          </div>
      </div>
</main>
<!-- Footer -->
<footer class="text-center mt-4">
     <a href="javascript:window.print()" class="btn btn-primary border text-white-200 shadow-none no-print"> Print</a></div>
</footer>
</div>
</body>

</html>

<script type="text/javascript">
  //javascript:window.print();
</script>

<style type="text/css">
td{
    text-align: center;
}

.date_table td{
    text-align: left;
    border-bottom: 1px solid #ccc;
}
.hr-class {
    margin-top: 0rem;
    margin-bottom: 0rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}
.po_table td, .table th{
    padding: .25rem !important;
    border-left: 1px solid #ccc;

}

.po_table td{
    
}
.po_table td:nth-child(1), .po_table th:nth-child(1){
    border-left: 0px solid #ccc;
}
.po_table{
    margin-bottom: 0px;
}
</style>
