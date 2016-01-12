<div class='col-xs-12'>
  <div class='row'>
      <div class='col-sm-12'>
          <div class='page-header'>
              <h1 class='pull-left'>
                  <i class='icon-bookmark'></i>
                  <span>Manage Idea/Suggestion</span>
              </h1>
          </div>
      </div>
  </div>
  <div class='row'>
    <div class='col-sm-12'>
      <div class='box'>
        <div class='box-header orange-background'>
          <div class='title'>
            Add Idea/Suggestion
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
                                <li><a href="#profile" role="tab" data-toggle="tab">
                                        <i class="icon-file-text"></i> Notes
                                    </a>
                                </li>
                                <li><a href="#external" role="tab" data-toggle="tab">
                                        <i class="icon-external-link"></i> External Com
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
                                                        <li style="list-style:none"><a class="fancybox" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

                                                        <?php }  else { ?>

                                                          <li style="list-style:none"><a class="no_preview" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

                                                       <?php  }} ?> 
                                                    </ul>
                                                </div>
                                                <button class='btn btn-success' type='button' data-target="#myuploadModal" data-toggle="modal">
                                                    <i class='icon-save'></i>
                                                    Add
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
                                <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php if (!empty($last_project_id)) { echo $last_project_id;} ?>">
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
                                        <!-- bootstrap container for notes information -->
                    <div id="my_notes_description" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Notes</h4>
                                                    </div>
                                                    <div class="modal-body" id="notes_desc">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- bootstrap container for notes information ends -->
                      <div class="tab-pane fade" id="profile"> 
                          <div class="tab-pane fade active in" id="home">
                              <div class='' style='margin-bottom: 0;'>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div>
                                              <ul id="notes" class="tab-ul">

                                                  <?php foreach ($notes as $u_key) {
                                                      ?>
                                                  <li style="list-style:none"><a href="javascript:void(0)"  data-desc="<?php echo $u_key->description; ?>" class="notes_link" id="<?php echo $u_key->id; ?>"><?php echo $u_key->name; ?></a><span style="margin-left: 60px;"><?php $date = new DateTime($u_key->created_date); echo $date->format('d F Y'); ?></span></li>
                                                                                                                                                                                                                                                      <?php } ?> 

                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <hr>
                              <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_notes_form" >
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class='' style='margin-bottom: 0;'>
                                              <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php if (!empty($last_project_id)) {echo $last_project_id;} ?>">
                                              <div class='form-group'>
                                                  <label for='inputText'>Title</label><span style="color:red">*</span>
                                                  <input class='form-control'   type='text' name='notes_name' id="notes_title">
                                                  <span style="color:red" id="notes_err_msg"></span>
                                              </div>
                                              <div class="form-group">
                                                  <label for="comment">Description:</label>
                                                  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                              </div>
                                                  <button type="button" class="btn btn-success" id="notes_form_data">Save</button>
                                              </div>
                                          </div>
                                      </div>

                                  </form>    
                                </div>
                              </div>
                        <div class="tab-pane fade" id="external">
                            <div class="tab-pane fade active in" id="home">

                                 <div class='' style='margin-bottom: 0;'>
                                    <div class="row">
                                        <div class="col-md-6">

                                        <ul id="external_links" class="tab-ul">

                                                <?php foreach ($external_link as $u_key) { ?>

                                                <li style="list-style:none"><a href="javascript::void(0)" class="external_link_data" data-desc="<?php echo $u_key->description; ?>" ><?php echo $u_key->name; ?></a><span style="margin-left: 60px;"><?php $date = new DateTime($u_key->created_date); echo $date->format('d F Y'); ?></span></li>

                                                <?php } ?>

                                        </ul>
                                            </div>
                                    </div>
                                </div>
                                <hr>
                                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_external_form" >  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class='' style='margin-bottom: 0;'>
                                                <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php if (!empty($last_project_id)) {echo $last_project_id;} ?>">
                                            <div class='form-group'>
                                                <label for='inputText'>Title</label><span style="color:red">*</span>
                                                <input class='form-control' placeholder='Title' type='text' name='external_com' id="external_com">
                                                <span style="color:red" id="link_err_msg"></span>
                                            </div>
                                            <div class='form-group'>
                                              <label for='inputText'>Description</label>
                                              <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                                              <span style="color:red" id="link_err_msg"></span>
                                            </div>
                                            <button type="button" class="btn btn-success" id="external_form_data">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>      
                                <!-- bootstrap container for external notes information -->
                                <div id="my_external_description" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">External Com</h4>
                                      </div>
                                      <div class="modal-body" id="external_desc">

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                                <!-- bootstrap container for notes information ends -->
                            </div>
                          </div>
                        </div>
                      </div>	
                  <!-- end form -->
                  </div>
          <div class='text-left finish-btn container'>
              <a href="<?php echo site_url('suggestion') ?>" class="btn btn-primary">Finish</a> 
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
    function externalForm() {

        $('#link_err_msg').text('');
        var external_link = $('#external_com').val();

        if (external_link == '') {
            $('#link_err_msg').text('please enter title');
            $("#external_com").focus();
            return false;
        }


        var data = new FormData($("#project_external_form")[0]);
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('suggestion/suggestion_add_links'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {
                    $('#myexternalModal').modal('hide');

                    //$('#external_links').append( '<li style=list-style-type:none;><a data-desc="'+response.desc+'" class="notes_link" id="'+response.id+'" href="javascript::void(0)"></a></li>' );
                   // $("#external_links").append($("<li style=list-style-type:none;>").text(response.link_name));
                   // $('#external_links').append('<li style=list-style-type:none;><a data-desc="' + response.desc + '" class="notes_link_data" id="' + response.id + '" href="javascript::void(0)">' + description + '</a></li>');
                    $('#external_links').append('<li style=list-style-type:none;><a data-desc="' + response.link_desc + '" class="external_link_data"  href="javascript::void(0)">' + response.link_name + '</a><span style=margin-left:60px>'+response.dates1+'</span></li>');
                    $('#project_external_form')[0].reset();
                }
            }
        });

        return false;
    }
    function noteForm() {

        var data = new FormData($("#project_notes_form")[0]);
        $('#notes_err_msg').text('');
        var notes_title = $('#notes_title').val();


        if (notes_title == '') {
            $('#notes_err_msg').text('please enter notes title');
            $("#notes_name").focus();
            return false;
        }
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('suggestion/suggestion_add_notes'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {

                    $('#mynoteModal').modal('hide');
                    //var description = response.notes_name;
                    var d = new Date("d F Y",response.dates1);
                    $('#notes').append('<li style=list-style-type:none;><a data-desc="' + response.desc + '" class="notes_link" id="' + response.id + '" href="javascript::void(0)">' + response.notes_name + '</a><span style=margin-left:60px>'+response.dates1+'</span></li>');

                    // $('#notes').append(response.list);

                    //$("#notes").append($("<li style=list-style-type:none;>").text(response.notes_name));
                    $('#project_notes_form')[0].reset();
                } else {

                }
            }
        });

        return false;
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
            url: '<?php echo site_url('suggestion/suggestion_upload_form'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {
                    $('#myuploadModal').modal('hide');
                    $('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
                    var filename=response.file_name;
                    var ext1 = filename.split('.').pop();
                    var ext = ext1.toLowerCase();
                    
                    if(ext=='pdf' || ext=='jpg' || ext=='png' || ext=='gif'){
                      
                      var classname='fancybox';
                    }else{
                      var classname='no_preview';
                    }
                   
                    $('#attachment').append('<li style=list-style-type:none;><a  class='+classname+'  href=uploads/' + response.file_name + '>' + response.file_name + '</a></li>');
                  
                    //$('#attachment').append('<li style=list-style-type:none;><a class=fancybox target=_blank href=uploads/' + response.file_name + '>' + response.file_name + '</a></li>');
                    $('#project_upload_form')[0].reset();
                } else {

                    $("#file_err_msg").append(response.msg);

                }
            }
        });

        return false;
    }

</script>