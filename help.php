<?php
    define('IN_SYS', true);
    require_once ("core.php");
    $title = $title . ' - ' . $LANG['help'];
?>
<?php include ("include/header.php"); ?>

    <div class="container">
        <div class="page-header">
            <h1><?php echo $LANG['help']; ?></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2><?php echo $LANG['help']; ?></h2>
                <p>If you have any problems or have the need to contact us to ask a question, 
                you can use the <span>integrated support system</span> in your control panel to create a support ticket.</p>
                <p>We will reply to your question as soon as possible.</p>
                <p>For technical support please look at the <a href="mailto:&#100;&#111;&#117;&#100;&#111;&#117;&#100;&#122;&#106;&#64;&#115;&#105;&#110;&#97;&#46;&#99;&#111;&#109;" target="_blank">Email Support</a></p>
            </div>
        </div>
    </div>

<?php include ("include/footer.php"); ?>
