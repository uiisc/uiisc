<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require APP_ROOT . '/views/header.php';

?>

<div class="container" id="login">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 center-block" style="float: none;">
            <h1 class="page-header">UIISC</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
                </div>
                <form action="controllers/admin.php" method="post" onsubmit="
                    var password = document.getElementById('password').value;
                    var cpassword = document.getElementById('cpassword').value;
                    if(password != cpassword){
                        alert('Password not match');
                        return false;
                    }
                    return true;
                ">
                    <div class="panel-body">
                        <div class="mb-10">
                            <label class="form-label required">First Name</label>
                            <input type="text" name="first" class="form-control" placeholder="First Name...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Last Name</label>
                            <input type="text" name="last" class="form-control" placeholder="Last Name...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                        </div>
                        <div class="mb-10">
                            <label class="form-label required">Confirm Password</label>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password...">
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary btn-block" name="submit">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APP_ROOT . '/views/footer.php';?>
