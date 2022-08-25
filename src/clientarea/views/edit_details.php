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
                    <h3 class="panel-title">Edit Account Details</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="name" name="name" value="<?php echo ($user->name); ?>" class="form-control <?php echo (isset($err['name_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo ($err["name_err"]); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="username">Username: <sup>*</sup></label>
                            <input type="text" name="username" value="<?php echo ($user->username); ?>" class="form-control <?php echo (isset($err['username_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo ($err["username_err"]); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" value="<?php echo ($user->email); ?>" class="form-control <?php echo (isset($err['email_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo ($err["email_err"]); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="url">Your Website URL: <sup>*</sup></label>
                            <input type="text" name="website" value="<?php echo ($user->website); ?>" class="form-control <?php echo (isset($err['website_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo ($err["website_err"]); ?></span>
                        </div>
                        <div class="form-group" id="imageBox">
                            <img src="<?php echo $userAvatar; ?>" alt="" class="img-avatar img-responsive img-responsive img-circle img-thumbnail">
                            <a href="#" class="" id="uploadNewImage">Click here to upload</a>
                        </div>
                        <div class="form-group" id="imageUpload">
                            <label for="url">Upload Image: <sup>*</sup></label>
                            <input type="file" name="image" class="form-control <?php echo (isset($err['image_err'])) ? 'is-invalid' : ''; ?>">
                            <span class="text-warning"><?php echo ($err["image_err"]); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit" value="Update Now" class="btn btn-default">
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-right">
                    <a href="<?php echo setRouter('clientarea', 'change_password');?>">Wanna Change Password ?</a>
                    <a href="<?php echo setRouter('clientarea', 'details');?>">Go Back to Details</a>
                </div>
            </div>
        </div>
    </div>
</div>