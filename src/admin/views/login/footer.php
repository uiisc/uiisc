
    <footer class="footer navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
                <ul class="navbar-left list-inline text-center text-muted credit">
                    <li>
                        <span class="co">&copy;&nbsp;2013-<?php echo date("Y"); ?>&nbsp;<a href="<?php echo $site_url; ?>" target="_blank"><?php echo $SiteConfig['site_brand']; ?></a>&nbsp;</span>
                        <span class="co">&nbsp;Powered by <a href="https://crogram.org" target="_blank">Crogram</a>&nbsp;</span>
                    </li>
                </ul>
                <ul class="legal navbar-right list-inline text-center">
                    <li><a href="<?php echo $site_url; ?>" target="_blank"><?php echo $lang->I18N('home'); ?></a></li>
                    <li><a href="<?php echo $site_url; ?>/about.php" target="_blank"><?php echo $lang->I18N('about'); ?></a></li>
                    <li>
                        <a href="#" aria-hidden="true"><i id="theme-selector"></i></a>
                        <script type="text/javascript">
                            var sel = document.getElementById('theme-selector');
                            sel.className = getThemeClasses(getTheme());
                            sel.onclick = themeSelectorClicked;
                        </script>
                    </li>
                    <li class="dropup">
                        <div class="dropdown-toggle" id="changelanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-language"></span>
                            <a href="#"><?php echo $lang->get_language_name(); ?></a>
                        </div>
                        <ul class="dropdown-menu language-change"><?php echo $lang->get_languages_tags(); ?></ul>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <div id="hidden-area"><?php getMessage(); ?></div>

    <script src="<?php echo $site_url; ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?php echo $site_url; ?>/assets/bootstrap/js/bootstrap.min.js?_=<?php echo $static_release; ?>"></script>
    <script src="<?php echo $site_url; ?>/assets/layer/layer.js"></script>
    <script src="<?php echo $site_url; ?>/assets/js/common.js"></script>
</body>
</html>