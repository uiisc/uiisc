<?php
if (!defined('IN_CRONLITE')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="content-wrapper">
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">News Details #<?php echo $id; ?></h5>
            <div>
                <a href="news.php" class="btn btn-sm btn-danger">
                    <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
                </a>
                <a href="<?php echo setURL('admin/news', '', array('action' => 'edit', 'id' => $id)); ?>" class="btn btn-sm btn-success">
                    <i class="fa fa-edit"></i> <?php echo $lang->I18N('edit'); ?>
                </a>
                <a href="news.php?action=add" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                </a>
            </div>
        </div>
        <hr />

        <div class="mb-20">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                        <b>Subject:</b>
                        <span><?php echo $data['news_subject']; ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                        <b>Date:</b>
                        <span><?php echo $data['news_date']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card py-0">
        <div class="mx-10 py-15">
            <?php echo htmlspecialchars_decode($data['news_content']); ?>
        </div>
    </div>
</div>
</div>
