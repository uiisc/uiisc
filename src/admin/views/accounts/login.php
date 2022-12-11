<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">cPanel Login</h5>
            <a href="accounts.php?action=view&account_id=<?php echo $account_id; ?>" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>
        <hr>
        <div class="mb-15">
            <p>Now you are going to be redirected to the control panel. It can take upto 5 seconds based on your internet connecion speed.</p>
            <form name="login" action="https://<?php echo $HostingApi['api_cpanel_url'] ?>/login.php" id="account_ogin" method="post">
                <input type="hidden" name="uname" value="<?php echo $AccountInfo['account_username']; ?>">
                <input type="hidden" name="passwd" value="<?php echo $AccountInfo['account_password']; ?>">
                <input type="hidden" name="language" value="<?php echo $lang->get_language_value(); ?>">
                <div class="text-center">
                    <input type="submit" name="Submit" value="Click here to Redirect" class="btn btn-primary btn-sm text-white">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById('account_ogin').submit(); // SUBMIT FORM
</script>
