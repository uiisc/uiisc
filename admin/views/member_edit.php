<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <?php echo getMsg("msg_notify"); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="panel-title">Edit Member</span>
            <div class="pull-right">
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member_details', ['id' => $member['id']]); ?>"><?php echo $lang->I18N('details'); ?></a>
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member_add'); ?>"><?php echo $lang->I18N('add'); ?></a>
                <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'member'); ?>"><?php echo $lang->I18N('list'); ?></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" name="name" value="<?php echo $member['name']; ?>" class="form-control <?php echo (isset($err['name_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="text-warning"><?php echo ($err["name_err"]); ?></span>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $member['username']; ?>" class="form-control <?php echo (isset($err['username_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="text-warning"><?php echo ($err["username_err"]); ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="<?php echo $member['email']; ?>" class="form-control <?php echo (isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="text-warning"><?php echo ($err["email_err"]); ?></span>
                </div>
                <div class="form-group">
                    <label for="url">Website</label>
                    <input type="text" name="website" value="<?php echo $member['website']; ?>" class="form-control <?php echo (isset($err['website_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="text-warning"><?php echo ($err["website_err"]); ?></span>
                </div>
                <div class="form-group" id="imageBox">
                    <img src="<?php echo $member_avatar; ?>" alt="" class="img-avatar img-responsive img-responsive img-circle img-thumbnail">
                    <a href="#" class="" id="uploadNewImage">Click here to upload</a>
                </div>
                <div class="form-group" id="imageUpload">
                    <label for="url">Upload Image</label>
                    <input type="file" name="image" class="form-control <?php echo (isset($err['image_err'])) ? 'is-invalid' : ''; ?>">
                    <span class="text-warning"><?php echo ($err["image_err"]); ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="edit" value="Update Now" class="btn btn-default">
                </div>
            </form>
        </div>
        <div class="panel-footer"></div>
    </div>
</div>