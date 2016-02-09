<!-- Modal -->
<div id="production_attachment_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Add Attachment </h4>
          </div>
          <div class="modal-body">
            
            <form method="post" id="production_attachment_form" enctype="multipart/form-data" >
                <div class='form-group'>
                  <label class='control-label' for='product_name'>Attachments</label>
                  <div class='controls'>
                        <input type="file" name="file" id="production_attachment_file" onchange="$('.error_upload_production').addClass('hide'); " >
                  </div>
                </div>   
                <!-- <input type="hidden" name="product_id" value="" id="attach_product_id"> -->
                <span class="color_red error_upload_production hide">Please Select file to upload</span>
            </form>    
          </div>
          <div class="modal-footer">
            <a class="btn btn-success" onclick="production_attachment_upload()"> Save </a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    </div>
</div>

<!-- download popup conatiner-->
<div class="container">
     <div class="modal fade" id="my_preview_production_form" role="dialog">
       <div class="modal-dialog">
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

<!--  =========== ATTACHMENT START ===============  -->
<div class='row'>
    <div class='col-sm-12'>
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
                                    <ul id="production_attachment" class="my_attachment tab-ul">

                                    </ul>
                                </div>
                            </div>
                            <!--end-->
                        </div> 

                      </div>
                    </div>
                    <div class='form-group pull-right'>
                      <div class='controls'>
                        <a class="btn btn-success" onclick="production_attachment_file()" >
                            <i class='icon-save'></i> ADD
                        </a>
                        <button class='btn btn-danger' type='button' id="delete_production_attachment">
                          <i class='icon-save'></i>
                          Remove
                        </button>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     
                </div>    
            </div>                                                
        </form>
    </div>
</div>


<!--  =========== PRODUCTION TAB PART 3 START ===============  -->
    <form method="post" id="production_part3" name="production_part3">
        <div class="row">
            <div class="col-sm-12 pull-left"> 
                <span class="">
                    <h3 class="color_grey"> PART - 3</h3>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="form-horizontal label-left">
                <div class="col-sm-12">    
                    <h3 style="margin: 0 0 15px;">PERMANENT MARKINGS AND LABELS</h3>
                </div>      

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">1</span> LOGO ON THE PRODUCT (Label, mark, etc)</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part3_switch1" id="production_part3_switch1" value="17">
                        </div>
                   </div>
                </div>


                <div class="details_main">
                    <label class="col-md-1 col-sm-2">Notes</label>
                    <div class="col-sm-5">
                       <textarea name="production_part3_notes1" id="production_part3_notes1" cols="30" rows="5" class="form-control" onkeyup="$('.error_production_part3_notes1').addClass('hide');"></textarea> 
                        <span class="color_red error_production_part3_notes1 hide">Field Is Required</span>
                    </div>

                    <div class="clearfix"></div>
                </div>

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">2</span> HAVE YOU SENT THE INFO TO SUPPLIER</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part3_switch2" id="production_part3_switch2" value="18">
                        </div>
                    </div>
                </div>

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">3</span> FINAL APPROVAL (Placement on the product and quality</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part3_switch3" id="production_part3_switch3" value="19">
                        </div>
                   </div>
                </div>

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">4</span> LAW LABELS FOR THE PRODUCT</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part3_switch4" id="production_part3_switch4" value="20">
                        </div>
                   </div>
                </div>

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">5</span> CARE LABELS FOR THE PRODUCT</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part3_switch5" id="production_part3_switch5" value="21">
                        </div>
                   </div>
                </div>

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">6</span> ANY SPECIAL INSTRUCTION WITH THE PRODUCT ?</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part3_switch6" id="production_part3_switch6" value="22">
                        </div>
                    </div>
                </div>

                <div class="label_main">   
                   <div class="col-sm-9">
                        <p><span class="check-list-number">7</span> HAVE YOU SENT ALL THE INFO ABOVE TO THE SUPPLIER</p>     
                    </div>
                    <div class="col-sm-3">
                       <!-- <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                       <input type='checkbox' name="switch_11" id="11" value="11"> -->
                    </div>
                </div>

                <div class="details_main">
                    <label class="col-md-1 col-sm-2"></label>
                    <div class="col-sm-5">
                        <textarea name="production_part3_notes2" id="production_part3_notes2" cols="30" rows="5" class="form-control" onkeyup="$('.error_production_part3_notes2').addClass('hide');"></textarea> 
                        <span class="color_red error_production_part3_notes2 hide">Field Is Required</span>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>   
        </div>    

        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="checkbox" name="chkbox_production_part3" id="chkbox_production_part3"> Part-3 Completed (20%)
                        <br>
                        <span class="color_red error_production_part3 hide">Please Check this checkbox to procced further.</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group pull-right">
                          <div class="controls">
                            <input type="hidden" name="production_part3_h1" id="production_part3_h1">
                            <input type="hidden" name="production_part3_h2" id="production_part3_h2">
                            <input type="hidden" name="production_part3_h3" id="production_part3_h3">
                            <input type="hidden" name="production_part3_h4" id="production_part3_h4">
                            <input type="hidden" name="production_part3_h5" id="production_part3_h5">
                            <input type="hidden" name="production_part3_h6" id="production_part3_h6">
                            <input type="hidden" name="production_part3_h7" id="production_part3_h7">
                            <a class="btn btn-success" onclick="validate_production_part_3()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="<?php echo base_url()."products"; ?>" class="btn btn-default">Cancel</a>
                          </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </form>
<!--  =========== //PRODUCTION TAB PART 3 END ===============  -->

<!--  =========== PRODUCTION TAB PART 4 START ===============  -->
    <form method="post" id="production_part4" name="production_part4">
        <div class="row">
            <div class="col-sm-12 pull-left"> 
                <span class="">
                    <h3 class="color_grey"> PART - 4</h3>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="form-horizontal label-left">
                <div class="col-sm-12">    
                    <h3 style="margin: 0 0 15px;">MARKINGS FOR THE MASTER BOX</h3>
                </div>      

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">1</span> MASTER BOX MARKINGS SENT TO THE SUPPLIER</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part4_switch1" id="production_part4_switch1" value="24">
                        </div>
                    </div>
                </div>
                    
                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">2</span> File saved to the server</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part4_switch2" id="production_part4_switch2" value="25">
                        </div>
                    </div>
                </div>
            </div>
        </div>    

        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="checkbox" name="chkbox_production_part4" id="chkbox_production_part4"> Part-4 Completed (20%)
                        <br>
                        <span class="color_red error_production_part4 hide">Please Check this checkbox to procced further.</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group pull-right">
                          <div class="controls">
                            <input type="hidden" name="production_part4_h1" id="production_part4_h1">
                            <input type="hidden" name="production_part4_h2" id="production_part4_h2">
                            <a class="btn btn-success" onclick="validate_production_part_4()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="<?php echo base_url()."products"; ?>" class="btn btn-default">Cancel</a>
                          </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </form>
<!--  =========== //PRODUCTION TAB PART 4 END ===============  -->

<!--  =========== PRODUCTION TAB PART 5 START ===============  -->
    <form method="post" id="production_part5">
        <div class="row">
            <div class="col-sm-12 pull-left"> 
                <span class="">
                    <h3 class="color_grey"> PART - 5</h3>
                </span>
            </div>
        </div>

        <div class="row">
            <div class="form-horizontal label-left">
                <div class="col-sm-12">    
                    <h3 style="margin: 0 0 15px;">FIRST INSPECTION</h3>
                </div>      

                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">1</span> DOCUMENTATION FOR THE INSPECTOR (WHAT TO INSPECT ?)</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part5_switch1" id="production_part5_switch1" value="26">
                        </div>
                    </div>
                </div>
                
                 <div class="details_main">
                    <label class="col-md-1 col-sm-2">Notes</label>
                    <div class="col-sm-5">
                        <textarea cols="30" rows="5" class="form-control" name="production_part5_notes1" id="production_part5_notes1" onkeyup="$('.error_production_part5_notes1').addClass('hide');"></textarea> 
                        <span class="color_red error_production_part5_notes1 hide">Field Is Required</span>
                    </div>
                    <div class="clearfix"></div>
                </div>

                    
                <div class="label_main">   
                    <div class="col-sm-9">
                        <p><span class="check-list-number">2</span> DOCUMENTATION SENT TO THE INSPECTOR</p>     
                    </div>
                    <div class="col-sm-3">
                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                            <input type='checkbox' name="production_part5_switch2" id="production_part5_switch2" value="27">
                        </div>
                    </div>
                </div>
            </div>
        </div>    

        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="checkbox" name="chkbox_production_part5" id="chkbox_production_part5"> Part-5 Completed (20%)
                        <br>
                        <span class="color_red error_production_part5 hide">Please Check this checkbox to procced further</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group pull-right">
                          <div class="controls">
                            <input type="hidden" name="production_part5_h1" id="production_part5_h1">
                            <input type="hidden" name="production_part5_h2" id="production_part5_h2">
                            <a class="btn btn-success" onclick="validate_production_part_5()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="<?php echo base_url()."products"; ?>" class="btn btn-default">Cancel</a>
                          </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </form>
<!--  =========== //PRODUCTION TAB PART 5 END ===============  -->

<script type="text/javascript">

    //----------------------------------------------------------------------
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
        $('#my_preview_production_form').modal('show');
        return false;
    });

    // validation Upload Attachments
    /*  By pav */
    function production_attachment_file(){
        var product_id = $('#product_id').val();
        if(product_id == ''){
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }
        $('#production_attachment_modal').modal('show');
    }
    //----------------------------------------------------------------------
    
    // production_attachment_file Upload Attachments
    /*  By pav */
    function production_attachment_upload(){
        if(document.getElementById("production_attachment_file").value != "") {
           var product_id = $('#product_id').val();
            var tab='production';
            var form_data = new FormData($("#production_attachment_form")[0]);
            form_data.append("product_id", product_id);
            form_data.append("tab", tab);
           $.ajax({
               url: '<?php echo base_url()."products/product_attachment"; ?>',
               processData: false,
               type: 'post',
               dataType: 'json',
               data: form_data,

               contentType: false,
               success:function(response){
                     if (response.status == 'success') {
                        $('#production_attachment_modal').modal('hide');
                        var filename=response.file_name;
                        var ext1 = filename.split('.').pop();
                        var ext = ext1.toLowerCase();

                        if(ext=='pdf' || ext=='jpg' || ext=='png' || ext=='gif'){
                          var classname='fancybox';
                        }else{
                          var classname='no_preview';
                        }
                        $('#production_attachment').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_production_attachment" class=chk_notes value='+response.id+'><a  class='+classname+'  href=uploads/products/' + response.file_name + '>' + response.file_name + '</a></li>');   
                        $('#attachment_tab')[0].reset();
                } else {
                    $("#error_upload_production").append(response.msg);
                }
              }
           });
           
        }else{
            $('.error_upload_production').removeClass('hide');
        }
    }

    $('#delete_production_attachment').click(function() {
        var prod_id = $('#product_id').val();
        var cek_id = new Array();
        $('#chk_production_attachment:checked').each(function() {
            cek_id.push($(this).val());// an array of selected values
        });
        if (cek_id.length == 0) {
            alert("Please select atleast one checkbox");
        } else {
            
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: '<?php echo base_url() . "products/delete_production_tab_selected_attachemnt"?>',
                    type: 'post',
                    data: {ids: cek_id,pid: product_id},
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#production_attachment').html(data.data1);
                        }
                    }
                });
            } else {
                return false;
            }

        }
    });
    //----------------------------------------------------------------------


    // production_part_3 Add More & Save Functionality Start
    /*  By pav */
    function validate_production_part_3(){
        var error_cnt = 0;
        var product_id = $('#product_id').val();
        
        var production_part3_notes1 = $('#production_part3_notes1').val();
        var production_part3_notes2 = $('#production_part3_notes2').val();
        var complete_production_part3 = validate_checkbox('chkbox_production_part3');

        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        if(production_part3_notes1 === ''){ $('.error_production_part3_notes1').removeClass('hide'); error_cnt++; }else{ $('.error_production_part3_notes1').addClass('hide'); }
        if(production_part3_notes2 === ''){ $('.error_production_part3_notes2').removeClass('hide'); error_cnt++; }else{ $('.error_production_part3_notes2').addClass('hide'); }
        if(complete_production_part3 === false){ $('.error_production_part3').removeClass('hide'); error_cnt++; }else{ $('.error_production_part3').addClass('hide'); }

        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#production_part3").serializeArray();
            form_data.push({name:"product_id",value:product_id});
            
            $.ajax({
               url: '<?php echo base_url()."products/production_part3"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                    if(data.status=="success"){
                        $('#production_part3_h1').val(data.production_part3_1);
                        $('#production_part3_h2').val(data.production_part3_2);
                        $('#production_part3_h3').val(data.production_part3_3);
                        $('#production_part3_h4').val(data.production_part3_4);
                        $('#production_part3_h5').val(data.production_part3_5);
                        $('#production_part3_h6').val(data.production_part3_6);
                        $('#production_part3_h7').val(data.production_part3_7);
                        //alert(document.getElementById('production_part3_h1').value);
                        $('#chkbox_production_part3').attr('disabled',true); // Disable Checkbox
                        $('.percentage_complete_production').html(data.complete_bar_no+'%'); // Update Percentage for product update
                        $('.part_3_production').addClass('active'); 
                        return false;
                    }
               }
            });
        }   
    }
    //----------------------------------------------------------------------

     // production_part_4 Add More & Save Functionality Start
    /*  By pav */
    function validate_production_part_4(){
        var error_cnt = 0;
        var product_id = $('#product_id').val();
   
        var complete_production_part4 = validate_checkbox('chkbox_production_part4');

        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        if(complete_production_part4 === false){ $('.error_production_part4').removeClass('hide'); error_cnt++; }else{ $('.error_production_part4').addClass('hide'); }

        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#production_part4").serializeArray();
            form_data.push({name:"product_id",value:product_id});
            
            $.ajax({
               url: '<?php echo base_url()."products/production_part4"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                    if(data.status=="success"){
                        $('#production_part4_h1').val(data.production_part4_1);
                        $('#production_part4_h2').val(data.production_part4_2);
                        
                        $('#chkbox_production_part4').attr('disabled',true); // Disable Checkbox
                        $('.percentage_complete_production').html(data.complete_bar_no+'%'); // Update Percentage for product update
                        $('.part_4_production').addClass('active'); 
                        return false;
                    }
               }
            });
        }  
    }
    //----------------------------------------------------------------------

     // production_part_5 Add More & Save Functionality Start
    /*  By pav */
    function validate_production_part_5(){
        var error_cnt = 0; 
        var product_id = $('#product_id').val();
        var production_part5_notes1 = $('#production_part5_notes1').val();
        var complete_production_part5 = validate_checkbox('chkbox_production_part5');

        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        if(production_part5_notes1 === ''){ $('.error_production_part5_notes1').removeClass('hide'); error_cnt++; }else{ $('.error_production_part5_notes1').addClass('hide'); }
        if(complete_production_part5 === false){ $('.error_production_part5').removeClass('hide'); error_cnt++; }else{ $('.error_production_part5').addClass('hide'); }
    
        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#production_part5").serializeArray();
            form_data.push({name:"product_id",value:product_id});
            
            $.ajax({
               url: '<?php echo base_url()."products/production_part5"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                    if(data.status=="success"){
                        $('#production_part5_h1').val(data.production_part5_1);
                        $('#production_part5_h2').val(data.production_part5_2);
                        $('#chkbox_production_part5').attr('disabled',true); // Disable Checkbox
                        $('.percentage_complete_production').html(data.complete_bar_no+'%'); // Update Percentage for product update
                        $('.part_5_production').addClass('active'); 
                        return false;
                    }
               }
            });
        }  
    }
    //----------------------------------------------------------------------    
</script>