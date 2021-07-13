<?php include 'includes/header.php';

if(isset($_POST['generate'])){
  $id = makeinvoice($_POST);
  unset($_SESSION['paper_cart']);
  $_SESSION['dc'] = 0;
  $_SESSION['profit'] = 0;
  $_SESSION['discount'] = 0;
?>
<script type="text/javascript">
  window.location.href="invoice?oid=<?=$id?>";
</script>
<?php } ?>

<div class="page-body">

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-lg-6">
          <div class="page-header-left">
            <h3>POS
              <small><?=$info['shop_name']?> Software</small>
            </h3>
          </div>
        </div>
        <div class="col-lg-6">
          <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item active"><?=$info['shop_name']?> Software</li>
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
            <h5>General Details</h5>
          </div>
          <div class="card-body">
            <div class="digital-add needs-validation">
              <form method="post" action="">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Customer Name</label>
                      <input class="form-control"  name="name" id="name" type="text" required="">
                    </div>
                    <div class="col-md-6">
                      <label for="validationCustom02" class="col-form-label"><span>*</span>Phone Number</label>
                      <input class="form-control" id="number" name="number" type="text" required="">
                    </div>
                    <div class="col-md-6">
                      <label for="validationCustom02" class="col-form-label"><span>*</span>Address</label>
                      <input class="form-control" name="address" type="text" required="">
                    </div>
                    <div class="col-md-6">
                      <label for="validationCustom02" class="col-form-label"><span>*</span>Paid Ammount</label>
                      <input class="form-control" name="paid" type="text" required="">
                    </div>


                  </div>
                  <div class="form-group" style="margin-top: 10px;">
                    <button class="btn btn-primary" name="generate" id="insert">Generate</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->

</div>

<?php include 'includes/footer.php'; ?>