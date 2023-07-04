<div class="container" id="login">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
            <form id="form-login" onsubmit="return loginSubmit()" method="post">
                <h3 class="m-0 text-center"><?php echo $lang->I18N('login'); ?></h3>
                <hr />
                <div class="form-group mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('email'); ?></label>
                    <input type="email" name="email" class="form-control" placeholder="<?php echo $lang->I18N('input_email'); ?>">
                </div>
                <div class="form-group mb-10">
                    <label class="form-label required"><?php echo $lang->I18N('password'); ?></label>
                    <input type="password" name="password" class="form-control" placeholder="<?php echo $lang->I18N('input_password'); ?>">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" value="1" id="remember-my-information">
                    <label for="remember-my-information"><?php echo $lang->I18N('Remember Me'); ?></label>
                </div>
                <div class="mb-10 d-grid">
                    <button class="btn btn-primary btn-block" name="login"><?php echo $lang->I18N('login'); ?></button>
                </div>
            </form>
            <div class="nav-links">
                <a href="forgetpassword.php"><?php echo $lang->I18N('Forgot Password ?'); ?></a>
            </div>
        </div>
    </div>
</div>

<script>
    function loginSubmit() {
        var ii = layer.load(2);
        $.ajax({
            type: 'POST',
            url: 'api/login.php',
            data: $("#form-login").serialize(),
            dataType: 'json',
            success: function(data) {
                layer.close(ii);
                if (data.code == 0) {
                    layer.alert(data.msg, {
                        icon: 1,
                        closeBtn: false
                    }, function() {
                        window.location.href = 'index.php';
                    });
                } else {
                    layer.alert(data.msg, {
                        icon: 2
                    });
                }
            },
            error: function(data) {
                layer.close(ii);
                layer.msg('服务器错误');
            }
        });
        return false;
    }
</script>
