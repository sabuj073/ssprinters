<?php
/*include '../includes/config.php';
include 'includes/functions.php';*/
include 'includes/header.php';
if(isset($_GET['oid'])){
  $oid = $_GET['oid'];
}else{
  echo "<script>window.location.href='home'</script>";
}
$info = getinfo();
$getorders = getordersdetailsbyid($oid);
$data = mysqli_fetch_assoc($getorders);
?>


<!-- Mirrored from demo.harnishdesign.net/html/koice/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Nov 2020 11:51:28 GMT -->
<!-- Container -->
<div class="page-body">
  <div class="container invoice-container" style="margin-top: 100px;">
    <!-- Header -->
    <header>
      <div class="row align-items-center">
        <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
          <img id="logo" src="<?=$info['logo'];?>" title="" alt="" style="width: 130px;"/>
        </div>
        <div class="col-sm-5 text-center text-sm-right">
          <h4 class="text-7 mb-0" style="padding-right: 10px;">Invoice</h4>
        </div>
      </div>
      <hr>
    </header>

    <!-- Main Content -->
    <main>
      <div class="row" style="padding: 10px;">
        <div class="col-sm-6"><strong>Date:</strong> <?=$data['date'];?></div>
        <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> <?=$data['order_id'];?></div>

      </div>
      <hr>
      <div class="row" style="padding: 10px;">
        <div class="col-sm-6 text-sm-right order-sm-1">
          <address>
            <?=$data['number'];?><br />
          </address>
        </div>
        <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
          <address>
            <?=$data['name'];?><br />
            <?=$data['address'];?><br />
          </address>
          </div>
        </div>  
        <div class="card">
          <div class="card-header px-2 py-0">
            <table class="table mb-0">
              <thead>
                <tr>
                  <td class="col-4 border-0"><strong>Product</strong></td>
                  <td class="col-2 text-center border-0"><strong>Rate</strong></td>
                  <td class="col-1 text-center border-0"><strong>QTY</strong></td>
                  <td class="col-2 text-right border-0"><strong>Amount</strong></td>
                </tr>
              </thead>
            </table>
          </div>
          <div class="card-body px-2">
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <?php
                  $getorders = getordersdetailsbyid($oid);
                  $total = 0;
                  while($row = mysqli_fetch_assoc($getorders)){ 
                    $temptotal = 0;
                    $temptotal = $row['price']*$row['qty'];
                    $total += $temptotal;
                   ?>
                   <tr>
                    <td colspan="2" class="col-4 text-1 border-0"><?=$row['prod_title'];?></td>
                    <td class="col-2 text-center border-0">৳<?=$row['price'];?></td>
                    <td class="col-1 text-center border-0"><?=$row['qty'];?></td>
                    <td class="col-2 text-right border-0">৳<?=$row['price']*$row['qty'];?></td>
                  </tr>
                <?php } ?>
                <tr>
                  <td colspan="4" class="bg-light-2 text-right"><strong>Sub Total:</strong></td>
                  <td class="bg-light-2 text-right">৳<?=$total;?></td>
                </tr>
                <tr>
                  <td colspan="4" class="bg-light-2 text-right"><strong>Shipping Charge:</strong></td>
                  <td class="bg-light-2 text-right">+ ৳<?=$data['delivery_charge'];?></td>
                </tr>
                <tr>
                  <td colspan="4" class="bg-light-2 text-right"><strong>Discount:</strong></td>
                  <td class="bg-light-2 text-right">- ৳<?=$data['discount'];?></td>
                </tr>
                <tr>
                  <td colspan="4" class="bg-light-2 text-right"><strong>Total:</strong></td>
                  <td class="bg-light-2 text-right">৳<?=$data['total'];?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
    <!-- Footer -->
    <footer class="text-center mt-4">
      <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p><br>
      <p><?="<b>".$info['shop_name']."</b><br>".$info['address']."<br>Contact:".$info['phone'];?></p>
      <div class="btn-group btn-group-sm d-print-none"> <a href="print-invoice?oid=<?=$oid;?>" class="btn btn-primary border text-white-200 shadow-none"> Print</a></div>
    </footer>
  </div>
</div>
</body>


<?php include 'includes/footer.php'; ?>

<style type="text/css">
  .page-wrapper .page-body-wrapper footer {
    margin-left: 0px !important;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    bottom: 0;
    z-index: 8;
  }
</style>

<script type="text/javascript">
  function update_status(){
    var order_id = "<?php echo $oid ?>";
    var status = $("#status").val();
    $.ajax({
      url : "action.php",
      type : "POST",
      data: {
        update:1,
        status:status,
        order_id: order_id
      },
      cache:false,
      success:function(response){
        document.getElementById("success").play();
        Swal.fire({
          title: 'Success!',
          text: 'Successful.',
          icon: 'success',
          confirmButtonText: 'Okay'
      })
        window.location = "view-details?oid="+order_id;
      }

    });
  }
</script>
