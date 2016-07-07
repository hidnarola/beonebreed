<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			 <i class='icon-archive'></i>
              <span>Archieve Project</span>
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
                  Action Plan
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
			  <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data" id="my_action_form">
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
				  
				  
			</div>
		  </div>
		</div>
	  </div>  
</div>
<script type="text/javascript">
	
	 $(document).ready(function() {
                 
		$("#my_action_form :input").prop("disabled", true);
	});
            
</script>		
			