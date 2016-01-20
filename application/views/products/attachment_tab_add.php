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
                        <input type="file" name="prod_attachment" id="prod_attachment" onchange="$('.error_upload').addClass('hide'); " >
                  </div>
                </div>   
                <input type="hidden" name="product_id" value="1">
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
                            <ul id="attachment" class="tab-ul"> 
                                <li style="list-style:none">
                                    <input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="">
                                    <a class="fancybox" href='' ></a>
                                </li>
                            </ul>
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

                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                            Open Modal
                        </button> -->

                        <a href="" class="btn btn-default" >Cancel</a>
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
    function attachment_file(){

        var product_id = $('#product_id').val();
        if(product_id == ''){
            // $(function(){ bootbox.alert('Please create product in Part-1.');  });
            // return false;
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
               success:function(data){
                    alert(data);
               }
           });
           
        }else{
            $('.error_upload').removeClass('hide');
        }
    }
</script>