
<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <!-- <h5 class="m-0"><?php echo $PageInfo['title']; ?></h5> -->
            <h5 class="m-0"><?php echo $data['knowledgebase_subject']; ?></h5>
            <span><?php echo $data['knowledgebase_date']; ?></span>
            <a href="knowledgebase.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?></a>
        </div>
        <hr>
        <div class="mx-10 py-15">
            <?php echo $data['knowledgebase_content']; ?>
        </div>
    </div>
</div>