
<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-retweet'></i>
            <span>STORES MONDOU</span>
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
           Edit Store
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
                      <label for='inputText'>Name</label><span style="color:red">*</span>
                      <input class='form-control' id='inputText' placeholder='Name' type='text' name='name' value="<?php if(!empty($store['name'])) {echo $store['name'];} ?>">
                      <span style="color:red"><?php echo form_error('name'); ?><span>
                    </div>
                     <div class='form-group'>
                      <label for='inputText'>Address</label>
                      <textarea class="form-control" rows="5" id="comment" name="address"><?php if(!empty($store['address'])) {echo $store['address'];} ?></textarea>
                    </div>

                    <div class='form-group'>
                      <label for='inputText'>Telephone</label>
                      <input class='form-control' id='inputText' placeholder='Telephone' type='text' data-mask='999 999 999 999' name='telephone' value="<?php if(!empty($store['telephone'])) {echo $store['telephone'];} ?>">
                      <span style="color:red"><?php echo form_error('telephone'); ?><span>
                    </div>
                  </div>

                  <div style="display:inline-block;float:right;width:50%" class='box-content'>

                     <div class='form-group'>
                      <label for='inputText'>Contact Info</label>
                      <textarea class="form-control" rows="5" id="comment" name="contact"><?php if(!empty($store['contact'])) {echo $store['contact'];} ?></textarea>
                    </div>
                    <div class='form-group'>
                      <label for='inputText'>Fax</label>
                      <input class='form-control' id='inputText' placeholder='Fax' type='text' name='fax' value="<?php if(!empty($store['fax'])) {echo $store['fax'];} ?>">
                      <span style="color:red"><?php echo form_error('fax'); ?><span>
                    </div> 
                    <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                      <button class='btn btn-success' type='submit'>
                        <i class='icon-save'></i>
                        Save
                      </button>
                      
                      <a class='btn' type='submit' href="<?php echo site_url('store/index/'.$client_id); ?>">Cancel</a>
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
       