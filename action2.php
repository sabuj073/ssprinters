<?php
include 'includes/config.php';
include 'includes/functions.php'; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['paper_data'])){
    $id = $_POST['id'];
    $data = getpaperdetailsby_id($id);
    $price = $data['price'];
    $qty = $data['qty'];   
    $price = $price/$qty;
    $data = array("price"=>$price);
    echo json_encode($data);
}

?>