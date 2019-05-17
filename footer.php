<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: index.php");
    exit;
}
?>

    <footer class="footer navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
                <ul class="navbar-left list-inline text-center text-muted credit">
                    <li>
                        <span class="co">&copy;&nbsp;2019 <a href="/index.php"><?=$title_s?></a>&nbsp;</span>
                        <span class="co">&nbsp;Powered by <a href="https://crogram.com" target="blank">Crogram</a>&nbsp;</span>
                        <span class="co">&nbsp;Partnered with <a href="https://ifastnet.com/" name="jump-ifastnet" target="blank">iFastNet</a>&nbsp;</span>
                    </li>
                </ul>
                <ul class="legal navbar-right list-inline text-center">
                    <li class="dropup">
                        <div class="dropdown-toggle" id="changelanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-globe"></span>
                            <a href="#"><?php echo $languages[$current_lang][0]; ?></a>
                        </div>
                        <ul class="dropdown-menu language-change" aria-labelledby="changelanguage">
                            <?php foreach ($languages as $key => $value) {
                                $actived = $key == $current_lang ? ' class="active"' : '';
                                echo '<li' .$actived . '><a class="language-change-click" data-language="' . $key . '" href="javascript://">' . $languages[$key][0] . '</a></li>';
                            }?>

                        </ul>
                    </li>
                    <li><a href="/contact.php"><?php echo $LANG['contact_us']; ?></a></li>
                    <li><a href="/help.php"><?php echo $LANG['help']; ?></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/js/common.js?_=<?php echo $static_release; ?>"></script>
    <script type="text/javascript">
        var domain = "<?php echo $lang->getDomain(); ?>";
        var cur_lang = "<?php echo $current_lang; ?>";
        function change_language(lang) {
            setCookie('lang', lang, 1, '/', domain, false);
            if (cur_lang == lang) {
                return;
            }
            <?php if (!$_POST) {?>document.location.reload();<?php }?>

        }
        $(".language-change-click").click(function (x) {
            change_language(x.target.dataset.language);
        })
        if (document.getElementsByName("jump-ifastnet").length) {
            document.getElementsByName("jump-ifastnet")[0].onclick = function (x) {
                jumpLink("https://ifastnet.com/portal/aff.php?aff=" + ifastnet_aff, null, "_target");
                x.preventDefault();
                x.stopPropagation();
            };
        }
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-28162642-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-28162642-10');
    </script> -->
