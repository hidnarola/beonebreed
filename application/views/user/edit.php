
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-user'></i>
                        <span>Manage User</span>
                    </h1>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            <a href="<?php echo site_url('user'); ?>">Settings/User</a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            Edit User
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='box bordered-box orange-border'>
                    <div class='box-header orange-background'>
                        <div class="title">Edit User</div>
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
                                            <label for='inputText'>Language</label>
                                            <select class="form-control" name="language" >
                                                <option value="">Select Language</option>
                                                <?php
                                                if (!empty($language)) {
                                                    foreach ($language as $k => $v) {

                                                        if ($user['language_id'] == $v->id) {
                                                            ?>
                                                            <option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>

        <?php } else { ?>
                                                            <option value="<?php echo $v->id; ?>"><?php echo ucfirst($v->name); ?></option>

                                                        <?php
                                                        }
                                                    }
                                                }
                                                ?>		
                                            </select>	
                                        </div>
                                        <div class='form-group'>
                                            <label for='inputText'>Username</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Username' type='text' name='username' value="<?php if (!empty($user['username'])) {
                                                    echo $user['username'];
                                                } ?>">
                                            <span style="color:red"><?php echo form_error('username'); ?><span>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='inputText'>Role</label>
                                                        <select class="form-control" name="role" >
                                                            <option value="">Select Role</option>
<?php
if (!empty($role_list)) {
    foreach ($role_list as $k => $v) {

        if ($user['user_type'] == $v->id) {
            ?>

                                                                        <option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
        <?php } else { ?>

                                                                        <option value="<?php echo $v->id; ?>"><?php echo ucfirst($v->name); ?></option>
        <?php
        }
    }
}
?>		
                                                        </select>	
                                                    </div> 

                                                    </div>

                                                    <div style="display:inline-block;float:right;width:50%" class='box-content'>
                                                        <div class='form-group'>
                                                            <label for='inputText'>Department</label>
                                                            <select class="form-control" name="department" >
                                                                <option value="">Select Department</option>
                                                                <?php
                                                                if (!empty($department_list)) {
                                                                    foreach ($department_list as $k => $v) {
                                                                        if ($user['dept_id'] == $v->id) {
                                                                            ?>

                                                                            <option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
        <?php } else { ?>

                                                                            <option value="<?php echo $v->id; ?>"><?php echo ucfirst($v->name); ?></option>
            <?php }
    }
}
?>		
                                                            </select>	
                                                        </div> 
                                                        <div class='form-group'>
                                                            <label for='inputText'>Email</label><span style="color:red">*</span>
                                                            <input class='form-control' id='inputText' placeholder='Email' type='text' name='email' value="<?php if (!empty($user['email'])) {
    echo $user['email'];
} ?>">
                                                            <span style="color:red"><?php echo form_error('email'); ?><span>
                                                                    </div>

                                                                    <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                                                        <button class='btn btn-success' type='submit'>
                                                                            <i class='icon-save'></i>
                                                                            Save
                                                                        </button>
                                                                        <a class='btn' type='submit' href="<?php echo site_url('user/'); ?>">Cancel</a>

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

