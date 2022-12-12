<?php
if (!defined('IN_CRONLITE')) {
    exit();
}
?>

<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 px-5">
            <h5 class="m-0"><?php echo $lang->I18N('New SSL'); ?></h5>
            <a href="myssl.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr>
        <form action="controllers/myssl/new.php" method="post">
            <div class="row pb-20">
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Your Name'); ?></label>
                        <input type="text" name="name" value="<?php echo $ClientInfo['client_fname'] . ' ' . $ClientInfo['client_lname']; ?>" class="form-control disabled" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                        <input type="text" name="email" value="<?php echo $ClientInfo['client_email']; ?>" class="form-control disabled" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Company Name'); ?></label>
                        <input type="text" name="company" value="<?php echo $ClientInfo['client_company']; ?>" class="form-control disabled"  required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('Billing Address'); ?></label>
                        <input type="text" name="address" value="<?php echo $ClientInfo['client_address']; ?>" class="form-control disabled"  required readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required"><?php echo $lang->I18N('CSR Code'); ?></label>
                        <textarea name="csr" style="height: 250px" placeholder="Enter CSR Code..." class="form-control" required></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-sm btn-primary"><?php echo $lang->I18N('Request SSL'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>