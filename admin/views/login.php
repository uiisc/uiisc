<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 margin-auto">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo I18N('login'); ?></h3>
                </div>
                <div class="panel-body">
                    <?php if (!isAdminLoggedIn()) { ?>
                        <form action="" method="POST" class="form-horizontal">
                            <label>
                                <span>Admin:</span>
                                <input type="text" name="username" class="form-control" maxlength="18" placeholder="Username" autofocus required>
                            </label>
                            <label>
                                <span><?php echo I18N('password'); ?>:</span>
                                <input type="password" name="password" class="form-control" maxlength="35" placeholder="<?php echo I18N('password'); ?>" required>
                            </label>
                            <label>
                                <span>Captcha:</span>
                                <input type="text" name="captcha" class="form-control" maxlength="18" placeholder="CAPTCHA" required autocomplete="off" style="background-image: url(library/captcha.php);">
                            </label>
                            <button type="submit" name="do_login" class="btn btn-primary"><?php echo I18N('login'); ?></button>
                        </form>
                    <?php } elseif (isAdminLoggedIn() && !isset($message[0])) { ?>
                        <div class="alert alert-success">You have logged in</div>
                    <?php } ?>
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
                <div class="panel-footer text-right">
                    <a href="<?php echo setRouter('admin', 'forget_password'); ?>">Forget Passsword?</a>
                </div>
            </div>
        </div>
    </div>
</div>