<?php
if (!defined('IN_SYS')) {
    // exit('禁止访问');
    header("Location: ../../clientarea.php");
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo (getMsg("msg_notify")); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">Tickets Add</span>
                    <div class="pull-right">
                        <a class="btn btn-default btn-xs" href="<?php echo setRouter('clientarea', 'tickets'); ?>"><?php echo I18N('add'); ?></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="department">Type: <sup>*</sup></label>
                            <select name="department" id="department" class="form-control <?php echo (isset($err['department_err'])) ? 'is-invalid' : ''; ?>">
                                <?php foreach ($ticket_types as $key => $value) { ?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                            <span class="text-warning"><?php echo isset($err["ticket_type_err"]) ? $err["ticket_type_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject: <sup>*</sup></label>
                            <input type="text" name="subject" id="subject" value="<?php echo ($data['subject']); ?>" class="form-control <?php echo (isset($err['subject_err'])) ? 'is-invalid' : ''; ?>" placeholder="Subject">
                            <span class="text-warning"><?php echo isset($err["subject_err"]) ? $err["subject_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="content">Content: <sup>*</sup></label>
                            <textarea name="content" id="content" value="<?php echo ($data['content']); ?>" class="form-control <?php echo (isset($err['content_err'])) ? 'is-invalid' : ''; ?>" rows="10" maxlength="5000" placeholder="Content"></textarea>
                            <span class="text-warning"><?php echo isset($err["content_err"]) ? $err["content_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="do_add_tickets" class="btn btn-primary"><?php echo I18N('add'); ?></button>
                        </div>
                    </form>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>