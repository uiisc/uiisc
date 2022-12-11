<?php

if (!defined('IN_CRONLITE')) {
    exit();
}

require __DIR__ . '/header.php';

?>

<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <h5 class="text-center my-0">Register Admin</h5><hr>
                <form action="function/Step2.php" method="post" onsubmit="
                    var password = document.getElementById('password').value;
                    var cpassword = document.getElementById('cpassword').value;
                    if(password != cpassword){
                        alert('Password not match');
                        return false;
                    }
                    return true;
                ">
                    <div class="row">
                        <div class="col-6 px-5 mb-10">
                            <label class="form-label required">First Name</label>
                            <input type="text" name="first" class="form-control" placeholder="First Name...">
                        </div>
                        <div class="col-6 px-5 mb-10">
                            <label class="form-label required">Last Name</label>
                            <input type="text" name="last" class="form-control" placeholder="Last Name...">
                        </div>
                        <div class="col-md-12 px-5 mb-10">
                            <label class="form-label required">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address...">
                        </div>
                        <div class="col-md-12 px-5 mb-10">
                            <label class="form-label required">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                        </div>
                        <div class="col-md-12 px-5 mb-10">
                            <label class="form-label required">Confirm Password</label>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password...">
                        </div>
                          <div class="col-md-12 px-5 mb-10 d-grid">
                            <button class="btn btn-primary btn-block" name="submit">Signup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/footer.php';?>
