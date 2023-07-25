<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>

<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="news.php"><?php echo $lang->I18N('News List'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('add'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="news.php" class="btn btn-primary btn-xs">
                    <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>

        <form action="controllers/news/add.php" method="post">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="news subject..." maxlength="255">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <?php foreach ($status_types as $key => $value): ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="content">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="10" maxlength="5000" placeholder="Enter news content..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button name="submit" class="btn btn-sm btn-primary">Create News</button>
            </div>
        </form>
    </div>
</div>