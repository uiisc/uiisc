<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15 mx-5">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="index.php" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="5%">ID</th>
                    <th width="85%">Subject</th>
                    <th width="5%">Date</th>
                    <th width="5%">Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $data): ?>
                    <tr>
                        <td>#<?php echo $data['knowledgebase_id']; ?></td>
                        <td><?php echo $data['knowledgebase_subject']; ?></td>
                        <td><?php echo $data['knowledgebase_date']; ?></td>
                        <td><a href="knowledgebase.php?action=view&id=<?php echo $data['knowledgebase_id']; ?>" class="btn btn-sm btn-secondary btn-rounded"><i class="fa fa-book"></i> Read</a></td>
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
        <p class="pb-10"><?php echo $count; ?> knowledgebase found</p>
    </div>
</div>