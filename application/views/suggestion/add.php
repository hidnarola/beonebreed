
<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-trello'></i>
            <span>Manage Idea/Suggestion</span>
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
            <div class="title">Add Idea/Suggestion</div>
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
                        <label for='inputText'>Name</label><span style="color:red">*</span>
                        <input class='form-control' id='inputText' placeholder='Name' type='text' name='name' >
                        <span style="color:red"><?php echo form_error('name'); ?><span>
                    </div>
                    <div class='form-group'>
                        <label for='inputText'>Type</label><span style="color:red">*</span>
                        <select class="form-control js-example-data-array-selected" name="suggestion_type" >
                          <option value="">Select Type</option>
                          <?php
                          if (!empty($suggestion_type)) {
                            foreach ($suggestion_type as $k => $v) {
                              ?>
                              <option value="<?php echo $v->id; ?>"><?php echo ucfirst($v->name); ?></option>

                              <?php
                            }
                          }
                          ?>		
                      </select>
                        <span style="color:red"><?php echo form_error('suggestion_type'); ?><span>
                    </div>
                     <div class='form-group'>
                        <label for='inputText'>Product</label><span style="color:red">*</span>
                        <select class="form-control js-example-data-array-selected" name="product" >
                          <option value="">Select Product</option>
                          <?php
                          if (!empty($product_list)) {
                            foreach ($product_list as $k => $v) {
                              ?>
                              <option value="<?php echo $v->id; ?>"><?php echo ucfirst($v->name); ?></option>

                              <?php
                            }
                          }
                          ?>		
                      </select>
                        <span style="color:red"><?php echo form_error('product'); ?><span>
                    </div>
                    <div class='form-group'>
                        <label for='inputText'>Subject</label>
                        <input class='form-control' id='inputText' placeholder='Title' type='text' name='subject' >
                        
                    </div>
                     <div class='form-group'>
                        <label for='inputText'>Description</label>
                        <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                        
                    </div> 
                  </div>
                  <div style="display:inline-block;float:right;width:50%" class='box-content'>
                     <div class='form-group'>
                        <label for='inputText'>Store</label><span style="color:red">*</span>
                        <select class="form-control js-example-data-array-selected1 store" name="store" >
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
                     <div class='form-group'>
                        <label for='inputText'>Contact Info</label>
                        <textarea class="form-control" rows="5" id="contact_info" name="contact_info"></textarea>
                       
                    </div> 
                    <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                      <button class='btn btn-success' type='submit'>
                        <i class='icon-save'></i>
                        Save
                      </button>
                      <a class='btn' type='submit' href="<?php echo site_url('mondou/suggestion/'); ?>">Cancel</a>
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
  
<script type="text/javascript">

  $(".store").change(function(){  
    
    var store_id=$('.store').val();
    if(store_id!=''){
      $.ajax({
             url: '<?php echo site_url('quality/get_contact_info'); ?>',
             type: 'post',
             dataType: 'json',
             data:{id:store_id},
             success: function(response) {
              
              if(response.status=='success'){ 
                $('#contact_info').text(response.contact_info);
              }  
             }
         });  
    }
  });  
</script>