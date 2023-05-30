
<div class="container-fluid" id="login">
    <div class="row">
        <div class="m-auto" style="width: 400px;">
            <div class="card mx-30" style="opacity: 80%">
                <form action="controllers/profile/forgetpassword.php" method="post">
                    <h5 class="m-0 text-center">Forget Password</h5><hr>
                    <div class="mb-10">
                        <label class="form-label required">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Address...">
                    </div>
                      <div class="mb-10 d-grid">
                        <button class="btn btn-primary btn-block" name="reset">Reset Password</button>
                    </div>
                </form>
                <div class="nav-links">
                    <a href="login.php"><?php echo $lang->I18N('login'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>