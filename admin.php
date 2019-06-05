<?php
// ini_set("display_errors", false);

define("IN_SYS", true);
require_once("core.php");

// $INDEX = __FILE__;

include_once "{$ROOT}/include/common.php";
include_once "{$ROOT}/lib/api.php";
include_once "{$ROOT}/controllers/admin.php";
getVersion();

if (!file_exists("{$ROOT}/data/installed") || !isset($config) || $config['apiUsername'] == '#getUsername#' || $config['apiPassword'] == '#getPassword#') {
    header('Location: ./install.php');
}

?>

<?php include("include/admin_header.php"); ?>

<?php if (file_exists("{$ROOT}/install.php")) { ?>
    <div class="container">
        <div class="alert alert-dismissible alert-danger">Please delete the <b>install.php</b> file.</div>
    </div>
<?php } ?>

<div class="container">
    <?php if ($is_admin) { ?>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" href="admin.php?s=check_domain" role="button">Check Domain</a>
                <a class="btn btn-default" href="admin.php?s=account_list" role="button">List</a>
                <a class="btn btn-default" href="admin.php?s=account_add" role="button">Add</a>
                <a class="btn btn-default" href="admin.php?s=account_password" role="button">Password</a>
                <a class="btn btn-default" href="admin.php?s=account_disable" role="button">Suspend</a>
                <a class="btn btn-default" href="admin.php?s=account_active" role="button">Activate</a>
                <a class="btn btn-default" href="admin.php?s=account_status" role="button">Status</a>
                <a class="btn btn-default" href="admin.php?s=account_domain" role="button">Domains</a>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php if ($section == 'main') { ?>
                <h1>Hosting Account Management System</h1>
                <p class="lead">This is a simple script for WHM myownfreehost made to manage hosting accounts through the api assigned to users with free reseller accounts.</p>
                <b>Available Functions:</b>
                <ol>
                    <li>Verify if a domain is available.</li>
                    <li>Creation of account hosting from the panel.</li>
                    <li>Change password to hosting account.</li>
                    <li>Deactivate or disable a hosting account.</li>
                    <li>Activate or enable hosting account.</li>
                    <li>Verify how many domain and state of the hosting account.</li>
                </ol>
            <?php } else { ?>
                <h2><?php echo $section_title; ?></h2>
                <?php if ($section == 'check_domain') { ?>
                    <form action="" method="POST">
                        <p>Verify the domain is available for registration</p>
                        <label>
                            <!-- <span>Account:</span> -->
                            <input type="text" name="domain" class="form-control" maxlength="50" placeholder="Enter a domain or sub-domain">
                        </label>
                        <button type="submit" name="do_check_domain" class="btn btn-primary">Verify domain</button>
                    </form>
                <?php } elseif ($section == 'account_list') {; ?>
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
                <?php } elseif ($section == 'account_add') {; ?>
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
                <?php } elseif ($section == 'account_password') {; ?>
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
                <?php } elseif ($section == 'account_disable') {; ?>
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
                <?php } elseif ($section == 'account_active') {; ?>
                    <form action="" method="POST">
                        <label>
                            <span>Account: <small>(It is the 8 characters)</small></span>
                            <input type="text" name="username" class="form-control" maxlength="8" placeholder="Account: (It is the 8 characters)">
                        </label>
                        <button type="submit" name="do_activate_account" class="btn btn-primary">Save Settings</button>
                    </form>
                <?php } elseif ($section == 'account_status') {; ?>
                    <form action="" method="POST">
                        <label>
                            <span>VistaPanel Username: <small>(Example: uii_12345678)</small></span>
                            <input type="text" name="username" class="form-control" maxlength="18" placeholder="VPanel Username (Example: uii_12345678)">
                        </label>
                        <button type="submit" name="do_check_status" class="btn btn-primary">Check Status</button>
                    </form>
                <?php } elseif ($section == 'account_domain') {; ?>
                    <form action="" method="POST">
                        <label>
                            <span>VistaPanel Username: <small>(Example: uii_12345678)</small></span>
                            <input type="text" name="username" class="form-control" maxlength="18" placeholder="VPanel Username (Example: uii_12345678)">
                        </label>
                        <button type="submit" name="do_get_domains" class="btn btn-primary">View Domain</button>
                    </form>
                <?php } elseif ($section == 'login') {; ?>
                    <?php if (!$is_admin) { ?>
                        <form action="" method="POST" class="form-horizontal">
                            <label>
                                <span>Admin:</span>
                                <input type="text" name="username" class="form-control" maxlength="18" placeholder="Admin Username" autofocus required>
                            </label>
                            <label>
                                <span>Password:</span>
                                <input type="password" name="password" class="form-control" maxlength="35" placeholder="Admin Password" required>
                            </label>
                            <label>
                                <span>Captcha:</span>
                                <input type="text" name="captcha" class="form-control" maxlength="18" placeholder="CAPTCHA" required autocomplete="off">
                            </label>
                            <button type="submit" name="do_login" class="btn btn-primary"><?php echo $LANG['login']; ?></button>
                        </form>
                    <?php } elseif ($is_admin && !isset($message[0])) { ?>
                        <div class="alert alert-success">You have logged in</div>
                    <?php } ?>
                <?php }
            if ($message) { ?>
                    <hr/>
                    <div class="alert <?php echo empty($message[0]) ? 'alert-danger' : 'alert-success'; ?>">
                        <p><?php echo $message[1]; ?></p>
                        <?php if (isset($message[2]) && ($message[2])) {
                            echo "<p>response data:</p><pre>";
                            print_r($message[2]);
                            echo "</pre>";
                        } ?>
                    </div>
                <?php }
        } ?>
        </div>
    </div>
</div>

<?php include("include/admin_footer.php"); ?>