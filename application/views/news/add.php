
<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-user'></i>
            <span>Manage News</span>
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
            <div class="title">Add News</div>
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
                <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">   
                  <div style="display:inline-block;float:left;width:45%" class='box-content'>
                    <div class='form-group'>
                        <label for='inputText'>Title</label><span style="color:red">*</span>
                        <input class='form-control' id='inputText' placeholder='Title' type='text' name='title' >
                        <span style="color:red"><?php echo form_error('title'); ?><span>
                    </div>
                     <div class='form-group'>
                        <label for='inputText'>Description</label><span style="color:red">*</span>
                        <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                        <span style="color:red"><?php echo form_error('description'); ?><span>
                    </div>
                  </div>
                  <div style="display:inline-block;float:right;width:50%" class='box-content'>
                    <div class='form-group'>
                        <label for='inputText'>Upload img</label>
                        <input type="file" class="form_input_contact" name="file" id="file" accept="image/*" />
                    </div>
                     <div class='form-group'>
                      <label for='inputText'>Client</label>
                      <select class="form-control" name="client_visibility" >								
                        <option value="">Select Visibility</option>		
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>	
                    </div>
                    <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                      <button class='btn btn-success' type='submit'>
                        <i class='icon-save'></i>
                        Save
                      </button>
                      <a class='btn' type='submit' href="<?php echo site_url('news/'); ?>">Cancel</a>
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
       