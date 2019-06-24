<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../support.php");
    exit;
}
?>

<div class="container">
    <div class="page-header text-center">
        <h1><?php echo I18N('Technical Support'); ?></h1>
        <!-- <h3>24/7 Availability</h3> -->
    </div>
</div>

<div class="container">
    <p>If you have any problems or have the need to contact us to ask a question, you can contact us in the following ways:</p>
    <p><br /></p>
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="assets/images/tickets.jpg" alt="Tickets">
            <h3><?php echo I18N('Tickets'); ?></h3>
            <p>You can submit a support ticket from VistaPanel, we will reply you as soon as possible.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="assets/images/emails.jpg" alt="Emails">
            <h3><?php echo I18N('Emails'); ?></h3>
            <p>You can email us, but we use only the following email for technical support: <a>support@uiisc.com</a></p>
        </div>
        <div class="col-md-4 text-center">
            <img src="assets/images/forums.jpg" alt="Forums">
            <h3><?php echo I18N('forum'); ?></h3>
            <p>You can also join our <a href="<?php echo setRouter('forum'); ?>">community forums</a> if you want to interact with other users and get instant answers.</p>
        </div>
    </div>
</div>