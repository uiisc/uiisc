
<div class="content-wrapper">
<div class="container-fluid">
    <div class="card m-20 p-20">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="m-0">Client Information</h3>
            <a href="clients.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr />
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('First Name'); ?>:</b> <?php echo $ClientInfo['client_fname']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Last Name'); ?>:</b> <?php echo $ClientInfo['client_lname']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Email Address'); ?>:</b> <?php echo $ClientInfo['client_email']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Phone Number'); ?>:</b> <?php echo $ClientInfo['client_phone']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Billing Address'); ?>:</b> <?php echo $ClientInfo['client_address']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Company'); ?>:</b> <?php echo $ClientInfo['client_company']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Country'); ?>:</b> <?php echo $CountryName; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('City'); ?>:</b> <?php echo $ClientInfo['client_city']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b>Postal Code:</b> <?php echo $ClientInfo['client_pcode']; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('Hosting Accounts'); ?>:</b> <?php echo $count_account; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b><?php echo $lang->I18N('SSL Certificates'); ?>:</b> <?php echo $count_ssl; ?>
                </div>
                <div class="col-md-6 mb-10">
                    <b>Support Tickets:</b> <?php echo $count_tickets; ?>
                </div>
                <div class="col-md-12"><hr /></div>
                <div class="col-md-12 py-5">
                    <a href="clients.php?action=login&client_id=<?php echo $ClientInfo['client_id'] ?>" target="_blank" class="btn btn-primary">Login as <?php echo $ClientInfo['client_fname'] ?></a>
                    <?php if ($ClientInfo['client_status'] !== '1'): ?>
                    <a href="controllers/clients/activate.php?client_id=<?php echo $ClientInfo['client_id']; ?>" class="btn btn-success text-white">Mark as Active</a>
                    <?php else: ?>
                    <a href="controllers/clients/suspend.php?client_id=<?php echo $ClientInfo['client_id']; ?>" class="btn btn-secondary">Mark as Suspended</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
