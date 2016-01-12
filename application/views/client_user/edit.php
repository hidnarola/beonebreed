<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-table'></i>
			  <span>Manage Client User</span>
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
				Edit Client User
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
					<label for='inputText'>Username</label><span style="color:red">*</span>
					<input class='form-control' id='inputText' placeholder='Action' type='text' name='username' value="<?php if(!empty($client['username'])) {echo $client['username'];} ?>">
					<span style="color:red"><?php echo form_error('username'); ?><span>
				  </div>
				
				  <div class='form-group'>
							<label for='inputText'>Email</label><span style="color:red">*</span>
							<input class='form-control' id='inputText' placeholder='Resposible' type='text' name='email' value="<?php if(!empty($client['email'])) {echo $client['email'];} ?>">
							<span style="color:red"><?php echo form_error('email'); ?><span>
					</div>
						<div class='form-group'>
							<label for='inputText'>Store</label><span style="color:red">*</span>
							<select class="form-control js-example-data-array-selected store" name="store" >
									<option value="">Select Store</option>
									<?php
									if (!empty($store_list)) {
											foreach ($store_list as $k => $v) {
													if ($v->id == $client['store_id']) {
															?>
															<option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
													<?php } else {
															?>
															<option value="<?php echo $v->id; ?>" ><?php echo ucfirst($v->name); ?></option>
																							<?php
																					}
																			}
																	}
																	?>		
							</select>  
							<span style="color:red"><?php echo form_error('store'); ?><span>
					</div>
				   <div class='form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
					<button class='btn btn-success' type='submit'>
					  <i class='icon-save'></i>
					  Save
					</button>
					<a class='btn' type='submit' href="<?php echo site_url('client_user/index/'.$client_id); ?>">Cancel</a>
				  </div>
				  
			</div>
		  </div>
		</div>
	  </div>  
</div>
			
			