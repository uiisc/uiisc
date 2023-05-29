<div class="container-fluid" id='signup'>
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <form action="controllers/clients/signup.php" method="post" onsubmit="
                    var password = document.getElementById('password').value;
                    var cpassword = document.getElementById('cpassword').value;
                    if(password != cpassword){
                        alert('Password not match');
                        return false;
                    }
                    return true;
                ">
                    <h5 class="m-0 text-center"><?php echo $PageInfo['title'];?></h5>
                    <hr>
                    <div class="row">
                        <div class="col-6 px-5 mb-10">
                            <label class="form-label required"><?php echo $lang->I18N('First Name'); ?></label>
                            <input type="text" name="first" class="form-control" placeholder="First Name...">
                        </div>
                        <div class="col-6 px-5 mb-10">
                            <label class="form-label required"><?php echo $lang->I18N('Last Name'); ?></label>
                            <input type="text" name="last" class="form-control" placeholder="Last Name...">
                        </div>
                        <div class="col-md-12 px-5 mb-10">
                            <label class="form-label required"><?php echo $lang->I18N('Email Address'); ?></label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address...">
                        </div>
                        <div class="col-md-12 px-5 mb-10">
                            <label class="form-label required"><?php echo $lang->I18N('Password'); ?></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                        </div>
                        <div class="col-md-12 px-5 mb-10">
                            <label class="form-label required"><?php echo $lang->I18N('Confirm Password'); ?></label>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password...">
                        </div>
                          <div class="col-md-12 px-5 mb-10 d-grid">
                            <button class="btn btn-primary btn-block" name="signup"><?php echo $lang->I18N('Signup'); ?></button>
                        </div>
                    </div>
                </form>
                <div class="px-5 nav-links">
                    <a href="login.php"><?php echo $lang->I18N('login'); ?></a> or <a href="forgetpassword.php"><?php echo $lang->I18N('Reset Password'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
