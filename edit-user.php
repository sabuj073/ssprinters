<?php include 'includes/header.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	echo '<script>window.location.href="";</script>';
} 
if(isset($_POST['save'])){


	$check = updateadmin($_POST,$id);

	if($check){
		echo "<script> window.onload = function() {
			update_msg();
		}; </script>";
	}else{
		echo "<script> window.onload = function() {
			update_error();
		}; </script>";
	}
}
$getdata = getadmininfo($id);
?>


<div class="page-body">

	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-6">
					<div class="page-header-left">
						<h3>Update User
							<small><?=$info['shop_name']?> Software</small>
						</h3>
					</div>
				</div>
				<div class="col-lg-6">
					<ol class="breadcrumb pull-right">
						<li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
						<li class="breadcrumb-item">Users </li>
						<li class="breadcrumb-item active">Update User </li>
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
				<div class="card tab2-card">
					<div class="card-header">
						<h5> Update User</h5>
					</div>
					<div class="card-body">
						<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
							<li class="nav-item"><a class="nav-link active show" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Account</a></li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
								<form class="needs-validation user-add"  method="post" action="">
									<h4>Account Details</h4>
									<div class="form-group row">
										<label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Name</label>
										<input class="form-control col-xl-8 col-md-7" value="<?=$getdata['admin_name']; ?>" id="validationCustom0" type="text" name="name" required>
									</div>
									<div class="form-group row">
										<label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Designation</label>
										<input class="form-control col-xl-8 col-md-7" name="designation" id="validationCustom1" value="<?=$getdata['TYPE']; ?>" type="text">
									</div>
									<div class="form-group row">
										<label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span> Email</label>
										<input class="form-control col-xl-8 col-md-7" value="<?=$getdata['admin_email']; ?>" name="email" id="validationCustom2" type="text" required readonly>
									</div>
									<div class="form-group row">
										<label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span> Password</label>
										<input class="form-control col-xl-8 col-md-7" name="password" id="validationCustom3" type="password" required onkeyup="checkpass()">
									</div>
									<div class="form-group row">
										<label for="validationCustom4" class="col-xl-3 col-md-4"><span>*</span> Confirm Password</label>
										<input class="form-control col-xl-8 col-md-7" name="confirm" id="validationCustom4" type="password" minlength="6" required onkeyup="checkpass()">
										<label for="" class="col-xl-3 col-md-4"><span></span></label>
										<span style="color: red;" id="msg" ></span>
									</div>
									<div class="form-group row">
										<label for="validationCustom5" class="col-xl-3 col-md-4"><span>*</span>Pin</label>
										<input class="form-control col-xl-8 col-md-7" name="pin" id="validationCustom5" type="number" minlength="6" value="<?=$getdata['pin'];?>" required>
									</div>
									<div class="pull-right">
										<input type="submit" class="btn btn-primary" value="Save" id="mySubmit" name="save">
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

<!-- footer start-->
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
	document.getElementById("mySubmit").disabled = true;
	function checkpass(){
		var pass = $("#validationCustom3").val();
		var cpass = $("#validationCustom4").val();
		if(pass!=cpass){
			$("#msg").html("Password didn't matched.");
			document.getElementById("mySubmit").disabled = true;
		}else{
			$("#msg").html("");
			document.getElementById("mySubmit").disabled = false;
		}

	}
</script>