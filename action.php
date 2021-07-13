<?php
include 'includes/config.php';
include 'includes/functions.php'; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Users List Start -->
<?php
if(isset($_POST['getuser'])){
 $getadmin = getadmin();
 while($row = mysqli_fetch_assoc($getadmin)){
   ?>
   <tr>
    <td>
        <div class="d-flex vendor-list">
           <span><?=$row['admin_name'];?></span>
       </div>
   </td>
   <td><?=$row['TYPE'];?></td>
   <td><?=$row['admin_email']; ?></td>
   <td><?=$row['create_date']; ?></td>
   <td>
    <div>
        <a href="edit-user/<?=$row['admin_id'];?>"><i class="fa fa-edit mr-2 font-success"></i></a>
        <a href="user-list?del=<?=$row['admin_id'];?>"><i class="fa fa-trash font-danger"></i></a>
    </div>
</td>
</tr>
<?php }} ?>
<!-- Users List End -->

<!-- GSM Details Start -->
<?php
if(isset($_POST['gsm_details'])){
    $getadmin = getgsmdetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['gsm'];?></span>
           </div>
       </td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['gsm_id'];?>','<?=$row['gsm'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="gsm?del=<?=$row['gsm_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- GSM Details End -->

<!-- Printing Details Start -->
<?php
if(isset($_POST['printdetails'])){
    $getadmin = getprintingdetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['color'];?></span>
           </div>
       </td>
       <td><?=$row['price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['printing_details_id'];?>','<?=$row['color'];?>','<?=$row['price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="printing-details?del=<?=$row['printing_details_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- Printing Details End -->

<!-- lamination Details Start -->
<?php
if(isset($_POST['laminationdetails'])){
    $getadmin = getlaminationdetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['lam_type'];?></span>
           </div>
       </td>
       <td><?=$row['lam_price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['lamination_details_id'];?>','<?=$row['lam_type'];?>','<?=$row['lam_price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="lamination-details?del=<?=$row['lamination_details_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- lamination Details End -->

<!-- cutting Details Start -->
<?php
if(isset($_POST['cuttingdetails'])){
    $getadmin = getcuttingdetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['cut_type'];?></span>
           </div>
       </td>
       <td><?=$row['cut_price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['cutting_id'];?>','<?=$row['cut_type'];?>','<?=$row['cut_price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="cutting-details?del=<?=$row['cutting_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- cutting Details End -->

<?php
if(isset($_POST['getpoprovider'])){
    $getadmin = getPoprovider();
    $count = 0;
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td><?=++$count;?></td>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['provier_name'];?></span>
           </div>
       </td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['po_provider_id'];?>','<?=$row['provier_name'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="po-provider?del=<?=$row['po_provider_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- Po Provider End -->

<!-- making Details Start -->
<?php
if(isset($_POST['makingdetails'])){
    $getadmin = getmakingdetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['making_type'];?></span>
           </div>
       </td>
       <td><?=$row['making_price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['making_id'];?>','<?=$row['making_type'];?>','<?=$row['making_price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="making-details?del=<?=$row['making_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- making Details End -->

<!-- foil Details Start -->
<?php
if(isset($_POST['foildetails'])){
    $getadmin = getfoildetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['foil_type'];?></span>
           </div>
       </td>
       <td><?=$row['foil_price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['foid_id'];?>','<?=$row['foil_type'];?>','<?=$row['foil_price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="foil-details?del=<?=$row['foid_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- foil Details End -->

<!-- delivery Details Start -->
<?php
if(isset($_POST['deliverydetails'])){
    $getadmin = getdeliverydetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['delivery_type'];?></span>
           </div>
       </td>
       <td><?=$row['delivery_price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['delivery_id'];?>','<?=$row['delivery_type'];?>','<?=$row['delivery_price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="delivery-details?del=<?=$row['delivery_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- delivery Details End -->

<!----addtocart----->
<?php
if(isset($_POST['addtocart'])){
    $gsm = $_POST['gsm'];
    $title = $_POST['title']." ".$gsm." GSM ";
    $price = $_POST['singlearea'];
    $qty = $_POST['qty'];

    if(!isset($_SESSION['paper_cart'])){
        $_SESSION['paper_cart'] = array();
    }
    if(array_key_exists($title, $_SESSION['paper_cart'])){
        $product = $_SESSION['paper_cart'][$title];
        $product['qty'] += $qty;


        /*$product['id'] = $p_id;*/
    }else{
        $product = array(
            'title' =>$title,
            'qty' =>$qty,
            'price'=>$price
        );
    }
    $_SESSION['paper_cart'][$title] = $product;
    $total = 0;
    foreach($_SESSION['paper_cart'] as $product){
        $temptotal = 0;
        $temptotal = $product['price']*$product['qty'];
        $total +=$temptotal;
        ?>
        <tr>
            <td><?=$product['title']; ?></td>
            <td><?=$product['qty']; ?></td>
            <td><?=number_format($product['price'],2); ?></td>
            <td><?=number_format($product['price']*$product['qty'],2); ?></td>
            <td><a href="javascript:void()" onclick="deletecart('<?=$product['title']; ?>')"><i class="fa fa-trash font-danger"></i></a></td>
        </tr>
    <?php }?>
    <tr>
        <td colspan="3" style="text-align: right;">Sub Total: </td>
        <td colspan="2" style="text-align: right;"><?=number_format($total,2)." ৳"?></td>
    </tr>
<?php } ?>
<!----addtocart----->

<?php 
if(isset($_POST["remove"])){

    $p_id = $_POST["title"];
    unset($_SESSION['paper_cart'][$p_id]);
    $total = 0;
    foreach($_SESSION['paper_cart'] as $product){
        $temptotal = 0;
        $temptotal = $product['price']*$product['qty'];
        $total +=$temptotal;
        ?>
        <tr>
            <td><?=$product['title']; ?></td>
            <td><?=$product['qty']; ?></td>
            <td><?=number_format($product['price'],2); ?></td>
            <td><?=number_format($product['price']*$product['qty'],2); ?></td>
            <td><a href="javascript:void()" onclick="deletecart('<?=$product['title']; ?>')"><i class="fa fa-trash font-danger"></i></a></td>
        </tr>
    <?php }?>
    <tr>
        <td colspan="3" style="text-align: right;">Sub Total: </td>
        <td colspan="2" style="text-align: right;"><?=number_format($total,2)." ৳"?></td>
    </tr>
<?php } ?>


<?php
if(isset($_POST['more'])){
    $dc = $_POST['dc'];
    $profit = $_POST['profit'];
    $discount = $_POST['discount'];

    $_SESSION['dc'] = $dc;
    $_SESSION['profit'] = $profit;
    $_SESSION['discount'] = $discount;




    $total = 0;
    foreach($_SESSION['paper_cart'] as $product){
        $temptotal = 0;
        $temptotal = $product['price']*$product['qty'];
        $total +=$temptotal;
        ?>
        <tr>
            <td><?=$product['title']; ?></td>
            <td><?=$product['qty']; ?></td>
            <td><?=number_format($product['price'],2); ?></td>
            <td><?=number_format($product['price']*$product['qty'],2); ?></td>
            <td><a href="javascript:void()" onclick="deletecart('<?=$product['title']; ?>')"><i class="fa fa-trash font-danger"></i></a></td>
        </tr>
    <?php }if($total>0){?>
        <tr>
            <td colspan="3" style="text-align: right;">Sub Total: </td>
        <td colspan="2" style="text-align: right;"><?=number_format($total,2)." ৳"?></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: right;">Delivery Charge: </td>
            <td colspan="2" style="text-align: right;"><?="+ ".$dc." ৳";?></td>
        </tr>
        <tr>
            <?php
            $withprofit = ($total*$profit)/100; 
            ?>
            <td colspan="3" style="text-align: right;">Profit (<?=$profit." %" ;?>): </td>
            <td colspan="2" style="text-align: right;"><?="+ ".number_format($withprofit,2);?></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: right;">Discount: </td>
            <td colspan="2" style="text-align: right;"><?="- ".number_format($discount,2)." ৳" ;?></td>
        </tr>
        <tr>
            <?php
            $total += $dc+$withprofit;
            $total -= $discount;
            ?>
            <td colspan="3" style="text-align: right;">Grand Total: </td>
            <td colspan="2" style="text-align: right;"><?=number_format($total,2)." ৳" ;?></td>
        </tr>
    <?php }else{
    }} ?>


<!-- Delievered ORder Details Start -->
<?php
if(isset($_POST['getalldorders'])){
    $getadmin = getallorders();
    while($row = mysqli_fetch_assoc($getadmin)){
      $due = $row['total']-$row['paid'];
       ?>
       <tr>
        <td><?=$row['order_id']?></td>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['name'];?></span>
           </div>
       </td>
       <td><?=$row['number'];?></td>
       <td><?=$row['total'];?></td>
       <td><?=$row['profit'];?></td>
       <td><?=$row['total']-$row['paid'];?></td>
       <td><?=$row['date']?></td>
       <td>
        <div>
            <a href="view-details?oid=<?=$row['order_id'];?>" ><button class="btn btn-primary">Details</button></a>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['order_id'];?>','<?=$due;?>')"><button class="btn btn-danger1">Edit</button></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- Delievered ORder Details End -->

<!-- Delievered ORder Details Start -->
<?php
if(isset($_POST['getduedorders'])){
    $getadmin = getdueorders();
    while($row = mysqli_fetch_assoc($getadmin)){
      $due = $row['total']-$row['paid'];
       ?>
       <tr>
        <td><?=$row['order_id']?></td>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['name'];?></span>
           </div>
       </td>
       <td><?=$row['number'];?></td>
       <td><?=$row['total'];?></td>
       <td><?=$row['profit'];?></td>
       <td><?=$row['total']-$row['paid'];?></td>
       <td><?=$row['date']?></td>
       <td>
        <div>
            <a href="view-details?oid=<?=$row['order_id'];?>" ><button class="btn btn-primary">Details</button></a>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['order_id'];?>','<?=$due;?>')"><button class="btn btn-danger1">Edit</button></a>
        </div>
    </td>
</tr>
<?php }} ?>

<!-- customer Details Start -->
<?php
if(isset($_POST['getcustomer'])){
    $getadmin = getcustomer();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['name'];?></span>
           </div>
       </td>
       <td><?=$row['number'];?></td>
       <td><?=$row['address'];?></td>
</tr>
<?php }} ?>

<!-- Paper Details Start -->
<?php
if(isset($_POST['getpaper'])){
    $getadmin = getpaperdetails();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['name'];?></span>
           </div>
       </td>
       <td><?=$row['qty'];?></td>
       <td><?=$row['price'];?></td>
       <td>
        <div>
            <a href="#" data-toggle="modal" data-original-title="test" data-target="#exampleModal1" onclick="getid('<?=$row['paper_id'];?>','<?=$row['name'];?>','<?=$row['qty'];?>','<?=$row['price'];?>')"><i class="fa fa-edit mr-2 font-success"></i></a>
            <a href="paper-price?del=<?=$row['paper_id'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>


<?php
if(isset($_POST['getalldata'])){
    $getadmin = getRawData();
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td><input type="checkbox" name="ids[]" value="<?=$row['new_data_id']?>"></td>
        <td><?=$row['new_data_id'];?></td>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['date'];?></span>
           </div>
       </td>
       <td><?=$row['provier_name'];?></td>
       <td><?=$row['po_number'];?></td>
       <td><?=$row['challan_number'];?></td>
       <td><?=$row['pi_number'];?></td>
       <td>
        <div>
            <a href="edit-data?id=<?=$row['new_data_id'];?>" ><i class="fa fa-edit mr-1 font-success"></i></a>
            <a href="all-data?del=<?=$row['new_data_id'];?>" ><i class="fa fa-trash mr-1 font-danger"></i></a>
            <a href="duplicate-data?id=<?=$row['new_data_id'];?>" ><i class="fa fa-clone font-success"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- All Data End -->

<?php
if(isset($_POST['getalldata_master'])){
    $getadmin = getmasterdata();
    $count = 0;
    while($row = mysqli_fetch_assoc($getadmin)){
       ?>
       <tr>
        <td><?=++$count;?></td>
        <td>
            <div class="d-flex vendor-list">
               <span><?=$row['pi_number'];?></span>
           </div>
       </td>
       <td>
        <div>
            <a href="commercial-invoice-view?id=<?=$row['pi_number'];?>" ><i class="fa fa-eye mr-2 font-success"></i></a>
            <a href="commercial-invoice?del=<?=$row['pi_number'];?>" ><i class="fa fa-trash font-danger"></i></a>
        </div>
    </td>
</tr>
<?php }} ?>
<!-- Master Data End -->