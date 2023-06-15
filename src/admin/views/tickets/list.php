<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('home'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('Tickets List'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <!-- <a href="<?php echo setURL('admin/clients', '', array('action' => 'add')); ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a> -->
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>

            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Department</th>
                        <th>Client Email</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php if ($count > 0): ?>
                    <?php foreach ($rows as $value): ?>
                        <tr>
                            <td><?php echo $value['ticket_id']; ?></td>
                            <td><?php echo $value['ticket_subject']; ?></td>
                            <td><?php echo get_ticket_department($value['ticket_department']); ?></td>
                            <td><?php echo $value['ticket_email']; ?></td>
                            <td><?php echo $value['ticket_date']; ?></td>
                            <td><?php echo get_ticket_status_span($value['ticket_status']);
if ($value['ticket_status'] == '0') {
$btn = ['secondary', 'clock'];
} elseif ($value['ticket_status'] == '1') {
$btn = ['success', 'comment'];
} elseif ($value['ticket_status'] == '2') {
$btn = ['primary', 'comment'];
} elseif ($value['ticket_status'] == '3') {
$btn = ['danger', 'lock'];
}
?></td>
                            <td>
                                <a href="tickets.php?action=details&ticket_id=<?php echo $value['ticket_id']; ?>#reply" class="btn btn-primary btn-xs">
                                    <i class="fa fa-info-circle"></i> <?php echo $lang->I18N('details'); ?>
                                </a>
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
            <div class="panel-footer">
                <p class="pb-10"><?php echo $count; ?> Records Founds</p>
            </div>
        </div>
    </div>
</div>
