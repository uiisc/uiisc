<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2>Account Suspend</h2>
            <form action="" method="POST">
                <label>
                    <span>Account: <small>(It is the 8 characters)</small></span>
                    <input type="text" name="username" class="form-control" maxlength="8" placeholder="Account: (It is the 8 characters)">
                </label>
                <label>
                    <span>Reason for deactivation:</span>
                    <input type="text" name="reason" class="form-control" maxlength="60" placeholder="Reason or some message">
                </label>
                <button type="submit" name="do_disable_account" class="btn btn-primary">Save Settings</button>
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