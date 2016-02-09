<div class='col-xs-12'>

    <div class='row'>
        <div class='col-sm-12'>
            <div class='page-header'>
                <h1 class='pull-left'>
                    <i class='icon-book'></i>
                    <span>Manage Project Type</span>
                </h1>
                <ul class='breadcrumb' style="padding-top: 62px;">
                    <li class='separator'>
                    </li>
                    <li>
                        <a href="<?php echo site_url('project_type'); ?>">Settings/Design/Project Type</a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li>
                        Edit Type
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

                        <div class=''>Edit Type</div>

                    </div>
                    <!--
<div class='actions'>
  <a class="btn box-remove btn-xs btn-link" href="#"><i class='icon-remove'></i>
  </a>
  
  <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
  </a>
</div>-->
                </div>
                <div class='box-content'>
                    <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8">

                        <div class='form-group'>
                            <label for='inputText'>Type</label><span style="color:red">*</span>
                            <input class='form-control' id='inputText' placeholder='Type name' type='text' name='type' value="<?php if (!empty($type['type'])) {
    echo $type['type'];
} ?>">
                            <span style="color:red"><?php echo form_error('type'); ?><span>
                                    </div> 
                                    <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                        <button class='btn btn-success' type='submit'>
                                            <i class='icon-save'></i>
                                            Save
                                        </button>
                                        <a class='btn' type='submit' href="<?php echo site_url('project_type') ?>">Cancel</a>
                                    </div
                                    </form>

                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>