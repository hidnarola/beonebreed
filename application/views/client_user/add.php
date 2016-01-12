
<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-user'></i>
            <span>Manage Client User</span>
          </h1>
          <div class='pull-right'>

          </div>
        </div>
      </div>
    </div>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='box bordered-box orange-border'>
          <div class='box-header orange-background'>
            <div class="title">Add User</div>
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
                        <label for='inputText'>Username</label><span style="color:red">*</span>
                        <input class='form-control' id='inputText' placeholder='Username' type='text' name='username' >
                        <span style="color:red"><?php echo form_error('username'); ?><span>
                    </div>
                     <div class='form-group'>
                        <label for='inputText'>Email</label><span style="color:red">*</span>
                        <input class='form-control' id='inputText' placeholder='Email' type='text' name='email' >
                        <span style="color:red"><?php echo form_error('email'); ?><span>
                    </div>
																			 <div class='form-group'>
                        <label for='inputText'>Store</label><span style="color:red">*</span>
                        <select class="form-control js-example-data-array-selected store" name="store" >
                          <option value="">Select Store</option>
                          <?php
                          if (!empty($store_list)) {
                            foreach ($store_list as $k => $v) {
                              ?>
                              <option value="<?php echo $v->id; ?>"><?php echo ucfirst($v->name); ?></option>

                              <?php
                            }
                          }
                          ?>		
                      </select>
                         <span style="color:red"><?php echo form_error('store'); ?><span>
                    </div>
                  </div>

                  <div style="display:inline-block;float:right;width:50%" class='box-content'>

                     <div class='form-group'>
                        <label for='inputText'>Password</label><span style="color:red">*</span>
                        <input class='form-control' id='inputText' placeholder='Password' type='password' name='password' >
                        <span style="color:red"><?php echo form_error('password'); ?><span>
                    </div>
                    <div class='form-group'>
                      <label for='inputText'>Password Confirm</label><span style="color:red">*</span>
                      <input class='form-control' id='inputText' placeholder='Password Confirm' type='password' name='password_confirm' >
                      <span style="color:red"><?php echo form_error('password_confirm'); ?><span>
                    </div>
                    <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                      <button class='btn btn-success' type='submit'>
                        <i class='icon-save'></i>
                        Save
                      </button>
                      <a class='btn' type='submit' href="<?php echo site_url('client_user/index/'.$client_id); ?>">Cancel</a>
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
       