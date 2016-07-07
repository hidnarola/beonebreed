
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
				Daily Sheet
			  </div>
			</div>
              <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data" id="frm_view_timesheet">
                          <!-- first part -->
                          <div class='step-content'>
                                <hr class='hr-normal'>
                                <!-- inserting add project form -->	
                                    <div style="display:inline-block;float:left;width:45%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Username</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Username' type='text' name='username' value="<?php if(!empty($timesheet_list['username'])) {echo $timesheet_list['username'];} ?>">
                                            <span style="color:red"><?php echo form_error('username'); ?><span>
                                        </div>
                                        <div class='form-group'>
                                           <label for='inputText'>Total Time</label>
                                           <input class='form-control' id='inputText' placeholder='Total time' type='text' name='total_time' value="<?php if(!empty($timesheet_list['total_time'])) {echo $timesheet_list['total_time'];} ?>">
                                           <span style="color:red"><?php echo form_error('total_time'); ?><span>
                                        </div>
                                        <div>
                                             <label for='inputText'>Date</label><span style="color:red">*</span>
                                             <div class='datetimepicker input-group form-group' id='datetimepicker'>
                                                     <input class='form-control' data-format='yyyy-MM-dd'  placeholder='Select timepicker' type='text' name='dates' id="datepicker_timesheet" value="<?php echo ($timesheet_list['dates']!='0000-00-00')?$timesheet_list['dates']:' ' ; ?>">
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
                                            <textarea class="form-control" rows="5" id="comment" name="today_introduction"><?php if(!empty($timesheet_list['today_introduction'])) {echo $timesheet_list['today_introduction'];} ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="comment">Research report of what has be done today</label>
                                            <textarea class="form-control" rows="5" id="comment" name="today_research_report"><?php if(!empty($timesheet_list['today_research_report'])) {echo $timesheet_list['today_research_report'];} ?></textarea>
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
                                <h3>Specialist Contacted</h3>
                                    <div style="display:inline-block;float:left;width:45%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Username</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Username' type='text' name='speciality_username' value="<?php if(!empty($timesheet_list['speciality_username'])) {echo $timesheet_list['speciality_username'];} ?>">
                                            <span style="color:red"><?php echo form_error('speciality_username'); ?><span>
                                        </div>
                                        <div>
                                             <label for='inputText'>Date and Time</label><span style="color:red">*</span>
                                             <div class='datetimepicker input-group form-group' id='specialist_datetimepicker'>
                                                     <input class='form-control' data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' type='text' name='speciality_date' id="datepicker_timesheet" value="<?php echo ($timesheet_list['speciality_date']!='0000-00-00')?$timesheet_list['speciality_date']:' ' ; ?>">
                                                     <span class='input-group-addon'>
                                                             <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                                                     </span>
                                             </div>
                                             <span style="color:red"><?php echo form_error('speciality_date'); ?><span>
                                       </div>
                                        
                                        <div class='form-group'>
                                           <label for='inputText'>Speciality</label>
                                           <input class='form-control' id='inputText' placeholder='Speciality' type='text' name='speciality' value="<?php if(!empty($timesheet_list['speciality'])) {echo $timesheet_list['speciality'];} ?>">
                                       </div>
                                        <div class='form-group'>
                                            <label for='inputText'>Company Name</label>
                                            <input class='form-control' id='inputText' placeholder='Company Name' type='text' name='company_name' value="<?php if(!empty($timesheet_list['company_name'])) {echo $timesheet_list['company_name'];} ?>">

                                        </div>
                                        
                                       
                                    </div>

                                    <div style="display:inline-block;float:right;width:50%" class='box-content'>
                                         <div class="form-group">
                                            <label for="comment">Contact Info</label>
                                            <textarea class="form-control" rows="5" id="comment" name="contact_info"><?php if(!empty($timesheet_list['Contact_info'])) {echo $timesheet_list['Contact_info'];} ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Subject Discussion</label>
                                            <textarea class="form-control" rows="5" id="comment" name="Subject_discussion"><?php if(!empty($timesheet_list['subject_discussion'])) {echo $timesheet_list['subject_discussion'];} ?></textarea>
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
          <div class='step-pane' id='step2'>

            <!--start second step-->

            <div class="col-sm-12">
                <div class="row">
                    <div class="">
                        <h3 class="title font-s-0">Timesheet</h3>
                        <!-- Nav tabs -->
                    </div>
                    <div class="">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a href="#home" role="tab" data-toggle="tab">
                                    <icon class="icon-paper-clip"></icon> Attachment
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="home">
                                
                                <div class='row' style='margin-bottom: 0;'>


                                    <div class="col-md-6">
                                        <ul id="attachment" class="tab-ul">   
                                           <?php 
                                            foreach ($attachment as $u_key) { 
                                              $filetype=$u_key->name;
                                              $ext = strtolower(pathinfo($filetype, PATHINFO_EXTENSION));
                                              if($ext=='pdf' || $ext=='gif' || $ext=='jpg' || $ext=='png'){
                                          ?>
                                            <li style="list-style:none"><a class="fancybox" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

                                            <?php }  else { ?>

                                              <li style="list-style:none"><a class="no_preview" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

                                           <?php  }} ?> 
                                        </ul>
                                    </div> 


                                </div> 
                               
                            </div>

     
                        </div>
                    </div>
                </div>
            </div>	
            <div class="container">
              <!-- Modal -->
                   <div class="modal fade" id="my_preview_form" role="dialog">
                     <div class="modal-dialog">

                       <!-- Modal content-->
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">No preview Available</h4>
                         </div>
                         <div class="modal-body download_filename">

                         </div>
                         <div class="modal-body">
                           <a href="" class="btn btn-success my_preview_download">Download</a>
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                       </div>

                     </div>
                   </div>

          </div>

        <!-- end form -->
    </div>
</div>
<script type="text/javascript">
	
	 $(document).ready(function() {
     
    $(".fancybox").fancybox({
          width  : 1200,
          height : 900,
          type   :'iframe'
      }); 
		$("#frm_view_timesheet :input").prop("disabled", true);
	});
   $(document).on('click', '.no_preview', function() {
      var filename=$(this).text();
      $(".my_preview_download").attr("href", "uploads/"+filename);
      $(".download_filename").text(filename);
      $('#my_preview_form').modal('show');
      return false;
  });
  
 
        
</script>		
			