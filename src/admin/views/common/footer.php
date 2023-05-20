    </div>
    <div id="hidden-area"><?php getMessage(); ?></div>

    <script src="<?php echo $site_url; ?>/assets/jquery/jquery.min.js"></script>
    <!-- <script src="<?php echo $site_url; ?>/assets/bootstrap/js/bootstrap.min.js?_=<?php echo $static_release; ?>"></script> -->
    <script src="<?php echo $site_url; ?>/assets/js/halfmoon.min.js"></script>
    <!-- <script src="<?php echo $site_url; ?>/assets/ui/js/main.min.js"></script> -->
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