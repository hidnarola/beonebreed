<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-table'></i>
                        <span>Manage Project</span>
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
                            Add Project
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
                        <div class="title">Add Project</div>
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
                                <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8">   
                                    <div style="display:inline-block;float:left;width:45%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Project Name</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Project Name' type='text' name='name' value="<?php echo set_value('name'); ?>">
                                            <span style="color:red"><?php echo form_error('name'); ?></span>
                                        </div>
                                        <div class='form-group'>
                                            <label for='inputText'>Project Category</label><span style="color:red">*</span>
                                            <select class="form-control" name="category_id" >
                                                <option value="">Select Project Category</option>
                                                <?php
                                                if (!empty($categories)) {
                                                    foreach ($categories as $k => $v) {
                                                        ?>
                                                        <option value="<?php echo $v->id; ?>"<?php echo set_select('category_id', $v->id); ?>><?php echo ucfirst($v->name); ?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>		
                                            </select>	
                                            <span style="color:red"><?php echo form_error('category_id'); ?></span>
                                        </div> 
                                        <div class='form-group'>
                                            <label for='inputText'>Priority</label><span style="color:red">*</span>
                                            <select class="form-control" name="priority" >								
                                                <option value="">Select Priority</option>		
                                                <option value="1" <?php echo set_select('priority', 1); ?>>1</option>
                                                <option value="2" <?php echo set_select('priority', 2); ?>>2</option>
                                                <option value="3" <?php echo set_select('priority', 3); ?>>3</option>							
                                            </select>
                                            <span style="color:red"><?php echo form_error('priority'); ?></span>
                                        </div>    

                                        <div class="form-group">
                                            <label for="comment">Quick Notes:</label>
                                            <textarea class="form-control" rows="5" id="comment" name="quick_notes"><?php echo set_value('quick_notes'); ?></textarea>
                                        </div>
                                    </div>

                                    <div style="display:inline-block;float:right;width:50%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Project Type</label><span style="color:red">*</span>
                                            <select class="form-control" name="project_type_id" id="project_type_id">
                                                <option value="">Select Project Type</option>
                                                <?php
                                                if (!empty($project_type)) {
                                                    foreach ($project_type as $k => $v) {
                                                        ?>
                                                        <option value="<?php echo $v->id; ?>" <?php echo set_select('project_type_id', $v->id); ?>><?php echo ucfirst($v->type); ?></option>

                                                        <?php
                                                    }
                                                }
                                                ?>		
                                            </select>
                                            <span style="color:red"><?php echo form_error('project_type_id'); ?><span>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='inputText'>Estimate Days</label><span style="color:red">*</span>
                                                        <!--<input class='form-control' id='inputText' placeholder='Estimate Days' type='text' name='estimated_days' value="<?php echo set_value('estimated_days'); ?>">-->
                                                        <div class='estdate input-group' id='datepicker'>
                                                            <input class='form-control ' name='estimated_days' data-format='yyyy-MM-dd' placeholder='Select datepicker' type='text'>
                                                            <span class='input-group-addon'>
                                                                <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                                                            </span>
                                                        </div>
                                                        <span style="color:red"><?php echo form_error('estimated_days'); ?><span>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='inputText'>Project Manager</label><span style="color:red">*</span>
                                                                    <!--<div class='form-control' id='select2-tags'></div>-->
                                                                    <select class="js-example-data-array-selected form-control" name="project_manager">
                                                                        <option value="">Select Project Manager</option>
                                                                        <?php
                                                                        if (!empty($project_manager)) {
                                                                            foreach ($project_manager as $k => $v) {
                                                                                ?>
                                                                                <option value="<?php echo $v->username; ?>" <?php echo set_select('project_manager', $v->username); ?>><?php echo ucfirst($v->username); ?></option>

                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>	
                                                                    </select>
                                                                    <span style="color:red"><?php echo form_error('project_manager'); ?></span>
                                                                </div>
                                                                <!--
                                                                <div class='form-group'>
                                                                  <label for='inputText'>Project manager</label>
                                                                  <input class='form-control'  placeholder='Project manager' type='text' name='project_manager' id="project_manager">
                                            
                                                                </div>-->
                                                                <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                                                    <button class='btn btn-success' type='submit'>
                                                                        <i class='icon-save'></i>
                                                                        Next
                                                                    </button>
                                                                    <a class='btn' type='submit' href="<?php echo site_url('project/'); ?>">Cancel</a>
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

                                                                <script>
                                                                    
                                                                </script>