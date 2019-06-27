<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../admin.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-10 margin-auto">
            <?php echo (getMsg("msg_notify")); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">News Add</span>
                    <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('admin', 'news'); ?>"><?php echo I18N('list'); ?></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="title">Title: <sup>*</sup></label>
                            <input type="text" name="title" id="title" value="<?php echo ($data['title']); ?>" class="form-control <?php echo (isset($err['title_err'])) ? 'is-invalid' : ''; ?>" maxlength="100" placeholder="Title">
                            <span class="text-warning"><?php echo isset($err["title_err"]) ? $err["title_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="content">Content: <sup>*</sup></label>
                            <textarea name="content" id="content" value="<?php echo ($data['content']); ?>" class="form-control <?php echo (isset($err['content_err'])) ? 'is-invalid' : ''; ?>" rows="10" maxlength="5000" placeholder="Content"></textarea>
                            <span class="text-warning"><?php echo isset($err["content_err"]) ? $err["content_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: <sup>*</sup></label>
                            <select name="status" id="status" class="form-control <?php echo (isset($err['status_err'])) ? 'is-invalid' : ''; ?>">
                                <?php foreach ($status_types as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-warning"><?php echo isset($err["status_err"]) ? $err["status_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="do_add_news" class="btn btn-primary"><?php echo I18N('add'); ?></button>
                        </div>
                    </form>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>