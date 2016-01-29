<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add Attachment </h4>
          </div>
          <div class="modal-body">
            
            <form method="post" id="attachment_form" enctype="multipart/form-data" >
                <div class='form-group'>
                  <label class='control-label' for='product_name'>Attachments</label>
                  <div class='controls'>
                        <input type="file" name="file" id="prod_attachment" onchange="$('.error_upload').addClass('hide'); " >
                  </div>
                </div>   
                <input type="hidden" name="product_id" value="" id="attach_project_id">
                <span class="color_red error_upload hide">Please Select file to upload</span>
            </form>    
          </div>
          <div class="modal-footer">
            <a class="btn btn-success" onclick="attachment_upload()"> Save </a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>

<!-- download popup conatiner-->
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
                                       
<!-- end of popup container -->


<!-- =========================================================== -->
<br/>
<br/>
<div class='row'>
    <div class='col-sm-12'>
        <!--  =========== ATTACHMENT START ===============  -->
        <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="attachment_tab">
            <div class="row">
                <div class="col-sm-6">
                    <div class='form-group'>
                      <label class='control-label' for='product_name'>Attachments</label>
                      <div class='controls'>
                        <div class="col-md-6">
                            <!--start-->
                            <div class='' style='margin-bottom: 0;'>
                                <div class="attachment_wrapper">
                                    <ul id="attachment" class="tab-ul">

                                       
                                    </ul>
                                </div>
                                <!--
                                <button class='btn btn-success' type='button' data-target="#myuploadModal" data-toggle="modal">
                                    <i class='icon-save'></i>
                                    Add
                                </button>-->
                            </div>
                            <!--end-->
                        </div> 

                      </div>
                    </div>
                    <div class='form-group pull-right'>

                      <div class='controls'>
                        <input type="hidden" name="barcode_id" id="barcode_id" value="">
                        <input type='hidden' name="product_id" id="product_id" >
                        <a class="btn btn-success" onclick="attachment_file()" >
                            <i class='icon-save'></i> ADD
                        </a>
                        <button class='btn btn-danger' type='button' id="delete_my_external_link">
                          <i class='icon-save'></i>
                          Remove
                      </button>

                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                            Open Modal
                        </button> -->

                       
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     
                    
                </div>    
            </div>                                                
        </form>
    </div>
</div>


<script type="text/javascript">
    
    $(document).ready(function() { 
      $(".fancybox").fancybox({
          width  : 1200,
          height : 900,
          type   :'iframe'
      });
    });
    $(document).on('click', '.no_preview', function() {
        var filename=$(this).text();
      $(".my_preview_download").attr("href", "uploads/products/"+filename);
        $(".download_filename").text(filename);
        $('#my_preview_form').modal('show');
        
        return false;
    });
    
    
     $('#delete_my_external_link').click(function() {
        var prod_id = $('#attach_project_id').val();
        var cek_id = new Array();
        $('#chk_attachment:checked').each(function() {
            cek_id.push($(this).val());// an array of selected values
        });
        if (cek_id.length == 0) {
            alert("Please select atleast one checkbox");
        } else {
            
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: '<?php echo base_url() . "products/delete_selected_attachemnt"; ?>',
                    type: 'post',
                    data: {ids: cek_id,pid: prod_id},
                    dataType: 'json',
                    success: function(data) {
                         $('#attachment').html(data.data1);

                        if (data.status == 'success') {
                          
                            $('#attachment').append(data.data1);
                        }
                    }
                });
            } else {
                return false;
            }

        }
    });

    
    function attachment_file(){

        var product_id = $('#product_id').val();
        if(product_id == ''){
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        $('#myModal').modal('show');
        return false;
    }

    function attachment_upload(){
        if(document.getElementById("prod_attachment").value != "") {

           var data = new FormData($("#attachment_form")[0]);

           $.ajax({
               url: '<?php echo base_url()."products/product_attachment"; ?>',
               processData: false, 
               type: 'post',
               dataType: 'json',
               data: data,
               contentType: false,
               success:function(response){
                    
                     if (response.status == 'success') {
                        $('#myModal').modal('hide');
                        $('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
                        var filename=response.file_name;
                        var ext1 = filename.split('.').pop();
                        var ext = ext1.toLowerCase();

                        if(ext=='pdf' || ext=='jpg' || ext=='png' || ext=='gif'){

                          var classname='fancybox';
                        }else{
                          var classname='no_preview';
                        }
                        $('#attachment').html('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_notes value='+response.id+'><a  class='+classname+'  href=uploads/products/' + response.file_name + '>' + response.file_name + '</a></li>');

                        //$('#attachment').append('<li style=list-style-type:none;><a class=fancybox target=_blank href=uploads/' + response.file_name + '>' + response.file_name + '</a></li>');
                        $('#attachment_tab')[0].reset();
                } else {

                    $("#file_err_msg").append(response.msg);
                }
              }
           });
           
        }else{
            $('.error_upload').removeClass('hide');
        }
    }
</script>
 