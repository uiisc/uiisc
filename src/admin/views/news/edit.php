<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="news.php"><?php echo $lang->I18N('News List'); ?></a></li>
            <li><a href="<?php echo setURL('admin/news', '', array('action' => 'view', 'id' => $id)); ?>"><?php echo $lang->I18N('details'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('edit'); ?></li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/news', '', array('action' => 'view', 'id' => $id)); ?>" class="btn btn-success btn-xs">
                        <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                    </a>
                    <a href="news.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                    <a href="news.php?action=list" class="btn btn-primary btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?> ID:<?php echo $id; ?></span>
            </div>
        <form action="controllers/news/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $news['news_id']; ?>">
            <div class="panel-body">
                <div class="row pb-20">
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $news['news_subject']; ?>" placeholder="news subject..." maxlength="255">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                            <?php foreach ($status_types as $key => $value): ?>
                                <option value="<?php echo $key; ?>" <?php echo $key == $news['news_status'] ? 'selected' : ''; ?> ><?php echo $value; ?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="content">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="10" maxlength="5000" placeholder="Enter news content..."><?php echo $news['news_content']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button name="submit" class="btn btn-sm btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
