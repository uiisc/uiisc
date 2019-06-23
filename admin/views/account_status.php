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
            <h2>Account Status</h2>
            <form action="" method="POST">
                <label>
                    <span>VistaPanel Username: <small>(Example: uii_12345678)</small></span>
                    <input type="text" name="username" class="form-control" maxlength="18" placeholder="VPanel Username (Example: uii_12345678)">
                </label>
                <button type="submit" name="do_check_status" class="btn btn-primary">Check Status</button>
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