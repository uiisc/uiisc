<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <ol class="breadcrumb page-breadcrumb">
        <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
        <li><a href="knowledgebase.php"><?php echo $lang->I18N('Knowledgebase'); ?></a></li>
        <li class="active"><?php echo $lang->I18N('add'); ?></li>
    </ol>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-right">
                <a href="knowledgebase.php" class="btn btn-primary btn-xs">
                    <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                </a>
            </div>
            <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
        </div>
        <form action="controllers/knowledgebase/add.php" method="post">
            <div class="panel-body">
                <div class="row pb-20">
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required" for="input_subject">Subject</label>
                            <input type="text" name="subject" id="input_subject" placeholder="knowledgebase subject..." class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <label class="form-label required">Content</label>
                            <textarea name="editor" id="content" placeholder="Enter ticket content..." class="form-control" style="height: 200px;"></textarea> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row pb-20">
                    <div class="col-md-12">
                        <div class="mb-10 px-10">
                            <button name="submit" class="btn btn-sm btn-primary">Create Knowledgebase</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>