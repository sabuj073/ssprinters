<?php include 'includes/header.php'; ?>

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Dashboard
                                    <small><?=$info['shop_name'];?> Software Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Earnings</span>
                                        <h3 class="mb-0">৳ <span class="counter"><?=round(earning(),2);?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Transections</span>
                                        <h3 class="mb-0"><span class="counter"><?=transections();?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Profit</span>
                                        <h3 class="mb-0">৳ <span class="counter"><?=round(profit(),2);?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-50">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Due Transections</span>
                                        <h3 class="mb-0"><span class="counter"><?=due();?></span><small></small></h3>
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


