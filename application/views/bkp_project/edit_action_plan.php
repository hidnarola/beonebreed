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
				Edit Action Plan
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
					<label for='inputText'>Action</label><span style="color:red">*</span>
					<input class='form-control' id='inputText' placeholder='Action' type='text' name='action' value="<?php if(!empty($action_plan['action'])) {echo $action_plan['action'];} ?>">
					<span style="color:red"><?php echo form_error('action'); ?><span>
				  </div>
				
				   <div class='form-group'>
					<label for='inputText'>Resposible</label>
					<input class='form-control' id='inputText' placeholder='Resposible' type='text' name='resposible' value="<?php if(!empty($action_plan['resposible'])) {echo $action_plan['resposible'];} ?>">
				  </div>
				
				  <div class='form-group'>
					<label for='inputText'>Metric Key</label>
					<input class='form-control' id='inputText' placeholder='Metric Key' type='text' name='mertic_key' value="<?php if(!empty($action_plan['mertic_key'])) {echo $action_plan['mertic_key'];} ?>">
					
				  </div>
				  
				  <div class='form-group'>
					<label for='inputText'>Complete Level</label>
					<input class='form-control' id='inputText' placeholder='Complete Level' type='text' name='complete_level' value="<?php if(!empty($action_plan['complete_level'])) {echo $action_plan['complete_level'];} ?>">
					
				  </div>
						<div>
										<label for='inputText'>Target Date</label>
										<div class='datetimepicker input-group form-group' id='target_datetimepicker'>
																		<input class='form-control' data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' type='text' name='target_date' id="datepicker_timesheet" value="<?php if(!empty($action_plan['target_date'])) {echo $action_plan['target_date'];} ?>">
																		<span class='input-group-addon'>
																										<span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
																		</span>
										</div>
					</div>
						<div class="form-group">
								<label for="comment">Note</label>
								<textarea class="form-control" rows="5" id="comment" name="notes"><?php if(!empty($action_plan['notes'])) {echo $action_plan['notes'];} ?></textarea>
						</div>
				   <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
					<button class='btn btn-primary' type='submit'>
					  <i class='icon-save'></i>
					  Save
					</button>
					<a class='btn' type='submit' href="<?php echo site_url('project/edit/'.$action_plan['project_id']); ?>">Cancel</a>
				  </div>
				  
			</div>
		  </div>
		</div>
	  </div>  
</div>
			
			