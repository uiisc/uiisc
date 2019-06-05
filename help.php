<?php
define('IN_SYS', true);
require_once "core.php";

$title = $title . ' - ' . I18N('help');

$questions = [
    [
        "title" => "What is bandwidth ?",
        "content" => 'Bandwidth is the amount of data your website can transfer per month, every month the bandwidth counter will reset.'
    ],
    [
        "title" => "How much files can I upload ?",
        "content" => "You're free to upload as much files as you want, but please be aware that the largest size for an individual file is limited to 10Mb."
    ],
    [
        "title" => "How can I upload files ?",
        "content" => 'You have two ways, the first one (recommanded), you can download a FTP client software, you will find recommanded free softwares to download on the "Free FTP Software" from the "Files" section on VistaPanel. The second way is to use our free "Online File Manager" on VistaPanel.'
    ],
    [
        "title" => "How can I use FTP ?",
        "content" => 'You can view our tutorial on how to setup and use FTP to manage your files <a href="http://tutorials.securesignup.net/premium-cpanel-hosting/file-management/via-ftp-2.html">here</a>.'
    ],
    [
        "title" => "Do you allow PHP and MySQL databases ?",
        "content" => 'Yes, we allow PHP and MySQL.'
    ],
    [
        "title" => "Do you offer PHPMyAdmin ?",
        "content" => 'Yes we do offer PHPMyAdmin.'
    ],
    [
        "title" => "What type of websites are not allowed to be hosted ?",
        "content" => 'Anything illegal, websites that contains copyrighted files (warez), adult content, spamming scripts, web proxies etc... For more information please read our TOS.'
    ],
    [
        "title" => "How do I report a website ?",
        "content" => 'We would really appreciate it, the best way is to open a ticket from VistaPanel, if not, you can email us at support@uiisc.com'
    ],
    [
        "title" => "How do I get support ?",
        "content" => 'To get technical support, open a ticket from VistaPanel, email us at support@5sidc.com or join our community forums'
    ],
    [
        "title" => "What details should I post when asking for support ?",
        "content" => "Don't post your account's password, including databases passwords! And just be specific."
    ]
]

?>
<?php include("include/header.php"); ?>

<div class="container">
    <div class="page-header">
        <h1><?php echo I18N('help'); ?></h1>
    </div>
</div>

<div class="container">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($questions as $key => $value) { ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-<?php echo $key; ?>">
                    <a class="panel-title<?php echo $key == 0 ? '' : ' collapsed'; ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#questions-<?php echo $key; ?>" aria-expanded="<?php echo $key == 0 ? 'true' : 'false'; ?>" aria-controls="questions-<?php echo $key; ?>">
                        <?php echo $key + 1; ?>.<?php echo $value["title"]; ?>
                    </a>
                </div>
                <div id="questions-<?php echo $key; ?>" class="panel-collapse collapse<?php echo $key == 0 ? ' in' : ''; ?>" role="tabpanel" aria-labelledby="heading-<?php echo $key; ?>">
                    <div class="panel-body">
                        <p><?php echo $value["content"]; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include "include/footer.php"; ?>