
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-user'></i>
                        <span>Manage Product Brand</span>
                    </h1>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            <a href="<?php echo site_url('product_brand'); ?>">Settings/Product Brand</a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            Add Product Brand
                        </li>
                    </ul>
                    <div class='pull-right'>

                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='box bordered-box orange-border'>
                    <div class='box-header orange-background'>
                        <div class="title">Add product brand</div>
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
                                </div>
                            </div>
                            <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">   
                                    <div class='box-content'>

                                        <div class='form-group'>
                                            <label for='inputText'>Brand Name</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Brand Name' 
                                                   type='text' name='brand_name'>
                                            <span style="color:red"><?php echo form_error('brand_name'); ?><span>
                                                    </div>

                                                    <div class='text-right form-actions form-actions-padding-sm 
                                                         form-actions-padding-md form-actions-padding-lg' 
                                                         style='margin-bottom: 0;'>
                                                        <button class='btn btn-success' type='submit'>
                                                            <i class='icon-save'></i>
                                                            Save
                                                        </button>
                                                        <a class='btn' type='submit' href="<?php echo site_url('product_brand/'); ?>">Cancel</a>
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
