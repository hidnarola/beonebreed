<div class='col-xs-12'>
	  <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
        <h1 class='pull-left'>
          <i class='icon-table'></i>
          <span>Manage Store</span>
        </h1>
        <div class='pull-right'>
          <ul class='breadcrumb'>
          </ul>
        </div>
        </div>
      </div>
	  </div>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='box'>
        <div class='box-header orange-background'>
          <div class='title'>
          <div class=''></div>
          Add Store
          </div>
        </div>
        <div class='box-content'>
          <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class='form-group'>
              <label for='inputText'>Name</label><span style="color:red">*</span>
              <input class='form-control' id='inputText' placeholder='Name' type='text' name='name'>
              <span style="color:red"><?php echo form_error('action'); ?><span>
            </div>
             <div class='form-group'>
              <label for='inputText'>Address</label>
              <textarea class="form-control" rows="5" id="comment" name="address"></textarea>
            </div>

            <div class='form-group'>
              <label for='inputText'>Telephone</label>
              <input class='form-control' id='inputText' placeholder='Telephone' type='text' name='telephone'>
            </div>
            <div class='form-group'>
              <label for='inputText'>Contact</label>
              <textarea class="form-control" rows="5" id="comment" name="contact"></textarea>
            </div>
            <div class='form-group'>
              <label for='inputText'>Fax</label>
              <input class='form-control' id='inputText' placeholder='Fax' type='text' name='fax'>
            </div>
             <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                <button class='btn btn-success' type='submit'>
                  <i class='icon-save'></i>
                  Save
                </button>
                <a class='btn' type='submit' href="<?php echo site_url('project/edit/'); ?>">Cancel</a>
            </div>
				  
          </div>
		  </div>
		</div>
	  </div>  
</div>
			
			