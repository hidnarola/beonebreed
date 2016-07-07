
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
				Edit Daily Sheet
			  </div>
			  
			</div>
            <div class="box-content">          
              <form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">
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
                                <h3 class="custom_box_title">Specialist Contacted</h3>
                                    <div style="display:inline-block;float:left;width:45%" class='box-content'>
                                        <div class='form-group'>
                                            <label for='inputText'>Username</label><span style="color:red">*</span>
                                            <input class='form-control' id='inputText' placeholder='Username' type='text' name='speciality_username' value="<?php if(!empty($timesheet_list['speciality_username'])) {echo $timesheet_list['speciality_username'];} ?>">
                                            
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
                                        <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
                                            <button class='btn btn-success' type='submit'>
                                                <i class='icon-save'></i>
                                                Save
                                            </button>
                                           <a class='btn' type='submit' href="<?php echo site_url('project/edit/'.$timesheet_list['project_id']); ?>">Cancel</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                	
                             <!-- end of add form -->	
                            </div>
                                 <!-- second part ends -->
                      </form>
              
              
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
                                                <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="<?php echo $u_key->id; ?>"><a class="fancybox" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

                                                <?php }  else { ?>

                                                  <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="<?php echo $u_key->id; ?>"><a class="no_preview" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

                                              <?php  }} ?> 
                                        </ul>
                                    </div> 


                                </div> 
                                <div class='' style='margin-bottom: 0;'>
                                    <button class='btn btn-success' type='button' data-target="#myuploadModal" data-toggle="modal">
                                        <i class='icon-save'></i>
                                        Add
                                    </button>
                                    <button class='btn btn-danger' type='button' id="delete_my_upload">
                                        <i class='icon-save'></i>
                                        Remove
                                    </button>
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
                                           <h4 class="modal-title"><h3 class="download_filename"> </h3></h4>
                                         </div>
                                         <div class="modal-body">
                                           <a href="" class="btn btn-success my_preview_download"><i class="icon-download bounce"></i>&nbsp;Download</a>
                                         </div>
                                         <div class="modal-footer">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                         </div>
                                       </div>

                                     </div>
                                   </div>

                            </div>

                            <!-- bootstrap upload container start-->

                            <div class="container">
                                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_upload_form" enctype="multipart/form-data">
                                    <!-- Modal -->
                                    <div class="modal fade" id="myuploadModal" role="dialog">
                                        <div class="modal-dialog">
                                    <input  type='hidden' name='hdn_timesheet_id' id="hdn_timesheet_id" class="hdn_project_id" value="<?php
                                              if (!empty($timesheet_list['id'])) {
                                                        echo $timesheet_list['id'];
                                                    }
                                                    ?>">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Attachment</h4>
                                                </div> 
                                                <div class='box-content'>		
                                                    <div class='form-group'>
                                                        <label for='inputText'>Upload</label><span style="color:red">*</span>
                                                        <input type="file" class="form_input_contact" name="file" id="file"/>

                                                    </div>
                                                    <span style="color:red" id="file_err_msg"><span>
                                                </div> 
                                                <div class="modal-footer" style="border-top: 1px solid #fff;">
                                                    <button type="button" class="btn btn-success" id="upload_form_data">Save</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>	
        <!-- end form -->
    </div>
            </div>
		  </div>
                    	
		</div>
	  </div>

</div>
<script type="text/javascript">
	
	 $(document).ready(function() {
     
     
          $(".fancybox").fancybox({
              width  : 1200,
              height : 900,
              type   :'iframe'
          });
	
          $('#datetimepicker').datetimepicker({
                              pickTime: false,
                              orientation: "auto top",                   
                      });
                      $('#specialist_datetimepicker').datetimepicker({

                              orientation: "auto top",                   
                      });

        });
         $(document).on('click', '.no_preview', function() {
            var filename=$(this).text();
            $(".my_preview_download").attr("href", "uploads/"+filename);
            $(".download_filename").text(filename);
            $('#my_preview_form').modal('show');
            return false;
        });
         $(document).on("click", "#upload_form_data", function() {

                uploadForm();
        });
         //deleting attachment
            $('#delete_my_upload').click(function() {

                var cek_id = new Array();
                $('.chk_attachment:checked').each(function() {
                    cek_id.push($(this).val());// an array of selected values
                });
                if (cek_id.length == 0) {
                    alert("Please select atleast one checkbox");
                } else {

                    if (confirm("Are you sure you want to delete this?")) {
                        $.ajax({
                            url: '<?php echo base_url() . "project/delete_timesheet_attachemnt"; ?>',
                            type: 'post',
                            data: {ids: cek_id},
                            dataType: 'json',
                            success: function(data) {

                                if (data.status == 'success') {

                                    location.reload();
                                }
                            }
                        });
                    } else {
                        return false;
                    }

                }
            });
        function uploadForm() {

            $('#file_err_msg').text('');
            var file = $('#file').val();
            if (file == '') {
                $('#file_err_msg').text('please upload some attachment');
                $("#file").focus();
                return false;
            }
            var data = new FormData($("#project_upload_form")[0]);
            $('#response_msg').html('');
            $.ajax({
                url: '<?php echo site_url('project/timesheet_upload_form'); ?>',
                processData: false,
                type: 'post',
                dataType: 'json',
                data: data,
                contentType: false,
                success: function(response) {

                    if (response.status == 'success') {

                        $('#myuploadModal').modal('hide');
                        $('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
                        //location.reload();

                         var filename=response.file_name;
                        var ext1 = filename.split('.').pop();
                        var ext = ext1.toLowerCase();

                        if(ext=='pdf' || ext=='jpg' || ext=='png' || ext=='gif'){

                          var classname='fancybox';
                        }else{
                          var classname='no_preview';
                        }

                        $('#attachment').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_attachment value='+response.id+'><a  class='+classname+'  href=uploads/' + response.file_name + '>' + response.file_name + '</a></li>');

                        //$("#attachment").append($("<input type=checkbox name=checkbox[] value='1'><li style=list-style-type:none;>").text(response.file_name));
                    } else {
                        $('#response_msg').append('<span style=color:red; id=msgs>' + response.msg + '</span>');
                    }
                }
            });
            return false;
    }
</script>		
			