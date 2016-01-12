<div class='col-xs-12'>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='page-header'>
                <h1 class='pull-left'>
                    <i class='icon-table'></i>
                    <span>Manage Project</span>
                </h1>
                <?php if(!empty($project['id'])){ ?>
                    <h4 class='pull-right text-center right_side_link_w_icon'>
                        <a href="javascript:void(0);" class="" style="" id="archive_projects" data-archieve="<?php if(!empty($project['id'])) { echo $project['id'];} ?>">
                            <i class="icon-archive" style=" border: none;"></i> <br>
                                <span style="border: none;">Archieve</span>
                         </a>
                    </h4>
                <?php } ?>
                <!--
                <div class='pull-right'>
                    <ul class='breadcrumb'>

                    </ul>
                </div> -->
            </div>
        </div>
    </div>

    <?php if (!empty($this->session->flashdata('msg'))) { ?>
        <div class='alert alert-success alert-dismissable'>
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <i class='icon-ok-sign'></i>
            <?php
            if ($this->session->flashdata('msg')):echo $this->session->flashdata('msg');
            endif;
            ?>  
        </div>
<?php } ?>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
                <div class='box-header orange-background'>
                    <div class='title'>
                        <div class=''></div>
                        Project
                    </div>

                </div>
                <div class='box-content'>
                    <?php
                        if($project['project_type_id']==2){ $disabled='disabled';}else{$disabled='';};
                    ?>
                    <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8">   
                        <div style="display:inline-block;float:left;width:45%" class='box-content'>


                            <div class='form-group'>
                                <label for='inputText'>Project Name</label><span style="color:red">*</span>
                                <input class='form-control' id='inputText' placeholder='Project Name' type='text' name='name' value="<?php
                                if (!empty($project['name'])) {
                                    echo $project['name'];
                                }
                                ?>" <?php echo $disabled; ?>>
                                <span style="color:red"><?php echo form_error('name'); ?><span>
                                        </div>
                                        <div class='form-group'>
                                            <label for='inputText'>Project Category</label>
                                            <select class="form-control" name="category_id" <?php echo $disabled; ?>>
                                                <option value="">Select Project Category</option>
                                                <?php
                                                if (!empty($categories)) {
                                                    foreach ($categories as $k => $v) {
                                                        if ($project['category_id'] == $v->id) {
                                                            ?>
                                                            <option value="<?php echo $v->id; ?>" selected><?php echo $v->name; ?></option>
        <?php } else { ?>
                                                            <option value="<?php echo $v->id; ?>"><?php echo $v->name; ?></option>

                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>			
                                        </div>

                                        <div class='form-group'>
                                            <label for='inputText'>Priority</label>
                                            <select class="form-control" name="priority" >								
                                                <option value="">Select Priority</option>	
                                                <?php
                                                for ($i = 1; $i <= 3; $i++) {

                                                    if ($project['priority'] == $i) {
                                                        ?>

                                                        <option value=<?php echo $i ?> selected><?php echo $i; ?></option>
    <?php } else { ?>

                                                        <option value=<?php echo $i; ?> ><?php echo $i; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>							
                                            </select>	
                                        </div>

                                        <div class="form-group">
                                            <label for="comment">Quick Notes:</label>
                                            <textarea class="form-control" rows="5" id="comment" name="quick_notes"><?php
                                                if (!empty($project['quick_notes'])) {
                                                    echo $project['quick_notes'];
                                                }
                                                ?></textarea>
                                        </div>  



                                        </div>

                                        <div style="display:inline-block;float:right;width:50%" class='box-content'>

                                            <div class='form-group'>
                                                <label for='inputText'>Project Type</label><span style="color:red">*</span>
                                                <select class="form-control" name="project_type_id" <?php echo $disabled; ?>>
                                                    <option value="">Select Project Type</option>
                                                    <?php
                                                    if (!empty($project_type)) {
                                                        foreach ($project_type as $k => $v) {
                                                            if ($project['project_type_id'] == $v->id) {
                                                                ?>
                                                                <option value="<?php echo $v->id; ?>" selected><?php echo $v->type; ?></option>

        <?php } else { ?>

                                                                <option value="<?php echo $v->id; ?>"><?php echo $v->type; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>		
                                                </select>
                                                <span style="color:red"><?php echo form_error('project_type_id'); ?><span>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='inputText'>Estimate Days</label>
                                                            <input class='form-control' id='inputText' placeholder='Estimate Days' type='text' name='estimated_days' value="<?php
                                                            if (!empty($project['estimated_days'])) {
                                                                echo $project['estimated_days'];
                                                            }
                                                            ?>" <?php echo $disabled; ?> >

                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='inputText'>Project manager</label>
                                                            <input class='form-control' id='inputText' placeholder='Project manager' type='text' name='project_manager' value="<?php
                                                            if (!empty($project['project_manager'])) {
                                                                echo $project['project_manager'];
                                                            }
                                                            ?>" <?php echo $disabled; ?>>

                                                        </div>
                                                        <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                                            <button class='btn btn-success' type='submit'>
                                                                <i class='icon-save'></i>
                                                                Save
                                                            </button>
                                                            <a class='btn' type='submit' href="<?php echo site_url('project/'); ?>">Cancel</a>
                                                        </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                        </form> 
                                                        <!--start of action plan-->
                                                        <hr class="hr-normal">
                                                        <!--
                                                                <div class='pull-left' style="color:green;margin-left:15px;">
<?php //if($this->session->flashdata('msg')):echo $this->session->flashdata('msg');endif;  ?>  
                                                                </div> -->

                                                        <div class="clearfix">	</div>
                                                        <div class='col-sm-12' style="margin-top:15px;">
                                                            <div class='row' style='margin-bottom:0;'>
                                                                <div class='box-gray'>
                                                                    <div style="" class="pull-right">

                                                                        <?php
                                                                        if (!empty($project['id'])) {
                                                                            $pid = $project['id'];
                                                                        } else {

                                                                            $pid = '';
                                                                        }
                                                                        ?>
                                                                        <a href="<?php echo site_url('project/add_action_plan/' . $pid) ?>" class="btn btn-primary pull-right">Add Action Plan</a>     
                                                                    </div>
                                                                    <h4 class='title pull-left'>Action Plan</h4>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class='box-content box-no-padding'>
                                                                    <div class='responsive-table'>
                                                                        <div class='scrollable-area'>
                                                                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            Action To Take
                                                                                        </th>
                                                                                        <th>
                                                                                            Responsible
                                                                                        </th>
                                                                                        <th>
                                                                                            Metric Key
                                                                                        </th>
                                                                                        <th>
                                                                                            Complete Level
                                                                                        </th>
                                                                                        <th>
                                                                                            Action
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                              <?php foreach ($action_plan as $u_key) { ?>
                                                                                        <tr>
                                                                                            <td><?php echo $u_key->action; ?> </td>
                                                                                            <td><?php echo $u_key->resposible; ?> </td>
                                                                                            <td><?php echo $u_key->mertic_key; ?> </td>
                                                                                            <td>
                                                                                                <!--
                                                                                                <div class='text-right'><small id='slider-example1-amount' class="slider-example1-amount"></small>
                                                                                                </div> <div id='slider-example1' style='margin-bottom: 20px; clear: both;' class="slider-example1"></div> -->

                                                                                                <div class="slider" id="<?php echo $u_key->id; ?>" data-value="<?php echo $u_key->complete_level; ?>"></div>
                                                                                                <p class=""><span class="slider-value"><?php
                                                                                                        if (!empty($u_key->complete_level)) {
                                                                                                            echo $u_key->complete_level . " %";
                                                                                                        }
                                                                                                        ?></span></p>
                                                                                            </td>
                                                                                            <td>

                                                                                                <div class='text-left'>
                                                                                                    <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit_action_plan/' . $u_key->id) ?>'>
                                                                                                        <i class='icon-edit'></i>
                                                                                                        Edit
                                                                                                    </a>
                                                                                                </div>
                                                                                            </td>  
                                                                                        </tr>
                                                                                    <?php } ?> 

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end of action plan-->

                                                        <hr class="hr-normal">

                                                        <!--start of timesheet plan-->


                                                        <div class="clearfix">	</div>

                                                        <div class='col-sm-12' style="margin-top:15px;">
                                                            <div class='row' style='margin-bottom:0;'>
                                                                <div class='box-gray'>
                                                                    <div class="pull-right">
                                                                        <a href="<?php echo site_url('project/add_timesheet/' . $pid) ?>" class="btn btn-primary pull-right">Add Daily Sheet</a>     
                                                                    </div>
                                                                    <h4 class='title pull-left'>Daily sheet</h4>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class='box-content box-no-padding'>
                                                                    <div class='responsive-table'>
                                                                        <div class='scrollable-area'>
                                                                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>
                                                                                            Date
                                                                                        </th>
                                                                                        <th>
                                                                                            Username
                                                                                        </th>
                                                                                        <th>
                                                                                            Today Introduction
                                                                                        </th>
                                                                                        <th>
                                                                                            Speciality
                                                                                        </th>
                                                                                        <th>
                                                                                            Action
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                            <?php foreach ($timesheet as $u_key) { ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <?php
                                                                                                $date = new DateTime($u_key->dates);
                                                                                                echo $date->format('d F Y');
                                                                                                ?> 
                                                                                            </td>
                                                                                            <td><?php echo $u_key->username; ?> </td>
                                                                                            <td><?php echo substr($u_key->today_introduction,0,50); ?> </td>
                                                                                            <?php
                                                                                             if(!empty($u_key->speciality_username)){
                                                                                               
                                                                                               $status='checked';
                                                              
                                                                                             }else{
                                                                                               
                                                                                               $status='';
                                                                                             } ?>
                                                                                            <td><input type="checkbox" id="chk_specialist" <?php echo $status; ?> ><?php echo $u_key->speciality; ?> </td>
                        
                                                                                            <td>
                                                                                                <div class='text-left'>
                                                                                                    <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit_timesheet/' . $u_key->id) ?>'>
                                                                                                        <i class='icon-edit'></i>
                                                                                                        Edit
                                                                                                    </a>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <?php } ?> 

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end of timesheet plan-->

                                                        <hr class="hr-normal">
                                                        <!--start of tabs -->

                                                        <div class='step-pane' id='step2'>

                                                            <!--start second step-->

                                                            <div class="col-sm-12">
                                                                <div class="row">
                                                                    <div class="">
                                                                        <h3 class="title font-s-0">Timesheet</h3>
                                                                        <!-- Nav tabs -->
                                                                    </div>
                                                                    <div class="">
                                                                        <ul class="nav nav-tabs" role="tablist">
                                                                            <li class="active">
                                                                                <a href="#home" role="tab" data-toggle="tab">
                                                                                    <icon class="icon-paper-clip"></icon> Attachment
                                                                                </a>
                                                                            </li>
                                                                            <li><a href="#profile" role="tab" data-toggle="tab">
                                                                                    <i class="icon-file-text"></i> Notes
                                                                                </a>
                                                                            </li>
                                                                            <li><a href="#external" role="tab" data-toggle="tab">
                                                                                    <i class="icon-external-link"></i> External Com
                                                                                </a>
                                                                            </li>
                                                                        </ul>

                                                                        <!-- Tab panes -->
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane fade active in" id="home">
                                                                                
                                                                                <div class='row' style='margin-bottom: 0;'>

                                                                                   
                                                                                    <div class="col-md-6">
                                                                                        <ul id="attachment" class="tab-ul"> 
                                                                                          
                                                                                            <?php 
                                                                                                foreach ($attachment as $u_key) { 
                                                                                                  $filetype=$u_key->name;
                                                                                                  $ext = strtolower(pathinfo($filetype, PATHINFO_EXTENSION));
                                                                                                  if($ext=='pdf' || $ext=='gif' || $ext=='jpg' || $ext=='png'){
                                                                                              ?>
                                                                                                <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="<?php echo $u_key->id; ?>"><a class="fancybox" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>
                                                                                                 
                                                                                                <?php }  else { ?>
                                                                                                    
                                                                                                  <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="<?php echo $u_key->id; ?>"><a class="no_preview" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>
                                                                                                  
                                                                                               <?php  }} ?> 
                                                                                        </ul>
                                                                                    </div> 

                                                                                   
                                                                                </div>
                                                                                <div class='' style='margin-bottom: 0;'>
                                                                                    <button class='btn btn-success' type='button' data-target="#myuploadModal" data-toggle="modal">
                                                                                        <i class='icon-save'></i>
                                                                                        Add
                                                                                    </button>
                                                                                    <button class='btn btn-danger' type='button' id="delete_my_upload">
                                                                                        <i class='icon-save'></i>
                                                                                        Remove
                                                                                    </button>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                          
                                                                          <!-- preview download bootstrap files-->
                                                                          
                                                                          <div class="container">
                                                                         <!-- Modal -->
                                                                              <div class="modal fade" id="my_preview_form" role="dialog">
                                                                                <div class="modal-dialog">

                                                                                  <!-- Modal content-->
                                                                                  <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                      <h4 class="modal-title">No preview Available</h4>
                                                                                    </div>
                                                                                    <div class="modal-body download_filename">
                                                                                      
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                      <a href="" class="btn btn-success my_preview_download">Download</a>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                  </div>

                                                                                </div>
                                                                              </div>

                                                                            </div>

                                                                          
                                                                          
                                                                          
                                                                          
                                                                          <!-- preview download-->

                                                                            <!-- bootstrap upload container start-->

                                                                            <div class="container">
                                                                                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_upload_form" enctype="multipart/form-data">
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="myuploadModal" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                            <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php
                                                                                               if (!empty($project['id'])) {
                                                                                                        echo $project['id'];
                                                                                                    }
                                                                                                    ?>">
                                                                                            <!-- Modal content-->
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                    <h4 class="modal-title">Attachment</h4>
                                                                                                </div> 
                                                                                                <div class='box-content'>		
                                                                                                    <div class='form-group'>
                                                                                                        <label for='inputText'>Upload</label><span style="color:red">*</span>
                                                                                                        <input type="file" class="form_input_contact" name="file" id="file"/>

                                                                                                    </div>
                                                                                                    <span style="color:red" id="file_err_msg"><span>
                                                                                                            </div> 
                                                                                                            <div class="modal-footer" style="border-top: 1px solid #fff;">
                                                                                                                <button type="button" class="btn btn-success" id="upload_form_data">Save</button>
                                                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                                                                                            </div>
                                                                                                            </div>

                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </form>
                                                                                                            </div>

                                                                                                            <!-- bootstrap container end -->
                                                                                                            <div class="tab-pane fade" id="profile"> 
                                                                                                                <div class="tab-pane fade active in" id="home">
                                                                                                                                                       <div class='row' style='margin-bottom: 0;' id="notes_div_form">
                                                                                                                        <div class="col-md-6">
                                                                                                                            <ul id="notes" class="tab-ul">
                                                                                                                                <?php foreach ($notes as $u_key) { ?>
                                                                                                                                    
                                                                                                                                    <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_notes" value="<?php echo $u_key->id; ?>"><a href="javascript:void(0)"  data-desc="<?php echo $u_key->description; ?>" class="notes_link" id="<?php echo $u_key->id; ?>"><?php echo $u_key->name; ?></a><span style="margin-left: 60px;"><?php $date = new DateTime($u_key->created_date); echo $date->format('d F Y'); ?></span></li>

<?php } ?> 
                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="">
                                                                                                                        <button class='btn btn-success' type='button' id="expand_notes">
                                                                                                                            <i class='icon-save'></i>
                                                                                                                            Add
                                                                                                                        </button>
                                                                                                                        <button class='btn btn-danger' type='button' id="delete_my_notes">
                                                                                                                            <i class='icon-save'></i>
                                                                                                                            Remove
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <hr>
                                                                                                                    <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_notes_form" >
                                                                                                                        <div class='' style='margin-bottom: 0;display:none' id="expand_notes_form">
                                                                                                                            <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php
                                                                                                                                    if (!empty($project['id'])) {
                                                                                                                                        echo $project['id'];
                                                                                                                                    }
                                                                                                                                    ?>">
                                                                                                                            <div class='form-group'>
                                                                                                                                <label for='inputText'>Title</label><span style="color:red">*</span>
                                                                                                                                <input class='form-control'   type='text' name='notes_name' id="notes_title">
                                                                                                                                <span style="color:red" id="notes_err_msg"></span>
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <label for="comment">Description:</label>
                                                                                                                                <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                                                                                                            </div>
                                                                                                                            <button type="button" class="btn btn-success" id="notes_form_data">Save</button>
                                                                                                                            <button type="button" class="btn " id="cancel_notes_form">Cancel</button>

                                                                                                                        </div>
                                                                                                                    </form>    
                                                                                 
                                                                                                                     <!-- bootstrap container for notes information -->
                                                                                                                    <div id="my_notes_description" class="modal fade" role="dialog">
                                                                                                                        <div class="modal-dialog">
                                                                                                                            <!-- Modal content-->
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                                                    <h4 class="modal-title">Notes</h4>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body" id="notes_desc">

                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <!-- bootstrap container for notes information ends -->

                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="tab-pane fade" id="external">
                                                                                                                <div class="tab-pane fade active in" id="home">
                                                                                                                    <div class='row' style='margin-bottom: 0;' id="external_link_div">
                                                                                                                        <div class="col-md-6">
                                                                                                                          <!--<a class="fancybox" href="uploads/Users1.pdf">Open pdf</a>-->
                                                                                                                            <ul id="external_links" class="tab-ul">

                                                                                                                                <?php foreach ($external_link as $u_key) { ?>
                                                                                                                                    
                                                                                                                                    <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_external_link" class="chk_external_link" value="<?php echo $u_key->id; ?>"><a href="javascript::void(0)" class="external_link_data " data-desc="<?php echo $u_key->description; ?>" ><?php echo $u_key->name; ?></a><span style="margin-left: 60px;"><?php $date = new DateTime($u_key->created_date); echo $date->format('d F Y'); ?></span></li>

<?php } ?> 

                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="">
                                                                                                                        <button class='btn btn-success' type='button' id="expand_external_links">
                                                                                                                            <i class='icon-save'></i>
                                                                                                                            Add
                                                                                                                        </button>
                                                                                                                        <button class='btn btn-danger' type='button' id="delete_my_external_link">
                                                                                                                            <i class='icon-save'></i>
                                                                                                                            Remove
                                                                                                                        </button>   
                                                                                                                    </div>
                                                                                                                    <hr>
                                                                                                                    <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_external_form" >  
                                                                                                                        <div class='' style='margin-bottom: 0;display:none' id="expand_external_form">
                                                                                                                            <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php
                                                                                                                                    if (!empty($project['id'])) {
                                                                                                                                        echo $project['id'];
                                                                                                                                    }
                                                                                                                                    ?>">
                                                                                                                             <div class='form-group'>
                                                                                                                                <label for='inputText'>Title</label><span style="color:red">*</span>
                                                                                                                                <input class='form-control' placeholder='Title' type='text' name='external_com' id="external_com">
                                                                                                                                <span style="color:red" id="link_err_msg"></span>
                                                                                                                            </div>
                                                                                                                            <div class='form-group'>
                                                                                                                                <label for='inputText'>Description</label>
                                                                                                                                <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                                                                                                                <span style="color:red" id="link_err_msg"></span>
                                                                                                                            </div>       
                                                                                                                            <button type="button" class="btn btn-success" id="external_form_data">Save</button>
                                                                                                                            <button type="button" class="btn " id="cancel_external_form">Cancel</button>

                                                                                                                        </div>
                                                                                                                    </form>    
                                                                                                                    
                                                                                                                     <!-- bootstrap container for external notes information -->
                                                                                                                        <div id="my_external_description" class="modal fade" role="dialog">
                                                                                                                            <div class="modal-dialog">
                                                                                                                                <!-- Modal content-->
                                                                                                                                <div class="modal-content">
                                                                                                                                    <div class="modal-header">
                                                                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                                                                        <h4 class="modal-title">External Com</h4>
                                                                                                                                    </div>
                                                                                                                                    <div class="modal-body" id="external_desc">

                                                                                                                                    </div>
                                                                                                                                    <div class="modal-footer">
                                                                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <!-- bootstrap container for notes information ends -->

                                                                                                                </div>

                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </div>	
                                                                                                            <!-- end form -->
                                                                                                            </div>



                                                                                                            </div>

                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                            </div>
<div class="modal fade" id="confirm_archieve" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <p>Do you want to archieve this project !</p>
            
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok" id="btnArchive">Archive</a>
                </div>
            </div>
        </div>
    </div>









<script>
 /*
  $(document).on("click", ".fancybox", function() {
    
       var filename=$(this).text();
       ext1  = filename.split('.')[1];
       if(ext1=='jpg' || ext1=='pdf' || ext1=='png'){
       
       }
        $(".fancybox").fancybox({
            width  : 1200,
            height : 900,
            type   :'iframe'
        });
       
    }); */
    
    
  $(document).ready(function() { 
      $(".fancybox").fancybox({
          width  : 1200,
          height : 900,
          type   :'iframe'
      });
    });

    $(document).on("click", "#btn_finish_send", function() {

        submitForm();
    });
    $(document).on("click", "#upload_form_data", function() {

        uploadForm();
    });
    $(document).on("click", "#notes_form_data", function() {

        noteForm();
    });

    $(document).on("click", "#external_form_data", function() {

        externalForm();
    });

    $(document).on("click", "#expand_notes", function() {

        $('#expand_notes_form').show();
        $('#notes_div_form').hide();

    });
    $(document).on("click", "#expand_external_links", function() {

        $('#expand_external_form').show();
        $('#external_link_div').hide();

    });
    $(document).on("click", "#cancel_external_form", function() {

        $("#expand_external_form").css("display", "none");
        $('#external_link_div').show();
    });
    $(document).on("click", "#cancel_notes_form", function() {

        $('#expand_notes_form').hide();
        $('#notes_div_form').show();
    });

     $(document).on('click', '.notes_link', function() {

            var data = $(this).attr("data-desc");
            $('#notes_desc').text(data);
            $('#my_notes_description').modal('show');
       });
       $(document).on('click', '.external_link_data', function() {

            var data = $(this).attr("data-desc");
            $('#external_desc').text(data);
            $('#my_external_description').modal('show');
        });
        $(document).on('click', '#archive_projects', function() {

            var id = $(this).attr("data-archieve");
            archieveProject(id);

        });
        $(document).on('click', '.no_preview', function() {
            var filename=$(this).text();
            $(".my_preview_download").attr("href", "uploads/"+filename);
            $(".download_filename").text(filename);
            $('#my_preview_form').modal('show');
            return false;
        });
      
    //deleting notes
    $('#delete_my_notes').click(function() {

        var cek_id = new Array();
        $('.chk_notes:checked').each(function() {
            cek_id.push($(this).val());// an array of selected values
        });
        if (cek_id.length == 0) {
            alert("Please select atleast one checkbox");
        } else {

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: '<?php echo base_url() . "project/delete_selected_notes"; ?>',
                    type: 'post',
                    data: {ids: cek_id},
                    dataType: 'json',
                    success: function(data) {

                        if (data.status == 'success') {

                            location.reload();
                        }
                    }
                });
            } else {
                return false;
            }

        }
    });



    //deleting attachment
    $('#delete_my_upload').click(function() {

        var cek_id = new Array();
        $('.chk_attachment:checked').each(function() {
            cek_id.push($(this).val());// an array of selected values
        });
        if (cek_id.length == 0) {
            alert("Please select atleast one checkbox");
        } else {

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: '<?php echo base_url() . "project/delete_selected_attachemnt"; ?>',
                    type: 'post',
                    data: {ids: cek_id},
                    dataType: 'json',
                    success: function(data) {

                        if (data.status == 'success') {

                            location.reload();
                        }
                    }
                });
            } else {
                return false;
            }

        }
    });

    //delete selected link
    $('#delete_my_external_link').click(function() {

        var cek_id = new Array();
        $('.chk_external_link:checked').each(function() {
            cek_id.push($(this).val());// an array of selected values
        });
        if (cek_id.length == 0) {
            alert("Please select atleast one checkbox");
        } else {

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: '<?php echo base_url() . "project/delete_selected_link"; ?>',
                    type: 'post',
                    data: {ids: cek_id},
                    dataType: 'json',
                    success: function(data) {

                        if (data.status == 'success') {

                            location.reload();
                        }
                    }
                });
            } else {
                return false;
            }

        }
    });



    function archieveProject(id){
        var project_id=id; 
        if (confirm("Are you sure you want to archieve this project?")) {
            $.ajax({
                url: '<?php echo site_url('project/project_archieve'); ?>',
                type: 'post',
                data: {id:project_id},
                dataType: 'json', 
                success: function(response) {
                     if (response.status == 'success') {
                         window.location.href = "<?php echo site_url('project/archieve_projects'); ?>";
                    }
                }
            });
         }else{
            return false;
         }   
    }
    
    function externalForm() {

        $('#link_err_msg').text('');
        var external_link = $('#external_com').val();

        if (external_link == '') {
            $('#link_err_msg').text('please enter External link');
            $("#external_com").focus();
            return false;
        }
        var data = new FormData($("#project_external_form")[0]);
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('project/project_add_links'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {

                    $('#myexternalModal').modal('hide');
                    //$("#external_links").append($("<li style=list-style-type:none;>").text(response.link_name));
                     $('#external_links').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_external_link value='+response.link_id+'><a data-desc="' + response.link_desc + '" class="external_link_data" id="' + response.link_id + '" href="javascript::void(0)">' + response.link_name + '</a><span style=margin-left:60px>'+response.dates1+'</span></li>');
                    $('#project_external_form')[0].reset();
                    $("#expand_external_form").css("display", "none");
                    $('#external_link_div').show();
                    //location.reload();

                } else {

                }
            }
        });

        return false;
    }
    function noteForm() {

        $('#notes_err_msg').text('');
        var notes_title = $('#notes_title').val();


        if (notes_title == '') {
            $('#notes_err_msg').text('please enter notes title');
            $("#notes_name").focus();
            return false;
        }

        var data = new FormData($("#project_notes_form")[0]);
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('project/project_add_notes'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {
                    $('#project_notes_form')[0].reset();
                    $('#mynoteModal').modal('hide');
                    //$("#notes").append($("<li style=list-style-type:none;>").text(response.notes_name));
                    //$('#notes').append('<li style=list-style-type:none;></li>');
                    $('#notes').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_notes value='+response.id+'><a data-desc="' + response.desc + '" class="notes_link" id="' + response.id + '" href="javascript::void(0)">' + response.notes_name + '</a><span style=margin-left:60px>'+response.dates1+'</span></li>');
                   $("#expand_notes_form").css("display", "none");
                   $("#notes_div_form").css("display", "block");


                    //location.reload();

                } else {

                }
            }
        });

        return false;
    }
    function uploadForm() {

        $('#file_err_msg').text('');
        var file = $('#file').val();
        if (file == '') {
            $('#file_err_msg').text('please upload some attachment');
            $("#file").focus();
            return false;
        }
        var data = new FormData($("#project_upload_form")[0]);
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('project/project_upload_form'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {

                    $('#myuploadModal').modal('hide');
                    $('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
                    //location.reload();
                    var filename=response.file_name;
                    var ext1 = filename.split('.').pop();
                    var ext = ext1.toLowerCase();
                    
                    if(ext=='pdf' || ext=='jpg' || ext=='png' || ext=='gif'){
                      
                      var classname='fancybox';
                    }else{
                      var classname='no_preview';
                    }
                   
                    $('#attachment').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_attachment value='+response.id+'><a  class='+classname+'  href=uploads/' + response.file_name + '>' + response.file_name + '</a></li>');
                  
                    //$("#attachment").append($("<input type=checkbox name=checkbox[] value='1'><li style=list-style-type:none;>").text(response.file_name));
                } else {
                    $('#response_msg').append('<span style=color:red; id=msgs>' + response.msg + '</span>');
                }
            }
        });

        return false;
    }
    function submitForm() {

        var project_name = $('#name').val();
        $('#response_msg').html('');
        $('#type_err_msg').text('');
        $('#name_err_msg').text('');
        var project_type = $('#project_type_id').val();
        if (project_name == '') {
            $('#name_err_msg').text('please enter project name');
            $("#name").focus();
            return false;
        }
        if (project_type == '') {

            $('#type_err_msg').text('please enter project type');
            $("#project_type_id").focus();
            return false;
        }
        var data = new FormData($("#project_add_form")[0]);
        $.ajax({
            url: '<?php echo site_url('project/add'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {

                    $('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
                } else {
                    $('#response_msg').append('<span style=color:red; id=msgs>' + response.msg + '</span>');
                }
            }
        });

        return false;
    }


    //$("#slider-example1-amount").text("$" + $("#slider-example1").slider("value"));
</script>	

