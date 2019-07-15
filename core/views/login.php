<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../login.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 margin-auto">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $lang->I18N('please_login'); ?></h3>
                </div>
                <div class="panel-body">
                    <form class="form-group form-horizontal form-account" role="form" action="//cpanel.<?= $domain ?>/login.php" method="post" name="login">
                        <div class="form-group">
                            <input type="text" name="uname" class="form-control" placeholder="<?php echo $lang->I18N('input_username'); ?>" required autofocus autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwd" class="form-control" placeholder="<?php echo $lang->I18N('input_password'); ?>" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="language" id="inputLanguage">
                                <option disabled><?php echo $lang->I18N('choose_from_below'); ?></option>
                                <?php echo $lang->get_languages_options(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"><span><?php echo $lang->I18N('remember_me'); ?></span>
                                    <a href="//cpanel.<?= $domain ?>/lostpassword.php"><?php echo $lang->I18N('lost_password'); ?></a>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-block"><?php echo $lang->I18N('login'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
        var domain = "<?php echo getDomain(); ?>";
        var cur_language = "<?php echo $lang->language_current; ?>";
        function change_language(lan) {
            setCookie('lang', lan, 1, '/', domain, false);
            if (cur_language == lan) {
                return;
            }
            <?php if (!$_POST) { ?>document.location.reload();<?php } ?>

        }
        $(".language-change-click").click(function (x) {
            change_language(x.target.dataset.language);
        })
    </script> -->