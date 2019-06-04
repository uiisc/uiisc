<?php
  define('IN_SYS', true);
  require_once ("core.php");
  $title = $title . ' - ' . $LANG['login'];
?>
<?php include ("include/header.php"); ?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $LANG['please_login']; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-group form-horizontal form-account" role="form" action="//cpanel.<?=$domain?>/login.php" method="post" name="login">
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="<?php echo $LANG['input_username']; ?>" required autofocus autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="passwd" class="form-control" placeholder="<?php echo $LANG['input_password']; ?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="language" id="inputLanguage">
                            <option disabled><?php echo $LANG['choose_from_below']; ?></option>
                            <?php foreach ($languages as $key => $value) {
                                $selected = $key == $current_lang ? 'selected="selected"' : '';
                                echo '<option value="' .$languages[$key][1]. '" ' .$selected . '>' .$languages[$key][0]. '</option>';
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"><span><?php echo $LANG['remember_me']; ?></span>
                                <a href="//cpanel.<?=$domain?>/lostpassword.php"><?php echo $LANG['lost_password']; ?></a>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block"><?php echo $LANG['login']; ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript">
        var domain = "<?php echo $lang->getDomain(); ?>";
        var cur_language = "<?php echo $current_lang; ?>";
        function change_language(lan) {
            setCookie('lang', lan, 1, '/', domain, false);
            if (cur_language == lan) {
                return;
            }
            <?php if (!$_POST) {?>document.location.reload();<?php }?>

        }
        $(".language-change-click").click(function (x) {
            change_language(x.target.dataset.language);
        })
    </script> -->
<?php include ("include/footer.php"); ?>