
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-user'></i>
                        <span>Manage Barcode</span>
                    </h1>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            <a href='<?php echo site_url('barcode/') ?>'>Products/Barcode</a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            Import Barcode
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='box bordered-box orange-border'>
                    <div class='box-header orange-background'>
                        <div class="title">Import Barcode (.CSV)</div>
                    </div>
                    <div class='box-content box-padding'>
                        <div class='fuelux'>
                            <div class='wizard'>
                                <div class='actions'>
                                    <button class='btn  btn-success' onclick="window.location.href = '<?php echo site_url('project'); ?>'" style="display:none" id="finish" >
                                        <!--disabled="disabled"-->
                                        Finish
                                        <i class='icon-arrow-right'></i>
                                    </button>
                                    <button class="btn btn-success" onclick="window.location.href='<?php echo base_url().'uploads/barcode/sample_barcode.csv' ?>'"><i class='icon icon-download-alt'></i> Download Sample file</button>
                                </div>
                            </div>
                            <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">   
                                    <div style="" class='box-content'>
                                        <div class='form-group text-center'>
                                            <label for='inputText'>Upload(.csv)</label>
                                            <input type="file" class="form_input_contact" name="file" id="file" />
                                            <input type="hidden" name="test" value=""> 
                                            <?php echo myflash_message('error'); ?>
                                        </div>
                                        <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                            <button class='btn btn-success' type='submit'>
                                                <i class='icon-save'></i>
                                                Save
                                            </button>
                                            <a class='btn' type='submit' href="<?php echo site_url('barcode/'); ?>">Cancel</a>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>		
                                <!-- end of add form -->	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
