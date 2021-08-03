<?php
include 'includes/config.php';
include 'includes/functions.php';
if(isset($_GET['id'])){
  $oid = $_GET['id'];
}else{
  echo "<script>window.location.href='home'</script>";
}
$info = getinfo();
$data = getboedata($oid);
$data_related = getboedata_related($oid);
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
  <div class="container-fluid invoice-container">
    <!-- Header -->
    <header>
      <div class="row align-items-center">
        <div class="col-md-12 text-center">
          <h4 class="text-7 mb-0"><u>BILL OF EXCHANGE</u></h4>
        </div>
      </div>
    </header>
    <br>

    <!-- Main Content -->
    <main>
      <div class="row">
        <div class="col-md-12">
         <table class="table setborder">
          <tr class="text-center">
            <td colspan="2" class="text-center"><?=$data['test'];?></td>
          </tr>
           <tr>
             <th>To the Order of </th>
             <td><?=$data['To_the_Order_of'];?></td>
           </tr>
            <tr>
             <th>S.W.I.F.T.</th>
             <td><?=$data['swift'];?></td>
           </tr>
           <tr>
             <th>The Sum Of</th>
             <td><?=$data['sum_of'];?></td>
           </tr>
           <tr>
             <th>In Words</th>
             <td><?=$data['in_word'];?></td>
           </tr>
           <tr>
             <th>Value Received <br>and Charge <br>Amount to <br>Account </th>
             <td>To<br><?=$data_related['Notify'];?></td>
           </tr>
           <tr>
             <th style="padding-top:100px">Drawn Under</th>
             <td>
              <table class="table">
                <tr>
                  <th class="text-center" style="border-top:0px;width: 50%;">LC No.</th>
                  <th class="text-center" style="border-top:0px;width: 50%;border-right: 0px;">Date</th>
                </tr>
                <tr>
                  <td class="text-center" style="border-right: 1px solid #ccc;"><?=$data_related['LC_NO'];?></td>
                  <td class="text-center"><?=$data_related['DATE1'];?></td>
                </tr>
                <tr>
                  <th class="text-center">Export LC No.</th>
                  <th class="text-center" style="border-right:0px;">Date</th>
                </tr>
                <tr>
                  <td class="text-center"  style="border-right: 1px solid #ccc;"><?=$data_related['contract_number'];?></td>
                  <td class="text-center" ><?=$data_related['DATE2'];?></td>
                </tr>
              </table>
             </td>
           </tr>
           <tr>
             <th style="padding-top:50px">Profrma Invoice</th>
             <td>
               <table class="table">
                 <tr>
                   <th class="text-center"  style="border-top:0px;width: 50%">PI</th>
                   <th class="text-center"  style="border-top:0px;border-right: 0px;">Date</th>
                 </tr>
                 <tr>
                   <td class="text-center" style="border-right: 1px solid #ccc;"><?=getpinumberbyslug($data['pi_slug']);?></td>
                   <td class="text-center"><?=$data['perfoma_date'];?></td>
                 </tr>
               </table>
             </td>
           </tr>
           <tr>
             <th>LC Issuing Bank<br>(Consignee) </th>
             <td><?=$data_related['Issuing_bank'];?></td>
           </tr>
           <tr>
            <th>Beneficiary</th>
            <td>
               <div class="col-md-12" style="margin-left: -15px;">
               <div class="row">
                 <div class="col-md-6" style="border-right: 1px solid #ccc;"><?=$data_related['Shop_Address']?></div>
                 <div class="col-md-6 text-center">
                   <p style="border-bottom: 1px solid #ccc;">Authorized Signature</p>
                 </div>
               </div>
             </div>
            </td>
            
           </tr>
         </table>
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
    text-align: left;
  }
  .table th {
    border-right: 1px solid #ccc;
  }
</style>
