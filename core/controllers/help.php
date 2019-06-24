<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../help.php");
    exit;
}

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
];
