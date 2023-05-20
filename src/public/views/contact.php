<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<div class="container">
    <div class="page-header">
        <h1><?php echo $lang->I18N('Contact Us'); ?></h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <p>If you have any problems or have the need to contact us to ask a question,
                you can use the <span>integrated support system</span> in your control panel to create a support ticket.</p>
            <p>We will reply to your question as soon as possible.</p>
        </div>
        <div class="col-sm-12 col-md-12">
            <table class="table table-bordered">
                <tr>
                    <td style="width: 100px;"><label><?php echo $lang->I18N('Company'); ?></label></td>
                    <td><?php echo $SiteConfig['site_company']; ?></td>
                </tr>
                <tr>
                    <td><label><?php echo $lang->I18N('address'); ?></label></td>
                    <td>Shanghai China.</td>
                </tr>
                <tr>
                    <td><label><?php echo $lang->I18N('Phone'); ?></label></td>
                    <td><?php echo $SiteConfig['site_phone']; ?></td>
                </tr>
                <tr>
                    <td><label><?php echo $lang->I18N('email'); ?></label></td>
                    <td><?php echo $SiteConfig['site_email']; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-12 col-md-12">
            <h2><?php echo $lang->I18N('Knowledge Base'); ?></h2>
            <div class="alert alert-info">
                <!-- <i class="glyphicon glyphicon-info-sign"></i> -->
                <p>For technical support please look at the <a href="http://byet.net" target="_blank">Knowledge Base</a></p>
            </div>
        </div>
    </div>
</div>
