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
            <h2>Account List</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Branch</th>
                            <th>Account</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Domain</th>
                            <th>Plan</th>
                            <th>Password</th>
                            <th>Nameserver</th>
                            <th>Operate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($member as $key => $value) { ?>
                            <tr>
                                <th><?php echo $key + 1; ?></th>
                                <td><?php echo $value["branch"]; ?></td>
                                <td><?php echo $value["account"]; ?></td>
                                <td><?php echo $value["username"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                                <td><?php echo implode(",", $value["domain"]); ?></td>
                                <td><?php echo $value["plan"]; ?></td>
                                <td><?php echo $value["password"]; ?></td>
                                <td><?php echo implode(",", $value["nameserver"]); ?></td>
                                <td style="width: 206px;">
                                    <a class="btn btn-default btn-xs" href="#" role="button"><?php echo $LANG['login']; ?></a>
                                    <button class="btn btn-default btn-xs" type="submit">View</button>
                                    <button class="btn btn-default btn-xs" type="submit">Active</button>
                                    <button class="btn btn-default btn-xs" type="submit">Disable</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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