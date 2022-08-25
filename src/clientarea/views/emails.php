<?php
if (!defined('IN_CRONLITE')) {
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
                    <h3 class="panel-title">Email History</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">ID</th>
                                    <th style="width: 150px;">Date Sent</th>
                                    <th>Subject</th>
                                    <th style="width: 100px;">Operate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($emails["total"]) {
                                    foreach ($emails["list"] as $key => $value) { ?>
                                        <tr>
                                            <th style="width: 100px;"><?php echo $value["id"]; ?></th>
                                            <td style="width: 150px;"><?php echo $value["date"]; ?></td>
                                            <td><?php echo $value["subject"]; ?></td>
                                            <td style="width: 100px;">
                                                <button class="btn btn-info btn-xs" type="submit">View Message</button>
                                            </td>
                                        </tr>
                                    <?php }
                            } else { ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No Records Found</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <span><?php echo $emails["total"]; ?> Records Found, Page <?php echo $emails["page"]; ?> of <?php echo $emails["pages"]; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>