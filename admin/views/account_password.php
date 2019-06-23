<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2>Account Password</h2>
            <form action="" method="POST">
                <!-- Reset Password -->
                <label>
                    <span>Account: <small>(It is the 8 characters)</small></span>
                    <input type="text" name="username" class="form-control" maxlength="8" placeholder="Account: (It is the 8 characters)">
                </label>
                <label>
                    <span>New Password:</span>
                    <input type="password" name="password" class="form-control" maxlength="35" placeholder="Password">
                </label>
                <button type="submit" name="do_set_password" class="btn btn-primary">Set Password</button>
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
    </div>
</div>