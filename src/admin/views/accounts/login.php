<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="m-0"><?php echo $lang->I18N('Login to Control Panel'); ?></h3>
            </div>
            <hr />
            <div class="card-body">
                <p>Now you are going to be redirected to the control panel. It can take upto 5 seconds based on your internet connecion speed.</p>
                <form name="login" action="https://<?php echo $HostingApi['api_cpanel_url'] ?>/login.php" id="account_ogin" method="post">
                    <input type="hidden" name="uname" value="<?php echo $AccountInfo['account_username']; ?>">
                    <input type="hidden" name="passwd" value="<?php echo $AccountInfo['account_password']; ?>">
                    <input type="hidden" name="language" value="<?php echo $lang->get_language_value(); ?>">
                    <div class="text-center">
                        <a class="btn btn-danger btn-sm" href="accounts.php?action=view&account_id=<?php echo $account_id; ?>">
                            <i class="fa fa-backward"></i> <?php echo $lang->I18N('cancel'); ?>
                        </a>
                        <input type="submit" name="Submit" value="Click here to Redirect" class="btn btn-primary btn-sm text-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // document.getElementById('account_ogin').submit(); // SUBMIT FORM
</script>
