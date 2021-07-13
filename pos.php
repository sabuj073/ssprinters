<?php include 'includes/header.php';
$_SESSION['dc'] = 0;
$_SESSION['profit'] = 0;
$_SESSION['discount'] = 0;
?>

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
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Paper Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Product Title</label>
                                <input class="form-control"  name="pc" id="pc" type="text" required="" onkeyup="check()">
                            </div>
                            <div class="form-group">
                                <label for="validationCustomtitle" class="col-form-label pt-0"><b>Paper Size</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><span>*</span>Width</label>
                                        <input class="form-control" type="text" name="pwidth" id="pwidth" onkeyup="check()">
                                    </div>
                                    <div class="col-md-6">
                                        <label><span>*</span>Length</label>
                                        <input class="form-control" type="text" name="plength" id="plength" onkeyup="check()">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustomtitle" class="col-form-label pt-0"><b>Product Size</b></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><span>*</span>Width</label>
                                        <input class="form-control" type="text" name="prwidth" id="prwidth" onkeyup="check()">
                                    </div>
                                    <div class="col-md-6">
                                        <label><span>*</span>Length</label>
                                        <input class="form-control" type="text" name="prlength" id="prlength" onkeyup="check()">
                                    </div>
                                    
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label  style="color:red;">Product From a Page</label>
                                        <input class="form-control" type="text" id="gettingqty" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label style="color:red;">Required Page</label>
                                        <input class="form-control" type="text" id="requiredpage" readonly>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="col-form-label"><label>*</label>GSM Details</label>
                                    <select class="custom-select" required="" id="gsm" name="gsm">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getgsmdetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['gsm'];?>"><?=$row['gsm'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label"><label>*</label>Paper Price</label>
                                    <select class="custom-select" required="" id="paper_price" name="paper_price" type="text"  onchange="check()">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getpaperdetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['paper_id'];?>"><?=$row['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                    
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span> Product Quantity</label>
                                        <input class="form-control" id="pqty" name="pqty" type="text" required="" onkeyup="check()">
                                    </div>
                                    <div class="col-md-6">
                                     <label for="validationCustom02" class="col-form-label"><span>*</span> Plate Price</label>
                                     <input class="form-control" id="palet_price" name="palet_price" type="text" required="">
                                 </div>
                             </div>

                         </div>
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label">Printing Color Details</label>
                                    <select class="custom-select" required="" id="print" name="print">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getprintingdetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['price'];?>"><?=$row['color'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Lamination Details</label>
                                    <select class="custom-select" required="" id="lamination" name="lamination">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getlaminationdetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['lam_price'];?>"><?=$row['lam_type'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Lamination Side</label>
                                    <select class="custom-select" required="" id="lamination_side" name="lamination_side">
                                        <option value="">--Select--</option>
                                       
                                            <option value="1">One Side</option>
                                            <option value="2">Both Side</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label"><span>*</span>Cutting Details</label>
                                    <select class="custom-select" required="" id="cutting" name="cutting">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getcuttingdetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['cut_price'];?>"><?=$row['cut_type'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Foil Print Details</label>
                                    <select class="custom-select"  id="foil" name="foil">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getfoildetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['foil_price'];?>"><?=$row['foil_type'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label"><label>*</label>Making Details</label>
                                    <select class="custom-select" required="" id="making" name="making">
                                        <option value="">--Select--</option>
                                        <?php
                                        $pdetails = getmakingdetails();
                                        while($row = mysqli_fetch_assoc($pdetails)){ 
                                            ?>
                                            <option value="<?=$row['making_price'];?>"><?=$row['making_type'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="insert" id="insert" onclick="add()">Add</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5>POS</h5>
                </div>
                <div class="card-body">
                    <div class="digital-add needs-validation">
                        <div class="form-group">
                            <table style="width: 100%" class="table">
                                <col span="1" style="width: 44%">
                                <col span="1" style="width: 10%">
                                <col span="1" style="width: 20%">
                                <col span="1" style="width: 20%">
                                <col span="1" style="width: 6%">
                                <thead>
                                    <tr style="background-color: #F1F4FB;">
                                        <td>Product Name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                        <td>Total</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                 <?php
                                 if(isset($_SESSION['paper_cart'])){
                                    $total = 0;
                                    foreach($_SESSION['paper_cart'] as $product){
                                        $temptotal = 0;
                                        $temptotal = $product['price']*$product['qty'];
                                        $total +=$temptotal;
                                        ?>
                                        <tr>
                                            <td><?=$product['title']; ?></td>
                                            <td><?=$product['qty']; ?></td>
                                            <td><?=$product['price']; ?></td>
                                            <td><?=$product['price']*$product['qty']; ?></td>
                                            <td><a href="javascript:void()" onclick="deletecart('<?=$product['title']; ?>')"><i class="fa fa-trash font-danger"></i></a></td>
                                        </tr>
                                    <?php }?>
                                    <tr>
                                        <td colspan="3" style="text-align: right;">Sub Total: </td>
                                        <td colspan="2" style="text-align: right;"><?=$total." ৳"?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-form-label"><span>*</span> Delivery</label>
                            <select class="custom-select" required="" id="delivery" name="making" onchange="morecalculation()">
                                <option value="">--Select--</option>
                                <?php
                                $pdetails = getdeliverydetails();
                                while($row = mysqli_fetch_assoc($pdetails)){ 
                                    ?>
                                    <option value="<?=$row['delivery_price'];?>"><?=$row['delivery_type'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label"><span>*</span> Profit %</label>
                            <input type="text" id="profit" name="profit" class="form-control" onkeyup="morecalculation()"></div>
                            <div class="col-md-4">
                                <label class="col-form-label"><span>*</span> Discount</label>
                                <input type="text" id="discount" name="profit" class="form-control" onkeyup="morecalculation()"></div>
                                <div class="col-md-4">
                                    <a href="make-invoice"><button class="btn btn-primary" name="insert" style="margin-top: 33px;">Make Invoice</button></a></div>
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

    <script>
        document.getElementById("insert").disabled = true;
        function add() {
            var title = $("#pc").val();
            var plength = Number($("#plength").val());
            var pwidth = Number($("#pwidth").val());
            var prlength = Number($("#prlength").val());
            var prwidth = Number($("#prwidth").val());

            var parea = Number(plength*pwidth);
            var prarea = Number(prlength*prwidth);
            var singlearea = Math.floor(Number(parea/prarea));
            $("#gettingqty").val(singlearea);
            var proprice = Number($("#paper_price").val());
            /*proprice = Number(proprice/500);*/
            
            $.ajax({
                url:"action2.php",
                method:"POST",
                data:{
                    paper_data:1,
                    id:proprice
                },
                success:function(response){
                    console.log(response);
                    var data = JSON.parse(response);
                    proprice = Number(data.price);
                    singlearea = Number(proprice/singlearea);
            var gsm = $("#gsm").val();
            var qty = Number($("#pqty").val());
            var palet_price = Number($("#palet_price").val());
            var lamination = Number($("#lamination").val());
            console.log("Lam : "+lamination);
            var lamination_side = Number($("#lamination_side").val());
            lamination = prarea*lamination*lamination_side;
            console.log("Lam : "+lamination);
            var cutting = Number($("#cutting").val());
            cutting = cutting/qty;
            var foil = Number($("#foil").val());
            foil = foil/qty;
            var making = Number($("#making").val());
            making = making/qty;
            var print = Number($("#print").val());
            print = print/qty;
            palet_price = palet_price/qty;
            

            singlearea = singlearea+palet_price+lamination+cutting+foil+making+print;
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                    addtocart:1,
                    title:title,
                    singlearea:singlearea,
                    qty:qty,
                    gsm:gsm,
                },
                success:function(response){
                    console.log(response);
                    $("#data").html(response);

                    $("#pc").val("");
                    $("#plength").val("");
                    $("#pwidth").val("");
                    $("#prlength").val("");
                    $("#prwidth").val("");
                    $("#paper_price").val("");
                    $("#gsm").val("");
                    $("#pqty").val("");
                    $("#palet_price").val("");
                    $("#lamination").val("");
                    $("#cutting").val("");
                    $("#foil").val("");
                    $("#making").val("");
                    $("#print").val("");
                }

            });
                }

            });
            
            
            
            
        }
        function check(){
            var title = $("#pc").val();
            var plength = Number($("#plength").val());
            var pwidth = Number($("#pwidth").val());
            var prlength = Number($("#prlength").val());
            var prwidth = Number($("#prwidth").val());
            var proprice = Number($("#paper_price").val());
            var qty = Number($("#pqty").val());
            var parea = Number(plength*pwidth);
            var prarea = Number(prlength*prwidth);
            var singlearea = Math.floor(Number(parea/prarea));
            if(plength!="" && pwidth!="" && prlength!="" && prwidth!="" ){
                $("#gettingqty").val(singlearea);
            }else{
                 $("#gettingqty").val('');
            }
            
            if(plength!="" && pwidth!="" && prlength!="" && prwidth!="" && qty!=""){
                var required = qty/singlearea;
            $("#requiredpage").val(required);
            }else{
                 $("#requiredpage").val("");
            }
            
            
            
            if(title!="" && plength!="" && pwidth!="" && prlength!="" && prwidth!="" && proprice!="" && qty!="" && gsm!=""){
                document.getElementById("insert").disabled = false;
            }else{
                document.getElementById("insert").disabled = true;
            }
        }

        function deletecart(title){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                    remove:1,
                    title:title,
                },
                success:function(response){
                    console.log(response);
                    $("#data").html(response);
                }

            });
        }

        function morecalculation(){
            var delivery = Number($("#delivery").val());
            var profit = Number($("#profit").val());
            var discount = Number($("#discount").val());
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                    more:1,
                    dc:delivery,
                    profit:profit,
                    discount:discount
                },
                success:function(response){
                    console.log(response);
                    $("#data").html(response);
                }

            });
        }
    </script>