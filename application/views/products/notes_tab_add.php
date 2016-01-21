<!-- Modal -->
<div id="my_notes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add Notes </h4>
          </div>
          <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_notes_form" >   
          <div class="modal-body">
                 <div class="row">
                    <div class="col-md-6">
                        <div class='' style='margin-bottom: 0;'>
                            <input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php if (!empty($last_project_id)) {echo $last_project_id;} ?>">
                            <div class='form-group'>
                                <label for='inputText'>Title</label><span style="color:red">*</span>
                                <input class='form-control'   type='text' name='notes_name' id="notes_title">
                                 <input type="hidden" name="product_id" value="" id="notes_project_id">
                                <span style="color:red" id="notes_err_msg"></span>
                            </div>
                            <div class="form-group">
                                <label for="comment">Description:</label>
                                <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                            </div>
                                <!--<button type="button" class="btn btn-success" id="notes_form_data">Save</button>-->
                            </div>
                        </div>
                    </div>

                  
          </div>
          <div class="modal-footer">
            <a class="btn btn-success" onclick="noteForm()"> Save </a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
           </form>    
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
                      <label class='control-label' for='product_name'>Notes</label>
                      <div class='controls'>
                        <div class="col-md-6">
                            <!--start-->
                            <div class='' style='margin-bottom: 0;'>
                                <div class="attachment_wrapper">
                                    <ul id="notes" class="tab-ul">

                                       
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
                        <a class="btn btn-success" onclick="notes_file()" >
                            <i class='icon-save'></i> ADD
                        </a>

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
        $(".my_preview_download").attr("href", "uploads/products"+filename);
        $(".download_filename").text(filename);
        $('#my_preview_form').modal('show');
        return false;
    });
    function notes_file(){

        var product_id = $('#product_id').val();
        if(product_id == ''){
            // $(function(){ bootbox.alert('Please create product in Part-1.');  });
            // return false;
        }

        $('#my_notes').modal('show');
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
            url: '<?php echo base_url()."products/product_notes"; ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {

                    $('#my_notes').modal('hide');
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
</script>
 