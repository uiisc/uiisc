<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/"><?php echo $lang->I18N('home'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('news'); ?></li>
    </ol>
    <!-- <div class="page-header">
        <h1><?php echo $lang->I18N('news'); ?></h1>
    </div> -->
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 150px;">Date</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($news["total"] && $news["list"]) {
                        foreach ($news["list"] as $key => $value) { ?>
                            <tr>
                                <td style="width: 150px;"><?php echo $value["news_date"]; ?></td>
                                <td><a href="<?php echo setRouter('news', '', array('action' => 'view', 'id' => $value['news_id'])); ?>"><?php echo $value["news_subject"]; ?></a></td>
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