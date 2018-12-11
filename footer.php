<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: index.php");
    exit;
}
?>

    <footer class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
                <ul class="navbar-left list-inline text-center text-muted credit">
                    <li>
                        <span>&copy;&nbsp;2018 <a href="/index.php"><?=$title_s?></a>&nbsp;</span>
                        <span>&nbsp;Powered by <a href="https://crogram.com" target="blank">Crogram</a>&nbsp;</span>
                        <span>&nbsp;Partnered with <a href="https://ifastnet.com/portal/aff.php?aff=19474" target="blank">iFastNet</a>&nbsp;</span>
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
                                echo '<li><a class="language-change-click" data-language="' .$key. '" href="javascript://">' .$languages[$key][0]. '</a></li>';
                            }?>

                        </ul>
                    </li>
                    <li><a href="/contact.php"><?php echo $LANG['contact_us']; ?></a></li>
                    <li><a href="/help.php"><?php echo $LANG['help']; ?></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/common.js?_=<?php echo $static_release; ?>"></script>
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
    </script>
