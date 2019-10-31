<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../index.php");
    exit;
}
?>

<div class="container">
    <div class="page-header">
        <h1><?php echo $lang->I18N('news'); ?></h1>
    </div>
</div>

<div class="container">
    <?php echo (getMsg("msg_notify")); ?>
    <div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th style="width: 150px;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($news["total"] && $news["list"]) {
                        foreach ($news["list"] as $key => $value) { ?>
                            <tr>
                                <td><a href="<?php echo setRouter('news', '', ['id' => $value['id']]); ?>"><?php echo $value["title"]; ?></a></td>
                                <td style="width: 150px;"><?php echo cTime($value["date"]); ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="2" class="text-center">No Records Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <span><?php echo $news["total"]; ?> Records Found, Page <?php echo $news["page"]; ?> of <?php echo $news["pages"]; ?></span>
        </div>
    </div>
</div>