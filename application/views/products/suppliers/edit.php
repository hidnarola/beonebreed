<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-user'></i>
                        <span>Edit Supplier</span>
                    </h1> 
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            <a href='<?php echo site_url('project/') ?>'>Design/Manage Project</a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            <a href='<?php echo site_url('suppliers/'); ?>'>Edit Project</a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            Edit Supplier
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
                        <div class="title">Edit Supplier</div>
                    </div>
                    <div class='box-content box-padding'>
                        <div class='fuelux'>
                            <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">   
                                    <div class='box-content'>

                                        <div class='form-group'>
                                            <label for='s_name'>Supplier Name</label><span style="color:red">*</span>
                                            <input class='form-control' id='s_name' placeholder='Supplier Name' 
                                                   type='text' value="<?php echo $supplier['supplier_name']; ?>" name='supplier_name'>
                                            <span style="color:red"><?php echo form_error('supplier_name'); ?><span>
                                                    </div>

                                                    <div class='form-group'>
                                                        <label for='c_name'>Contact Name</label><span style="color:red">*</span>
                                                        <input class='form-control' id='c_name' placeholder='Contact Name' 
                                                               type='text' value="<?php echo $supplier['contact_name']; ?>" name='contact_name'>
                                                        <span style="color:red"><?php echo form_error('contact_name'); ?><span>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label for='country_id'>Country</label><span style="color:red">*</span>
                                                                    <input class='form-control' id='country_id' placeholder='Country' 
                                                                           type='text' value="<?php echo $supplier['country']; ?>" name='country'>
                                                                    <span style="color:red"><?php echo form_error('country'); ?><span>
                                                                            </div>

                                                                            <div class='form-group'>
                                                                                <label for='c_email'>Contact Email</label><span style="color:red">*</span>
                                                                                <input class='form-control' id='c_email' placeholder='Contact Email' 
                                                                                       type='text' value="<?php echo $supplier['contact_email']; ?>" name='contact_email'>
                                                                                <span style="color:red"><?php echo form_error('contact_email'); ?><span>
                                                                                        </div>

                                                                                        <div class='form-group'>
                                                                                            <label for='tel_no'>Tel No</label><span style="color:red">*</span>
                                                                                            <input class='form-control' id='tel_no' placeholder='Tel No' 
                                                                                                   type='text' value="<?php echo $supplier['tel_no']; ?>" name='tel_no'>
                                                                                            <span style="color:red"><?php echo form_error('tel_no'); ?><span>
                                                                                                    </div>

                                                                                                    <div class='form-group'>
                                                                                                        <label for='tel_no'>Potential Level</label><span style="color:red">*</span>
                                                                                                        <select name="potential_level" id="potential_level" class="form-control">
                                                                                                            <option value="1">1</option>
                                                                                                            <option value="2">2</option>
                                                                                                            <option value="3">3</option>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div class='form-group'>
                                                                                                        <label for='address_id'>Address</label><span style="color:red">*</span>
                                                                                                        <textarea name="supplier_address" id="address_id" 
                                                                                                                  cols="30" rows="10" class="form-control"><?php echo $supplier['address']; ?></textarea>
                                                                                                        <span style="color:red"><?php echo form_error('supplier_address'); ?><span>
                                                                                                                </div>

                                                                                                                <div class='text-right form-actions form-actions-padding-sm 
                                                                                                                     form-actions-padding-md form-actions-padding-lg' 
                                                                                                                     style='margin-bottom: 0;'>
                                                                                                                    <button class='btn btn-success' type='submit'>
                                                                                                                        <i class='icon-save'></i>
                                                                                                                        Save
                                                                                                                    </button>
                                                                                                                    <a class='btn' type='submit' href="<?php echo site_url('suppliers/'); ?>">Cancel</a>
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

                                                                                                                <script type="text/javascript">
                                                                                                                    $('#potential_level').val('<?php echo $supplier["potential_level"]; ?>');
                                                                                                                </script>
