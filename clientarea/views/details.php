<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php echo (getMsg("msg_notify")); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Details</h3>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <img src="<?php echo $userAvatar; ?>" class="img-avatar img-responsive img-responsive img-circle img-thumbnail">
                    </div>
                    <hr>
                    <div class="detail-text">
                        <label for="name"><strong>Name:</strong></label>
                        <span class="text-data"><?php echo ($user->name); ?></span>
                    </div>
                    <div class="detail-text">
                        <label for="name"><strong>Email:</strong></label>
                        <span class="text-data"><?php echo ($user->email); ?></span>
                    </div>
                    <div class="detail-text">
                        <label for="name"><strong>Username:</strong></label>
                        <span class="text-data"><?php echo ($user->username); ?></span>
                    </div>
                    <div class="detail-text">
                        <label for="name"><strong>Website:</strong></label>
                        <span class="text-data"><?php echo ($user->website); ?></span>
                    </div>
                    <hr />
                    <div class="detail-text">
                        <label for="name"><strong>Registration Date:</strong></label>
                        <span class="text-data"><?php echo $userRegDate; ?></span>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="" data-toggle="modal" data-target="#deactivate-account"><i class="glyphicon glyphicon-off"></i></a>
                    <a href="<?php echo setRouter('clientarea', 'edit_details'); ?>" class="pull-right"><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="deactivate-account" class="modal fade" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Deactivate Account</h4>
            </div>
            <div class="modal-body text-center">
                <p>Do you really want to deactivate your account?</p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo setRouter('clientarea', 'account_deactivation'); ?>" method="POST">
                    <input type="submit" value="Yes" class="btn btn-danger" name="deactivate">
                    <button type="button" class="btn btn-default" data-dismiss="modal"">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
