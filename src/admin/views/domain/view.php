<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center px-5 pt-15">
            <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5>
            <a href="index.php" class="btn btn-danger btn-sm">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return');?>
            </a>
        </div>
        <hr>
        <form action="controllers/domain/add.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-5 px-10">
                        <label class="form-label required">Add Domain Extension</label>
                        <div class="input-group">
                            <input type="text" name="domain" id="cudomain" class="form-control" placeholder="eg .example.com">
                            <div class="input-group-append">
                                <button name="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <h6 class="mb-5 px-10">Registered Extensions</h6>

        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <th width="10%">ID</th>
                    <th width="75%">Domain</th>
                    <th width="15%">Action</th>
                </thead>
                <tbody>
                <?php if ($count > 0): ?>
                <?php foreach ($rows as $value): ?>
                    <tr>
                        <td># <?php echo $value['extension_id']; ?></td>
                        <td><?php echo $value['extension_value']; ?></td>
                        <td>
                            <form action="controllers/domain/delete.php" method="post">
                                <input hidden type="text" name="extension" value="<?php echo $value['extension_value']; ?>" />
                                <button name="submit" class="btn btn-sm btn-secondary btn-rounded"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No domain found</td>
                    </tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
        <p class="pb-10"><?php echo $count; ?> Records Founds</p>
    </div>
</div>
