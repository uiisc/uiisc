<div class="container-fluid">
    <div class="card py-0">
        <div class="d-flex justify-content-between align-items-center pt-15">
            <h5 class="m-0">Edit Knowledgebase</h5>
            <a href="knowledgebase.php" class="btn btn-sm btn-danger">
                <i class="fa fa-backward"></i> <?php echo $lang->I18N('Return'); ?>
            </a>
        </div>

        <hr>
        <form action="controllers/knowledgebase/edit.php" method="post">
            <div class="row pb-20">
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Knowledgebase Subject</label>
                        <input type="text" name="subject" placeholder="knowledgebase subject..." value="<?php echo $Knowledgebase['knowledgebase_subject'];?>" class="form-control">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <label class="form-label required">Knowledgebase Content</label>
                        <textarea name="editor" id="content" placeholder="Enter ticket content..." class="form-control" style="height: 200px;"><?php echo $Knowledgebase['knowledgebase_content'];?></textarea> 
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-10 px-10">
                        <button name="submit" class="btn btn-sm btn-primary">Update</button>
                        <a href="knowledgebase.php?action=view&id=<?php echo $Knowledgebase['knowledgebase_id'];?>" target="_blank" class="btn btn-sm btn-success">Preview</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>