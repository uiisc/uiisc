
        </div><!-- col-sm-9 col-md-9 col-lg-10 end -->
    </div><!-- row page-wrapper end -->
</div><!-- container-fluid end -->

<div id="hidden-area"><?php getMessage(); ?></div>

<script src="<?php echo $site_cdnpublic; ?>jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo $site_cdnpublic; ?>twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo $site_url; ?>/assets/layer/layer.js"></script>
<script src="<?php echo $site_url; ?>/assets/js/common.js?_=<?php echo $static_release; ?>"></script>
<script src="<?php echo $site_url; ?>/assets/js/admin.js?_=<?php echo $static_release; ?>"></script>

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
