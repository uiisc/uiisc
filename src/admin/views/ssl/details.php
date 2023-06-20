<?php
if (!defined('IN_CRONLITE')) {
    exit('Access Denied');
}
?>
<div class="content-wrapper">
    <div class="container">
        <ol class="breadcrumb page-breadcrumb">
            <li><a href="index.php"><?php echo $lang->I18N('Dashboard'); ?></a></li>
            <li class="active"><?php echo $lang->I18N('SSL Provider'); ?></li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <a href="ssl.php?action=add" class="btn btn-primary btn-xs">
                        <i class="fa fa-plus"></i> <?php echo $lang->I18N('add'); ?>
                    </a>
                    <a href="ssl.php" class="btn btn-primary btn-xs">
                        <i class="fa fa-list"></i> <?php echo $lang->I18N('list'); ?>
                    </a>
                </div>
                <span class="panel-title"><?php echo $PageInfo['title']; ?> ID: <?php echo $SSLInfo['ssl_id']; ?></span>
            </div>
            <div class="panel-body">
                <div class="row mb-10">
                    <div class="col-md-6"><b><?php echo $lang->I18N('Status'); ?> : </b><?php echo $Status;?></div>
                    <div class="col-md-6"><b><?php echo $lang->I18N('Domain Name'); ?> : </b><?php echo $SSLInfo['ssl_domain'];?></div>
                </div>
                <div class="row mb-10">
                    <div class="col-md-6"><b><?php echo $lang->I18N('Start Date'); ?></b> : <?php echo $SSLInfo['ssl_begin_date'];?></span></div>
                    <div class="col-md-6"><b><?php echo $lang->I18N('End Date'); ?></b> : <span><?php echo $SSLInfo['ssl_end_date'];?></span></div>
                </div>
                <div class="row mb-10">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center mx-10 my-5">
                            <b>Method:</b>
                            <span>DNS</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-10">
                    <?php if($SSLInfo['ssl_status']=='processing') {
                        // 处理中
                        $Record = explode(' ',$SSLInfo['approver_method']['dns']['record']);
                    ?>
                        <div class="col-md-12 mb-10">
                            <div class="my-5 mx-10">
                                <b>CSR Code:</b>
                                <pre class="my-0"><?php echo htmlspecialchars_decode($SSLInfo['ssl_csr_code']); ?></pre>
                            </div>
                            <div class="my-10 mx-10">
                                <b>CNAME Record:</b>
                                <pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['0'];?>" readonly></pre>
                            </div>
                            <div class="my-10 mx-10">
                                <b>Record Content:</b>
                                <pre class="my-0"><?php echo $Record['2'];?></pre>
                            </div>
                        </div>
                    <?php } elseif($SSLInfo['ssl_status']=='active') { ?>
                        <div class="col-lg-12 mb-10">
                            <div class="my-5 mx-10">
                                <p><b>Certificate Code:</b></p>
                                <pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['ssl_crt_code'];?></textarea></pre>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="my-5 mx-10">
                                <b>CA Bundle:</b>
                                <pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['ssl_ca_code'];?></textarea></pre>
                            </div>
                        </div>
                    <?php } elseif($SSLInfo['ssl_status']=='cancelled'){ ?>
                    <div class="col-lg-12">
                        <div class="my-5 mx-10">
                            <b>CSR Code:</b>
                            <pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['csr_code'];?></textarea></pre>
                        </div>
                    </div>
                    <?php } elseif($SSLInfo['ssl_status']=='expired'){ ?>
                    <div class="col-lg-12">
                        <div class="my-5 mx-10">
                            <b>Certificate Code:</b>
                            <pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="my-5 mx-10">
                            <b>CA Bundle:</b>
                            <pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
                        </div>
                    </div>
                    <?php } ?>
                </div>
        </div>
    </div>
</div>
</div>
