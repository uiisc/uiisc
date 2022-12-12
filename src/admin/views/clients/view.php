
<div class="container-fluid">
    <div class="card py-15">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="m-0">Client Information</h5>
            <a href="clients.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('First Name'); ?>:</b> <?php echo $ClientInfo['client_fname']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Last Name'); ?>:</b> <?php echo $ClientInfo['client_lname']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Email Address'); ?>:</b> <?php echo $ClientInfo['client_email']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Phone Number:</b> <?php echo $ClientInfo['client_phone']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Billing Address'); ?>:</b> <?php echo $ClientInfo['client_address']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Company'); ?>:</b> <?php echo $ClientInfo['client_company']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Country'); ?>:</b> <?php echo $CountryName; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('City'); ?>:</b> <?php echo $ClientInfo['client_city']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Postal Code:</b> <?php echo $ClientInfo['client_pcode']; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b><?php echo $lang->I18N('Hosting Accounts'); ?>:</b> <?php echo $count_account; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>SSL Certificates:</b> <?php echo $count_ssl; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="mb-0"><b>Support Tickets:</b> <?php echo $count_tickets; ?></h6>
            </div>
            <div class="col-md-12 py-5">
                <a href="clients.php?action=login&client_id=<?php echo $ClientInfo['client_id'] ?>" target="_blank" class="btn m5t btn-sm btn-primary">Login as <?php echo $ClientInfo['client_fname'] ?></a>
                <?php if ($ClientInfo['client_status'] !== '1'): ?>
                <a href="controllers/clients/activate.php?client_id=<?php echo $ClientInfo['client_id']; ?>" class="btn m5t btn-sm btn-success text-white">Mark as Active</a>
                <?php else: ?>
                <a href="controllers/clients/suspend.php?client_id=<?php echo $ClientInfo['client_id']; ?>" class="btn m5t btn-sm btn-secondary">Mark as Suspended</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
