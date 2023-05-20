
<div class="content-wrapper">
<div class="container-fluid" id="login">
    <div class="row">
        <div class="col-md-6 col-md-offset-2 col-lg-4 offset-lg-4">
            <div class="card mx-30" style="opacity: 80%">
                <form action="controllers/profile/resetpassword.php" method="post" onsubmit="
                    var password = document.getElementById('password').value;
                    var cpassword = document.getElementById('cpassword').value;
                    if(password != cpassword){
                        alert('Password not match');
                        return false;
                    }
                    return true;
                ">
                    <h5 class="m-0 text-center">Reset Password</h5><hr>
                    <div class="mb-10">
                        <label class="form-label required">Reset Token</label>
                        <input type="text" name="token" class="form-control" placeholder="Eeset token here...">
                    </div>
                    <div class="mb-10">
                        <label class="form-label required">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password...">
                    </div>
                    <div class="mb-20">
                        <label class="form-label required">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password...">
                    </div>
                    <div class="mb-10 d-grid">
                        <button class="btn btn-primary btn-block" name="reset">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
