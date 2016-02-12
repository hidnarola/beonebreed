<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-table'></i>
			  <span>Manage Project</span>
			</h1>
			<ul class='breadcrumb' style="padding-top: 62px;">
                    <li class='separator'>
                    </li>
                    <li>
                        <a href='<?php echo site_url('project/') ?>'>Design/Manage Project</a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li>
                        <a href='<?php echo site_url('project/edit/' . $project['id']); ?>'><?php echo $project['name'];?></a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li>
                        Add Daily Sheet
                    </li>
                </ul>
		  </div>
		</div>
	  </div>
          
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='box'>
			<div class='box-header orange-background'>
			  <div class='title'>
				<div class=''></div>
				Add Daily Sheet
			  </div>
			</div>
        <div class="box-content">
                      <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data" id="my_timesheet_form">
                          <!-- first part -->
                          <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                    <div style="display:inline-block;float:left;width:45%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Username</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Username' type='text' name='username'>
                                            <span style="color:red"><?php echo form_error('username'); ?><span>

                                        </div>
                                        <div class='form-group'>
                                           <label for='inputText'>Total Time</label>
                                           <input class='form-control' id='inputText' placeholder='Total time' type='text' name='total_time'>
                                           <span style="color:red"><?php echo form_error('total_time'); ?><span>
                                        </div>
                                        <div>
                                             <label for='inputText'>Date</label><span style="color:red">*</span>
                                             <div class='datetimepicker input-group form-group' id='datetimepicker'>
                                                     <input class='form-control' data-format='yyyy-MM-dd'  placeholder='Select timepicker' type='text' name='dates' id="datepicker_timesheet">
                                                     <span class='input-group-addon'>
                                                             <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                                                     </span>
                                             </div>
                                             <span style="color:red"><?php echo form_error('dates'); ?><span>
                                       </div>
                                       
                                    </div>

                                    <div style="display:inline-block;float:right;width:50%" class='box-content'>
                                         <div class="form-group">
                                            <label for="comment">Introduction of what has be done today</label>
                                            <textarea class="form-control" rows="5" id="comment" name="today_introduction"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="comment">Research report of what has be done today</label>
                                            <textarea class="form-control" rows="5" id="comment" name="today_research_report"></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                	
                             <!-- end of add form -->	
                            </div>
                          <!--first part end -->
                          
                          <!-- second part starts -->
                          
                          
                          
                          <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                <h3 class="custom_box_title">Specialist Contacted</h3>
                                    <div style="display:inline-block;float:left;width:45%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Username</label>
                                            <input class='form-control' id='inputText' placeholder='Username' type='text' name='speciality_username'>
                                            
                                        </div>
                                        <div>
                                             <label for='inputText'>Date and Time</label>
                                             <div class='datetimepicker input-group form-group' id='specialist_datetimepicker'>
                                                     <input class='form-control' data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' type='text' name='speciality_date' id="datepicker_timesheet">
                                                     <span class='input-group-addon'>
                                                             <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                                                     </span>
                                                    
                                             </div>
                                       </div>
                                        <div class='form-group'>
                                           <label for='inputText'>Speciality</label>
                                           <input class='form-control' id='inputText' placeholder='Speciality' type='text' name='speciality'>
                                       </div>
                                        <div class='form-group'>
                                            <label for='inputText'>Company Name</label>
                                            <input class='form-control' id='inputText' placeholder='Company Name' type='text' name='company_name'>

                                        </div>
                                        
                                       
                                    </div>

                                    <div style="display:inline-block;float:right;width:50%" class='box-content'>
                                         <div class="form-group">
                                            <label for="comment">Contact Info</label>
                                            <textarea class="form-control" rows="5" id="comment" name="contact_info"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Subject Discussion</label>
                                            <textarea class="form-control" rows="5" id="comment" name="Subject_discussion"></textarea>
                                        </div>
                                        <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                            <button class='btn btn-success' type='submit'>
                                                <i class='icon-save'></i>
                                                Next
                                            </button>
                                           <a class='btn' href="<?php echo site_url('project/edit/'.$project['id']); ?>">Cancel</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                	
                             <!-- end of add form -->	
                            </div>
                                 <!-- second part ends -->
                      </form>
          </div>
		  </div>
                    	
		</div>
	  </div> 
          
</div>
<script type="text/javascript">
	
	 $(document).ready(function() {
                 
		$('#datetimepicker').datetimepicker({
                        pickTime: false,
                        orientation: "auto top",                   
                });
                $('#specialist_datetimepicker').datetimepicker({
                       
                        orientation: "auto top",                   
                });
                
	});
        
        
        
</script>		
			