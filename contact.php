<?php
    define('IN_SYS', true);
    require_once ("core.php");
    $title = $title . ' - ' . $LANG['contact_us'];
?>
<?php include ("include/header.php"); ?>

    <div class="container">
        <div class="page-header">
            <h1><?php echo $LANG['contact_us']; ?></h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2>Contact</h2>
                <p>If you have any problems or have the need to contact us to ask a question, 
                you can use the <span>integrated support system</span> in your control panel to create a support ticket.</p>
                <p>We will reply to your question as soon as possible.</p>
                <p>For technical support please look at the <a href="http://byet.net" target="_blank">Knowledge Base</a></p>
            </div>
            <div class="col-sm-12 col-md-12">
                <h2><?php echo $LANG['address']; ?></h2>
                <p>Shanghai China.</p>
            </div>
            <div class="col-sm-12 col-md-12">
                <h2>Others</h2>
                <p class="alert alert-warning"><i class="glyphicon glyphicon-info-sign"></i> Crogram Inc.</p>
            </div>
        </div>
    </div>

<?php include ("include/footer.php"); ?>
