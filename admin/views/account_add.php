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
            <h2>Account Add</h2>
            <form action="" method="POST">
                <label>
                    <span>Account:</span>
                    <input type="text" name="username" value="" class="form-control" maxlength="8" placeholder="Account of 8 characters">
                </label>
                <label>
                    <span>Password:</span>
                    <input type="password" name="password" value="" class="form-control" maxlength="35" placeholder="Password">
                </label>
                <label>
                    <span>Domain or Sub-domain:</span>
                    <input type="text" name="domain" value="" class="form-control" maxlength="35" placeholder="example.com">
                </label>
                <label>
                    <span>Email Address:</span>
                    <input type="text" name="email" value="" class="form-control" maxlength="35" placeholder="email@example.com">
                </label>
                <label>
                    <span>Select a Hosting Plan:</span>
                    <select name="plan" class="form-control">
                        <?php foreach ($config['plan'] as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </label>
                <button type="submit" name="do_reg_account" class="btn btn-primary">Register Account</button>
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