<div class='col-xs-12'>
  <div class='row'>
      <div class='col-sm-12'>
          <div class='page-header'>
              <h1 class='pull-left'>
                  <i class='icon-table'></i>
                  <span>Manage Project</span>
              </h1>
          </div>
      </div>
  </div>
  <div class='row'>
    <div class='col-sm-12'>
      <div class='box'>
        <div class='box-header orange-background'>
          <div class='title'>
              Add Daily Sheet 
          </div>
        </div>
                <!--strat of tabs -->
        <div class='box-content box-no-padding'>
                    <br/>
                    <br/>
                    <br/>
          <div class='step-pane' id='step2'>
                        <!--start second step-->
            <div class="container">
                            <!-- Nav tabs -->
              <ul class="nav nav-responsive nav-tabs" role="tablist">
                                <li class="active">
                                    <a href="#home" role="tab" data-toggle="tab">
                                        <i class="icon-paper-clip"></i> Attachment
                                    </a>
                                </li>
                               
                            </ul>

                            <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade active in" id="home">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class='' style='margin-bottom: 0;'>
                                                <div class="attachment_wrapper">
                                                    <ul id="attachment" class="tab-ul">
                                                      
                                                        <?php /* foreach ($attachment as $u_key) { ?>
                                                           
                                                            <li style="list-style:none"><a class="fancybox" href='uploads/<?php echo $u_key->name; ?>' target='_blank'><?php echo $u_key->name; ?></a></li>
                                                        <?php } */?>
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
                                    </div>
                                </div>
                                <!-- attachment bootstrap upload container start-->
                              <div class="container">
                                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_upload_form" enctype="multipart/form-data">
                                    <!-- Modal -->
                                    <div class="modal fade" id="myuploadModal" role="dialog">
                                        <div class="modal-dialog">
                                            <input  type='hidden' name='hdn_timesheet_id' id="hdn_timesheet_id" class="hdn_project_id" value="<?php if (!empty($last_timesheet_id)) { echo $last_timesheet_id;} ?>">
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
                                        <!-- attachemnt bootstrap container end -->
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
                        </div>
                      </div>	
                  <!-- end form -->
                  </div>
          <div class='text-left finish-btn container'>
              <a href="<?php echo site_url('project/edit/'.$project_id) ?>" class="btn btn-primary">Finish</a> 
          </div>
        </div>

<!-- end of tabs --> 
      </div>
    </div>
  </div>
 </div>

<script>

    $(document).ready(function() { 
      $(".fancybox").fancybox({
          width  : 1200,
          height : 900,
          type   :'iframe'
      });
    });
    $(document).on('click', '.no_preview', function() {
        var filename=$(this).text();
        $(".my_preview_download").attr("href", "uploads/"+filename);
        $(".download_filename").text(filename);
        $('#my_preview_form').modal('show');
        return false;
    });
    $(document).on("click", "#btn_finish_send", function() {

        submitForm();
    });
    $(document).on("click", "#next", function() {

        $('#next').hide();
        $('#finish').show();
    });

    $(document).on('click', '.notes_link', function() {

        var data = $(this).attr("data-desc");
        $('#notes_desc').text(data);
        $('#my_notes_description').modal('show');
    });

    $(document).on('click', '.external_link_data', function() {

        var data = $(this).attr("data-desc");
        $('#external_desc').text(data);
        $('#my_external_description').modal('show');
    });

    $(document).on("click", "#upload_form_data", function() {

        uploadForm();
    });
    $(document).on("click", "#notes_form_data", function() {

        noteForm();
    });

    $(document).on("click", "#external_form_data", function() {

        externalForm();
    });

    function show_notes_info(desc) {


        $('#notes_desc').text(desc);
        $('#my_notes_description').modal('show');
    }

    function isValidUrl(url) {
        var my_external_link = url;
        if (/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(my_external_link)) {
            return true;
        } else {
            return false;
        }
    }
    
    
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

</script>