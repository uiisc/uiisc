<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang->I18N('login'); ?></h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username"><?php echo $lang->I18N('username'); ?>: <sup>*</sup></label>
                            <input type="text" name="username" id="username" placeholder="<?php echo $lang->I18N('input_username'); ?>" autofocus value="<?php echo ($data['username']); ?>" class="form-control <?php echo (isset($err['username_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo isset($err["username_err"]) ? $err["username_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password"><?php echo $lang->I18N('password'); ?>: <sup>*</sup></label>
                            <input type="password" name="password" id="password" placeholder="<?php echo $lang->I18N('input_password'); ?>" value="<?php echo ($data['password']); ?>" class="form-control <?php echo (isset($err['password_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo isset($err["password_err"]) ? $err["password_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary"><?php echo $lang->I18N('login'); ?></button>
                            <label class="form-check-label text-primary"><input type="checkbox" class="form-check-input" name="remember-me"> Remember Me</label>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo setRouter('clientarea', 'forget_password');?>" class="btn btn-link"><?php echo $lang->I18N('password_lost'); ?></a>
                    <a href="<?php echo setRouter('clientarea', 'register');?>" class="btn btn-link">No account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
