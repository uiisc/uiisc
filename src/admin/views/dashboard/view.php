
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-matrix-1 m-20 p-0 border-0">
                <div class="mx-20 my-15 d-flex justify-content-between align-items-center">
                    <h3 class="my-0 pt-0 text-white"><?php echo $count_clients; ?></h3>
                    <i class="fa fa-users fa-3x pt-10 text-white"></i>
                </div>
                <div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
                    <a href="clients.php" class="text-white">View Client <i class="fa fa-forward"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-matrix-2 m-20 p-0 border-0">
                <div class="mx-20 my-15 d-flex justify-content-between align-items-center">
                    <h3 class="my-0 pt-0 text-white"><?php echo $count_account; ?></h3>
                    <i class="fa fa-shopping-cart fa-3x pt-10 text-white"></i>
                </div>
                <div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
                    <a href="accounts.php" class="text-white">View Account <i class="fa fa-forward"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-matrix-3 m-20 p-0 border-0">
                <div class="mx-20 my-15 d-flex justify-content-between align-items-center">
                    <h3 class="my-0 pt-0 text-white"><?php echo $count_ssl; ?></h3>
                    <i class="fa fa-shield-alt fa-3x pt-10 text-white"></i>
                </div>
                <div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
                    <a href="myssl.php" class="text-white">View SSL <i class="fa fa-forward"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card text-center bg-matrix-4 m-20 p-0 border-0">
                <div class="mx-20 my-15 d-flex justify-content-between align-items-center">
                    <h3 class="my-0 pt-0 text-white"><?php echo $count_tickets; ?></h3>
                    <i class="fa fa-bullhorn fa-3x pt-10 text-white"></i>
                </div>
                <div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
                    <a href="tickets.php" class="text-white">View Ticket <i class="fa fa-forward"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-20">
              <h2 class="card-title">Welcome to Dear Admin!</h2>
              <p>
                Here you can manage your free hosting clients and free ssl with free support system remember that any action in this system cannot be undo.
              </p>
              <div class="text-right">
                <a href="accounts.php" class="btn btn-sm">Getting Started</a>
              </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card m-20">
              <h2 class="card-title">Free SSL Available!</h2>
              <p>
                Now generation of free ssl has been allowed in order to provide fast website access and increase the security and protection of your website.
              </p>
              <div class="text-right">
                <a href="ssl.php" class="btn btn-sm">Check Now</a>
              </div>
            </div>
        </div>
    </div>
    <div class="card m-20">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0">System information</h5>
            <a href="settings.php" class="btn btn-danger btn-sm">Settings</a>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Version:</b> <?php echo APP_VERSION; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Status:</b> <?php if ($SiteConfig['site_status'] == 1) {echo '<span class="badge badge-success">Live</span>';} elseif ($SiteConfig['site_status'] == 0) {echo '<span class="badge badge-secondary">Maintaince</span>';}?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Site Name:</b> <?php echo $SiteConfig['site_name']; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Brand Name:</b> <?php echo $SiteConfig['site_brand']; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Company Name:</b> <?php echo $SiteConfig['site_company']; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>URI:</b> <?php echo $SiteConfig['site_path']; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Contact Email:</b> <?php echo $SiteConfig['site_email']; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>PHP Version:</b> <?php echo PHP_VERSION; ?></p>
            </div>
            <div class="col-md-6 col-lg-4">
                <p class="mb-0"><b>Server Protocol:</b> <?php echo HTTP_PROTOCOL; ?></p>
            </div>
            <!-- <div class="col-md-12"><hr></div> -->
            <div class="col-md-12">
                <p class="mb-0"><b>Document Root:</b> <?php echo $_SERVER['DOCUMENT_ROOT'] ?></p>
            </div>
        </div>
    </div>
</div>
