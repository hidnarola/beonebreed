<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-table'></i>
			  <span>Manage Project</span>
			</h1>
			<div class='pull-right'>
			  <ul class='breadcrumb'>
			   <!--
				<li>
				  <a href='index.html'>
					<i class='icon-bar-chart'></i>

				  </a>
				</li>
				<li class='separator'>
				  <i class='icon-angle-right'></i>
				</li>
			   <li>
				  Forms
				</li>
				<li class='separator'>
				  <i class='icon-angle-right'></i>
				</li>
				<li class='active'>Form styles and features</li>-->
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
				Add Project
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
			  <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">
				  <div class='form-group'>
					<label for='inputText'>Project Name</label><span style="color:red">*</span>
					<input class='form-control' id='inputText' placeholder='Project Name' type='text' name='name'>
					<span style="color:red"><?php echo form_error('name'); ?><span>
				  </div>
				  
				  <div class='form-group'>
					<label for='inputText'>Project Type</label><span style="color:red">*</span>
					 <select class="form-control" name="project_type_id" >
						  <option value="">Select Project Type</option>
						  <?php 
								if(!empty($project_type)){
								foreach($project_type as $k=>$v){
						  ?>
							<option value="<?php echo $v->id;?>"><?php echo $v->type;?></option>
							
						<?php }}?>		
					  </select>
					<span style="color:red"><?php echo form_error('project_type_id'); ?><span>
				  </div>
				  
				  <div class='form-group'>
					<label for='inputText'>Project Category</label>
					<select class="form-control" name="category_id" >
						  <option value="">Select Project Category</option>
						  <?php 
								if(!empty($categories)){
								foreach($categories as $k=>$v){
						  ?>
							<option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
							
						<?php }}?>		
					  </select>			
				  </div>  
				  <div class='form-group'>
					<label for='inputText'>Status</label>
					<select class="form-control" name="status" >
						<option value="">Select Project Status</option>
						 <option value="active">Active</option>
						<option value="archieve">Archieve</option>
					  </select>	
				  </div>
				   <div class='form-group'>
					<label for='inputText'>Estimate Days</label>
					<input class='form-control' id='inputText' placeholder='Estimate Days' type='text' name='estimated_days'>
					
				  </div>
				  
				  <div class='form-group'>
					<label for='inputText'>Priority</label>
					<select class="form-control" name="priority" >								
						<option value="">Select Priority</option>		
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>							
					 </select>	
				  </div>
				  
				  <div class='form-group'>
					<label for='inputText'>Project manager</label>
					<input class='form-control' id='inputText' placeholder='Project manager' type='text' name='project_manager'>
					
				  </div>
				  
				  <div class='form-group'>
					<label for='inputText'>Quick Notes</label>
					<input class='form-control' id='inputText' placeholder='Quick Notes' type='text' name='quick_notes'>
					
				  </div>
				  
			</div>
		  </div>
		</div>
	  </div>
	  
	  <!-- add tab -->
	  
	  <div class='col-sm-6 box' style='margin-bottom: 0'>
                  <div class='box-header orange-background'>
                    <div class='title'>Add More Data</div>
					<!--
                    <div class='actions'>
                      <a class="btn box-remove btn-xs btn-link" href="#"><i class='icon-remove'></i>
                      </a>
                      
                      <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a>
                    </div>-->
                  </div>
                  <div class='box-content'>
                    <div class='tabbable'>
                      <ul class='nav nav-tabs nav-tabs-simple'>
                        <li class='active'>
                          <a class='green-border' data-toggle='tab' href='#tabsimple1'>
                            <i class='icon-indent-left'></i>
                            Attachments
                          </a>
                        </li>
                        <li>
                          <a data-toggle='tab' href='#tabsimple2'>
                            <i class='icon-edit text-red'></i>
                            Notes
                          </a>
                        </li>
						<li>
                          <a data-toggle='tab' href='#tabsimple3'>
                            <i class='icon-edit text-red'></i>
                            External com
                          </a>
                        </li>
                      </ul>
                      <div class='tab-content'>
                        <div class='tab-pane active' id='tabsimple1'>
                          
						  <div class='form-group'>
							<label for='inputText'>Upload</label>
							<input type="file" class="form_input_contact" name="file" />
						  </div>
                        </div>
                        <div class='tab-pane' id='tabsimple2'>
                          
						<div class='form-group'>
							<label for='inputText'>Title</label>
							<input class='form-control' id='inputText'  type='text' name='notes_name'>
						</div>
						  <div class="form-group">
							  <label for="comment">Description:</label>
							  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
							</div>
                        </div>
						<div class='tab-pane' id='tabsimple3'>
                          <div class='form-group'>
							<label for='inputText'>External links</label>
							<input class='form-control' id='inputText' placeholder='External Link' type='text' name='external_link'>
						</div>
                        </div>
                      </div>
                    </div>
                  </div>
				  
				   <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
					<button class='btn btn-primary' type='submit'>
					  <i class='icon-save'></i>
					  Save
					</button>
					<a class='btn' type='submit' href="<?php echo site_url('project'); ?>">Cancel</a>
				  </div>
			 </form> 
				  
				  
                </div>
				<div class="clearfix">	</div>
	  
	  
</div>
			
			