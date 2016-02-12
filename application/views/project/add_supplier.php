<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-user'></i>
                        <span>Add Supplier</span>
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
                            <a href='<?php echo site_url('project/edit/' . $project['id']); ?>'><?php echo $project['name']; ?></a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            Add Supplier
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
                        <div class="title">Add Supplier</div>
                    </div>
                    <div class='box-content box-padding'>
                        <div class='fuelux'>
                            <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">   
                                    <div class='box-content'>
                                        <div class='form-group'>
                                            <label for='project_name'>Project Name</label>
                                            <input class='form-control' id='project_name' placeholder='project_name' 
                                                   type='text' value="<?php echo $project['name']; ?>" name='project_name' disabled="">
                                        </div>
                                        <div class='form-group'>
                                            <label for='s_name'>Supplier Name</label><span style="color:red">*</span>
                                            <select name="supplier_name" id="supplier_name" class="form-control">
                                                <option value="">Please select</option>
                                                <?php
                                                if (!empty($suppliers)) {
                                                    foreach ($suppliers as $supp) {
                                                        ?>
                                                        <option value="<?php echo $supp['id']; ?>"><?php echo $supp['supplier_name']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span style="color:red"><?php echo form_error('supplier_name'); ?><span>
                                                    </div>

                                                    <div class='form-group'>
                                                        <label for='c_name'>Contact Name</label><span style="color:red">*</span>
                                                        <input class='form-control' id='c_name' placeholder='Contact Name' 
                                                               type='text' value="<?php echo set_value('contact_name'); ?>" name='contact_name' disabled="">
                                                        <span style="color:red"><?php echo form_error('contact_name'); ?><span>
                                                                </div>

                                                                <div class='form-group'>
                                                                    <label for='country_id'>Country</label><span style="color:red">*</span>
                                                                    <input class='form-control' id='country_id' placeholder='Country' 
                                                                           type='text' value="<?php echo set_value('country'); ?>" name='country' disabled="">
                                                                    <span style="color:red"><?php echo form_error('country'); ?><span>
                                                                            </div>

                                                                            <div class='form-group'>
                                                                                <label for='c_email'>Contact Email</label><span style="color:red">*</span>
                                                                                <input class='form-control' id='c_email' placeholder='Contact Email' 
                                                                                       type='text' value="<?php echo set_value('contact_email'); ?>" name='contact_email' disabled="">
                                                                                <span style="color:red"><?php echo form_error('contact_email'); ?><span>
                                                                                        </div>

                                                                                        <div class='form-group'>
                                                                                            <label for='tel_no'>Tel No</label><span style="color:red">*</span>
                                                                                            <input class='form-control' id='tel_no' placeholder='Tel No' 
                                                                                                   type='text' value="<?php echo set_value('tel_no'); ?>" name='tel_no' disabled="">
                                                                                            <span style="color:red"><?php echo form_error('tel_no'); ?><span>
                                                                                                    </div>

                                                                                                    <div class='form-group'>
                                                                                                        <label for='tel_no'>Potential Level</label><span style="color:red">*</span>
                                                                                                        <input class='form-control' id='potential_level' placeholder='potential_level' 
                                                                                                               type='text' value="<?php echo set_value('potential_level'); ?>" name='potential_level' disabled="">
                                                                                                    </div>

                                                                                                    <div class='form-group'>
                                                                                                        <label for='address_id'>Address</label><span style="color:red">*</span>
                                                                                                        <textarea name="supplier_address" id="address_id" 
                                                                                                                  cols="30" rows="10" class="form-control" disabled=""><?php echo set_value('supplier_address'); ?></textarea>
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
