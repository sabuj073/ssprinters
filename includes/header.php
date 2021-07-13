<?php
include 'includes/config.php';
include 'includes/functions.php';
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
checklogin();
if(!isset($_SESSION['paper_admin_id'])){
    echo '<script>window.location.href="login";</script>';
} 
$info = getinfo();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/ssprinters/home">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="TechdynoBD">
    <link rel="icon" href="<?=$info['logo'];?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?=$info['logo'];?>" type="image/x-icon">
    <title><?=$info['shop_name'];?></title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="assets/css/prism.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="assets/css/chartist.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="assets/css/jsgrid.css">

    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
</head>

<body>
    <audio id="error">
        <source src="assets/audio/error.ogg" type="audio/ogg">
          Your browser does not support the audio element.
      </audio>

      <audio id="success">
        <source src="assets/audio/success.ogg" type="audio/ogg">
          Your browser does not support the audio element.
      </audio>

      <!-- page-wrapper Start-->
      <div class="page-wrapper">

        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left d-lg-none">
                    <div class="logo-wrapper"><a href=""><img class="blur-up lazyloaded" src="<?=$info['logo'];?>" alt=""></a></div>
                </div>
                <div class="mobile-sidebar">
                    <div class="media-body text-right switch-sm">
                        <label class="switch"><a href="javascript:void(0)"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                    </div>
                </div>
                <div class="nav-right col">
                    <ul class="nav-menus">

                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>

                        <li><a href="pos"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
                        <li class="onhover-dropdown">
                            <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/man.png" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                                <li><a href="edit-user/<?=$_SESSION['paper_admin_id']; ?>"><i data-feather="user"></i>Edit Profile</a></li>
                                <li><a href="logout"><i data-feather="log-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
            </div>
        </div>
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            <div class="page-sidebar">
                <div class="main-header-left d-none d-lg-block">
                    <div class="logo-wrapper"><a href=""><img class="blur-up lazyloaded" src="<?=$info['logo'];?>" alt=""></a></div>
                </div>
                <div class="sidebar custom-scrollbar">
                    <div class="sidebar-user text-center">
                        <div><img class="img-60 rounded-circle lazyloaded blur-up" src="assets/images/dashboard/man.png" alt="#">
                        </div>
                        <h6 class="mt-3 f-14"><?=$_SESSION['paper_admin_name']; ?></h6>
                        <p><?=$_SESSION['paper_admin_type']; ?></p>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href=""><i data-feather="home"></i><span>Dashboard</span></a></li>
                        <li><a class="sidebar-header" href="#"><i data-feather="dollar-sign"></i><span>Sell</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="paper-price"><i class="fa fa-circle"></i>Paper Price</a></li>
                                        <li><a href="printing-details"><i class="fa fa-circle"></i>Printing Details</a></li>
                                        <li><a href="lamination-details"><i class="fa fa-circle"></i>Lamination Details</a></li>
                                        <li><a href="cutting-details"><i class="fa fa-circle"></i>Cutting Details</a></li>
                                        <li><a href="making-details"><i class="fa fa-circle"></i>Making Details</a></li>
                                        <li><a href="foil-details"><i class="fa fa-circle"></i>Foil Print Details</a></li>
                                        <li><a href="delivery-details"><i class="fa fa-circle"></i>Delivery Charge Details</a></li>
                                        <li><a href="gsm"><i class="fa fa-circle"></i>GSM</a></li>
                                        <li><a href="pos"><i class="fa fa-circle"></i>POS</a></li>
                                    </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="tag"></i><span>Transections</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="all-transection"><i class="fa fa-circle"></i>All Transections</a></li>
                                <li><a href="due-transection"><i class="fa fa-circle"></i>Due Transections</a></li>
                                <li><a href="customer"><i class="fa fa-circle"></i>Customer List</a></li>
                            </ul>
                        </li>
                       
                        <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="user-list"><i class="fa fa-circle"></i>User List</a></li>
                                <li><a href="create-user"><i class="fa fa-circle"></i>Create User</a></li>
                            </ul>
                        </li>
                       
                        <li><a class="sidebar-header" href="#"><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="settings"><i class="fa fa-circle"></i>Setting</a></li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <!-----New Software Work -->
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Master Sheet</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="new-data"><i class="fa fa-circle"></i>New Data</a></li>
                                <li><a href="po-provider"><i class="fa fa-circle"></i>Po Provider</a></li>
                                 <li><a href="all-data"><i class="fa fa-circle"></i>All Data</a></li>
                            </ul>
                        </li>          
                        <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Commercial Invoice</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="commercial-invoice"><i class="fa fa-circle"></i>Ccommercial Invoice Data (PI Numbers)</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="user-plus"></i><span>Delivery Chalan</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="delivery-chalan"><i class="fa fa-circle"></i>Delivery Chalan (Pi Numbers)</a></li>
                            </ul>
                        </li>        
                    </ul>

                     <!-----New Software Work -->
                </div>
            </div>
            <!-- Page Sidebar Ends-->

            <style type="text/css">
                .logo-wrapper img{
                    max-width: 80px;
                }
            </style>