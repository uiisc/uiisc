<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo getMsg("msg_notify"); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Hosting Account Management System</h3>
                </div>
                <div class="panel-body">
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
                </div>
                <div class="panel-footer">
                    <a href="<?php echo setRouter('clientarea', 'forget_password'); ?>" class="btn btn-link">Forget Passsword?</a>
                    <a href="<?php echo setRouter('clientarea', 'register'); ?>" class="btn btn-link">No account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>