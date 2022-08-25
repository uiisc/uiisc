<?php
if (!defined('IN_CRONLITE')) {
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
                    <h3 class="panel-title"><?php echo $lang->I18N('login'); ?></h3>
                </div>
                <div class="panel-body">
                    <?php if (!isAdminLoggedIn()) { ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username"><?php echo $lang->I18N('username'); ?>: <sup>*</sup></label>
                                <input type="text" name="username" class="form-control" maxlength="18" placeholder="<?php echo $lang->I18N('input_username'); ?>" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="password"><?php echo $lang->I18N('password'); ?>: <sup>*</sup></label>
                                <input type="password" name="password" class="form-control" maxlength="35" placeholder="<?php echo $lang->I18N('input_password'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="captcha">Captcha: <sup>*</sup></label>
                                <input type="text" name="captcha" class="form-control" maxlength="4" placeholder="CAPTCHA" required autocomplete="off" style="background-image: url(library/captcha.php);">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="do_login" class="btn btn-primary"><?php echo $lang->I18N('login'); ?></button>
                            </div>
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
                    <a href="<?php echo setRouter('admin', 'forget_password'); ?>"><?php echo $lang->I18N('password_lost'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>