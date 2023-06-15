
    <footer class="footer navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
                <ul class="navbar-left list-inline text-center text-muted credit">
                    <li>
                        <span class="co">&copy;&nbsp;2013-<?php echo date("Y"); ?>&nbsp;<a href="<?php echo $site_url; ?>" target="_blank"><?php echo $SiteConfig['site_brand']; ?></a>&nbsp;</span>
                        <span class="co">&nbsp;Powered by <a href="https://crogram.org" target="_blank">Crogram</a>&nbsp;</span>
                        <span class="co">&nbsp;Partnered with <a href="https://ifastnet.com/" name="jump-ifastnet" target="_blank">iFastNet</a>&nbsp;</span>
                        <span>time: <?php echo get_execution_time();?>s</span>
                    </li>
                </ul>
                <ul class="legal navbar-right list-inline text-center">
                    <li class="dropup">
                        <div class="dropdown-toggle" id="changelanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fa fa-language"></span>
                            <a href="#"><?php echo $lang->get_language_name(); ?></a>
                        </div>
                        <ul class="dropdown-menu language-change"><?php echo $lang->get_languages_tags(); ?></ul>
                    </li>
                    <li><a href="<?php echo $site_url; ?>/about.php" target="_blank"><?php echo $lang->I18N('about'); ?></a></li>
                    <li><a href="<?php echo $site_url; ?>/contact.php" target="_blank"><?php echo $lang->I18N('contact'); ?></a></li>
                    <li><a href="<?php echo $site_url; ?>/news.php" target="_blank"><?php echo $lang->I18N('News'); ?></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <div id="hidden-area"><?php getMessage(); ?></div>

    <script src="<?php echo $site_url; ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?php echo $site_url; ?>/assets/bootstrap/js/bootstrap.min.js?_=<?php echo $static_release; ?>"></script>
    <script src="//cdn.staticfile.org/layer/3.1.1/layer.js"></script>

    <script src="<?php echo $site_url; ?>/assets/js/common.js"></script>

    <?php if (!empty($load_editor)): ?>

    <script src="<?php echo $site_url; ?>/assets/nicedit/nicedit.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function(){
            new nicEditor({
                iconsPath : '<?php echo $site_url; ?>/assets/nicedit/nicEditorIcons.gif'
            }).panelInstance('content');
        });
    </script>
    <?php endif; ?>

    </body>
</html>