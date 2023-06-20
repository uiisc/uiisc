<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li><a href="knowledgebase.php"><?php echo $lang->I18N('Knowledgebase'); ?></a></li>
            <li><a href="knowledgebase.php?action=details&id=<?php echo $id; ?>"><?php echo $lang->I18N('details'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('edit'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="knowledgebase.php?action=details&id=<?php echo $id; ?>" class="btn btn-success btn-xs"><i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?></a>
                    <a href="knowledgebase.php?action=add" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?></a>
                    <a href="knowledgebase.php" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?></a>
                </div>
                <div class="panel-title">
                    <?php echo $PageInfo['title']; ?> <span class="label label-default"> ID <?php echo $id; ?></span>
                </div>
            </div>

            <form action="controllers/knowledgebase/edit.php" method="post">
                <div class="panel-body">
                    <div class="row pb-20">
                        <div class="col-md-12">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Knowledgebase Subject</label>
                                <input type="text" name="subject" placeholder="<?php echo $lang->I18N('Enter knowledgebase subject'); ?>" value="<?php echo $Knowledgebase['knowledgebase_subject']; ?>" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="col-md-12">
                            <div class="mb-10 px-10">
                                <label class="form-label required">Knowledgebase Content</label>
                                <textarea name="editor" id="content" placeholder="<?php echo $lang->I18N('Enter Knowledgebase Content'); ?>" class="form-control" style="height: 200px;"><?php echo $Knowledgebase['knowledgebase_content']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-10 px-10">
                                <button name="submit" class="btn btn-sm btn-primary"><?php echo $lang->I18N('Save'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>