<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<footer class="footer navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <div class="navbar-inner navbar-content-center" style="padding-top:15px;">
            <ul class="navbar-left list-inline text-center text-muted credit">
                <li>
                    <span class="co">&copy;&nbsp;2013 - <?php echo date("Y"); ?>&nbsp;<a href="<?php echo setRouter('index');?>"><?php echo $SiteConfig['site_brand']; ?></a>&nbsp;</span>
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
                <li><a href="<?php echo setRouter('about');?>"><?php echo $lang->I18N('about'); ?></a></li>
                <li><a href="<?php echo setRouter('contact');?>"><?php echo $lang->I18N('contact'); ?></a></li>
                <li><a href="<?php echo setRouter('news');?>"><?php echo $lang->I18N('News'); ?></a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="assets/jquery/jquery.min.js?_=<?php echo $static_release; ?>"></script>
<script src="assets/bootstrap/js/bootstrap.min.js?_=<?php echo $static_release; ?>"></script>
<script src="assets/js/common.js?_=<?php echo $static_release; ?>"></script>
<?php if (!empty($google_site_verification)) { include("google_analytics.php");} ?>

</body>

</html>