
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
                        <a href='<?php echo site_url('project/edit/' . $project['id']); ?>'><?php echo $project['name'];?></a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li>
                        Action Plan
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='box'>
                <div class='box-header orange-background'>
                    <div class='title'>
                        <div class=''></div>
                        Add Action Plan
                    </div>
                </div>
                <div class='box-content'>
                    <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">
                        <div class='form-group'>
                            <label for='inputText'>Action</label><span style="color:red">*</span>
                            <input class='form-control' id='inputText' placeholder='Action' type='text' name='action' value="<?php echo set_value('action'); ?>">
                            <span style="color:red"><?php echo form_error('action'); ?></span>
                                    </div>
                                    <div class='form-group'>
                                        <label for='inputText'>Responsible</label>
                                        <input class='form-control' id='inputText' placeholder='Responsible' 
                                               type='text' name='resposible' value="<?php echo set_value('resposible'); ?>">
                                    </div>

                                    <div class='form-group'>
                                        <label for='inputText'>Metric Key</label>
                                        <input class='form-control' id='inputText' placeholder='Metric Key' 
                                               type='text' name='mertic_key' value="<?php echo set_value('mertic_key'); ?>">
                                    </div>

                                    <div class='form-group'>
                                        <label for='inputText'>Complete Level</label><span style="color:red">*</span>
                                        <input class='form-control' id='complete_level' placeholder='Complete Level' 
                                                type='text' name='complete_level' value="<?php echo set_value('complete_level'); ?>">
                                        <span id="complete_level_msg" style="color:red"><?php echo form_error('complete_level'); ?></span>
                                    </div>
                                                <div>
                                                    <label for='inputText'>Target Date</label><span style="color:red">*</span>
                                                    <div class='datetimepicker input-group form-group' id='target_datetimepicker'>
                                                        <input class='form-control' data-format='yyyy-MM-dd hh:mm:ss'  
                                                              placeholder='Select timepicker' type='text' name='target_date' id="datepicker_timesheet" 
                                                              readonly value="<?php echo set_value('target_date'); ?>">
                                                        <span class='input-group-addon'>
                                                            <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                                                        </span>
                                                    </div>
                                                     <span style="color:red"><?php echo form_error('target_date'); ?></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Note</label>
                                                    <textarea class="form-control" rows="5" id="comment" name="notes"></textarea>
                                                </div>
                                                <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                                    <button class='btn btn-success' type='submit'>
                                                        <i class='icon-save'></i>
                                                        Save
                                                    </button>
                                                    <a class='btn' href="<?php echo site_url('project/edit/' . $project['id']); ?>">Cancel</a>
                                                </div>

                                                </div>
                                                </div>
                                                </div>
                                                </div>  
                                                </div>

                                                <script type="text/javascript">
                                                    $(document).ready(function () {

                                                        $('#target_datetimepicker').datetimepicker({
                                                            pickTime: false,
                                                            orientation: "auto top",
                                                        });
                                                        $('#complete_level').keyup(function () {
                                                           var clvalue = $('#complete_level').val();
                                                           if(clvalue < 0 || clvalue >100) {
                                                               $('#complete_level_msg').html('The Complete Level field must contain numbers between 0 to 100.');
                                                           }
                                                           else
                                                           {
                                                               $('#complete_level_msg').html('');
                                                           }
                                                        });
                                                    });
                                                </script>