<?php include 'includes/header.php';
$date = str_replace(" ","",sha1(date('r', time())));


if(isset($_POST['others_save'])){
    $banner = "";
    if($_FILES["logo"]["name"]!=""){
        $banner ="assets/images/".$date.$_FILES["logo"]["name"];
        move_uploaded_file($_FILES["logo"]["tmp_name"],"assets/images/".$date.$_FILES["logo"]["name"]);
    }
    $check = update_info($_POST,$banner);
    if($check){
        echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
  }else{
    echo "<script> window.onload = function() {
          update_msg();
      }; </script>";
}
}
$getmeta = getmetatag('contact');
$getsetup = get_setup('contact');
$info = getinfo();
?>

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Settings
                            <small><?=$info['shop_name']; ?> Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Settings</li>
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
                        <h5>Settings</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="digital-add needs-validation">
                                <div class="form-group">
                                    <label class="col-form-label">Company Name</label>
                                    <input type="text" name="cname" class="form-control" value="<?=$info['shop_name'];?>">

                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Logo (1030px X 500px)</label><br>
                                    <img src="<?=$info['logo'];?>" style="max-width: 200px;"><br><br>
                                    <input type="file" name="logo" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="<?=$info['phone'];?>">

                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?=$info['address'];?>">

                                </div>

                                <div class="form-group mb-0">
                                    <div class="product-buttons text-center">
                                        <input type="submit" value="Save" name="others_save" type="button" class="btn btn-primary">
                                        <button type="button" class="btn btn-light">Discard</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

<?php include 'includes/footer.php'; ?>