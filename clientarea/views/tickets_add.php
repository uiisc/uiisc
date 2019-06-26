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
                    <a class="btn btn-default btn-xs pull-right" href="<?php echo setRouter('clientarea', 'tickets'); ?>">Tickets List</a>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="ticket-type">Type: <sup>*</sup></label>
                            <select name="ticket-type" id="ticket-title" class="form-control <?php echo (isset($err['ticket_type_err'])) ? 'is-invalid' : ''; ?>">
                                <?php foreach ($ticket_types as $key => $value) {?>
                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php }?>
                            </select>
                            <span class="text-warning"><?php echo isset($err["ticket_type_err"]) ? $err["ticket_type_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="ticket-title">Title: <sup>*</sup></label>
                            <input type="text" name="title" id="ticket-title" value="<?php echo ($data['title']); ?>" class="form-control <?php echo (isset($err['content_err'])) ? 'is-invalid' : ''; ?>" placeholder="Title">
                            <span class="text-warning"><?php echo isset($err["title_err"]) ? $err["title_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Content: <sup>*</sup></label>
                            <textarea name="content" id="ticket-content" value="<?php echo ($data['content']); ?>" class="form-control <?php echo (isset($err['content_err'])) ? 'is-invalid' : ''; ?>" rows="10" maxlength="5000" placeholder="Content"></textarea>
                            <span class="text-warning"><?php echo isset($err["content_err"]) ? $err["content_err"] : ""; ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="do_add_tickets" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>