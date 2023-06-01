<?php
if (!defined('IN_CRONLITE')) {
    exit;
}
?>

<div class="content-wrapper">
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="news.php?action=add" class="btn text-white btn-success btn-sm">
                <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
                <thead>
                    <th width="5%">ID</th>
                    <th><?php echo $lang->I18N('Title'); ?></th>
                    <th><?php echo $lang->I18N('Status'); ?></th>
                    <th style="width: 150px;"><?php echo $lang->I18N('Date'); ?></th>
                    <th><?php echo $lang->I18N('Action'); ?></th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td>#<?php echo $value['news_id']; ?></td>
                        <td><?php echo $value["news_subject"]; ?></td>
                        <td><?php echo $status_types[$value['news_status']]; ?></td>
                        <td style="width: 150px;"><?php echo $value["news_date"]; ?></td>
                        <td style="width: 150px;">
                            <a href="news.php?action=edit&id=<?php echo $value['news_id']; ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?></a>
                            <a href="news.php?action=view&id=<?php echo $value['news_id']; ?>" class="btn btn-sm btn-secondary mx-5 btn-rounded"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nothing found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <p class="pb-10"><?php echo $count; ?> Records Found, Page 1 of 1</p>
    </div>
</div>
</div>
