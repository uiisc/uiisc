<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>
<?php echo getMsg("msg_notify"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Check Domain</h3>
                </div>
                <div class="panel-body">
                    <h2>Check Domain</h2>
                    <form action="" method="POST">
                        <p>Verify the domain is available for registration</p>
                        <label>
                            <!-- <span>Account:</span> -->
                            <input type="text" name="domain" class="form-control" maxlength="50" placeholder="Enter a domain or sub-domain">
                        </label>
                        <button type="submit" name="do_check_domain" class="btn btn-primary">Verify domain</button>
                    </form>
                    <?php if ($message) { ?>
                        <hr />
                        <div class="alert <?php echo empty($message[0]) ? 'alert-danger' : 'alert-success'; ?>">
                            <p><?php echo $message[1]; ?></p>
                            <?php if (isset($message[2]) && ($message[2])) {
                                echo "<p>response data:</p><pre>";
                                print_r($message[2]);
                                echo "</pre>";
                            } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo setRouter('clientarea', 'forget_password'); ?>" class="btn btn-link"><?php echo $lang->I18N('password_lost'); ?></a>
                    <a href="<?php echo setRouter('clientarea', 'register'); ?>" class="btn btn-link">No account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>