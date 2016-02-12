
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
                        <a href='<?php echo site_url('project/edit/' . $project_id); ?>'>Edit Project</a>
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
                            <input class='form-control' id='inputText' placeholder='Action' type='text' name='action'>
                            <span style="color:red"><?php echo form_error('action'); ?></span>
                                    </div>
                                    <div class='form-group'>
                                        <label for='inputText'>Resposible</label>
                                        <input class='form-control' id='inputText' placeholder='Resposible' type='text' name='resposible'>
                                    </div>

                                    <div class='form-group'>
                                        <label for='inputText'>Metric Key</label>
                                        <input class='form-control' id='inputText' placeholder='Metric Key' type='text' name='mertic_key'>
                                    </div>

                                    <div class='form-group'>
                                        <label for='inputText'>Complete Level</label><span style="color:red">*</span>
                                        <input class='form-control' id='inputText' placeholder='Complete Level' type='text' name='complete_level'>
                                        <span style="color:red"><?php echo form_error('complete_level'); ?><span>
                                                </div>
                                                <div>
                                                    <label for='inputText'>Target Date</label><span style="color:red">*</span>
                                                    <div class='datetimepicker input-group form-group' id='target_datetimepicker'>
                                                        <input class='form-control' data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' type='text' name='target_date' id="datepicker_timesheet">
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
                                                    <a class='btn' type='submit' href="<?php echo site_url('project/edit/' . $project_id); ?>">Cancel</a>
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

                                                    });



                                                </script>