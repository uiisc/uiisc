<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('home'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('Tickets List'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="<?php echo setURL('admin/tickets', '', array('action' => 'add')); ?>" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>

                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?></span>
            </div>

            <div class="table-responsive">
                <table class="table table-stripped table-bordered table-hover">
                    <thead>
                        <th>ID</th>
                        <th><?php echo $lang->I18N('Subject'); ?></th>
                        <th><?php echo $lang->I18N('Department'); ?></th>
                        <th><?php echo $lang->I18N('Client Email'); ?></th>
                        <th><?php echo $lang->I18N('Date'); ?></th>
                        <th><?php echo $lang->I18N('Status'); ?></th>
                        <th><?php echo $lang->I18N('Action'); ?></th>
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
                            <td><?php echo get_ticket_status_span($value['ticket_status']); ?></td>
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
                <span><?php echo $count; ?> Records Founds</span>
            </div>
        </div>
    </div>
</div>
