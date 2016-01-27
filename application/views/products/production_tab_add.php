<div class="complete-level">
    <h5>COMPLETE LEVEL</h5>
    <div class="inline-block complete-level-ul"> 
        <ul>
            <li class="part_1_admin">
                <span></span>
                <span>PART 1</span>
            </li>
            <li class="part_2_admin">
                <span></span>
                <span>PART 2</span>
            </li>
            <li>
                <span></span>
                <span>PART 3</span>
            </li>
            <li>
                <span></span>
                <span>PART 4</span>
            </li>
            <li>
                <span></span>
                <span>PART 5</span>
            </li>
        </ul>
    </div>
    <div class="inline-block complete-level-action">
        <h1 class="percentage_complete_admin"> 0% </h1>
    </div>
</div>

<!--  =========== PRODUCTION TAB PART 1 START ===============  -->
    <form method="post" id='production_part_1'>
        <div class="row">
            <div class="col-sm-12 pull-left"> 
                <span class="">
                    <h3 class="color_grey"> PART - 1 </h3>
                </span>
            </div>
        </div>
        <span class="span_production_tab_1">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="supplier_name_1">Supplier Name</label>
                      <div class="controls">
                        <input class="form-control" id="supplier_name_1" name="supplier_name_1" placeholder="Supplier name" 
                               type="text" onkeyup="$('.error_supplier_name_1').addClass('hide');">
                        <span class="color_red hide error_supplier_name_1">Plese Enter Supplier Name </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="country_1">Country</label>
                      <div class="controls">
                        <input class="form-control" id="country_1" name="country_1" placeholder="Country name" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="tel_no_1">Tel No</label>
                      <div class="controls">
                        <input class="form-control" id="tel_no_1" name="tel_no_1" placeholder="Telephone No" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="address_1">Address</label>
                      <div class="controls">
                        <textarea name="address_1" id="address_1" cols="30" rows="5" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="contact_name_1">Contact Name</label>
                      <div class="controls">
                        <input class="form-control" name="contact_name_1" id="contact_name_1" placeholder="Contact Name" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="contact_email_1">Contact Email</label>
                      <div class="controls">
                        <input class="form-control" name="contact_email_1" id="contact_email_1" placeholder="Contact Email" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="product_cost_1">Product Cost</label>
                      <div class="controls">
                        <input class="form-control " name="product_cost_1" id="product_cost_1" placeholder="Product Cost" type="text">
                      </div>
                    </div>
                    <div class="clearfix"></div>                    
                </div>    
            </div>
        </span> 
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="controls pull-right mar-b-20">
                    <a onclick="add_production_part_1()" class="btn btn-success">ADD</a>
                    <a onclick="add_production_part_1()" class="btn btn-danger">REMOVE</a>
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="checkbox" name="complete_production_part_1" id="complete_production_part_1"> Part-1 Completed (20%)
                        <br>
                        <span class="color_red error_admin_part_1 hide">Please Check this checkbox to procced further.</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group pull-right">
                          <div class="controls">
                            <input type="hidden" name="production_part_1_count" id="production_part_1_count" value="1">
                            <a class="btn btn-success" onclick="validate_admin_part_1()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="" class="btn btn-default">Cancel</a>
                          </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </form>

<!--  =========== //PRODUCTION TAB PART 1 END ===============  -->

<div class="row">
    <div class="col-sm-12 pull-left"> 
        <span class="">
            <h3 class="color_grey"> PART - 2 </h3>
        </span>
    </div>
</div>
<div class="row">
    <div class="form-horizontal label-left">
    <div class="col-sm-12">    
        <h3 style="margin: 0 0 15px;">Sample 1</h3>
    </div>    
    <div class="col-sm-12">
        <div class="form-group">
          <label class="control-label col-sm-2" for="product_name">Date:</label>
          <div class="col-sm-4">
          <div class="controls">
            <input class="form-control" id="product_name" name="product_name" placeholder="Date" type="text" onkeyup="$('.error_product_name').addClass('hide');">
            <span class="color_red hide error_product_name">Plese Enter Product name </span>
          </div>
      </div>
      <label class="control-label col-sm-1" for="product_name">Approved:</label>
      <div class="col-sm-5">
          <div class="controls">
            <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                  <input type='checkbox' name="switch_11" id="11" value="11">
                </div>
          </div>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="form-horizontal label-left">
    <div class="col-sm-12">
        <div class="form-group">
          <label class="control-label col-sm-2" for="upc">Notes</label>
          <div class="col-sm-10">
          <div class="controls">
            <input class="form-control"  name="upc" id="upc" type="text">
          </div>
      </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="ean">IMPROVMENTS NEEDED <br/>(IF ANY)</label>
          <div class="col-sm-10">
          <div class="controls">
            <input class="form-control"  name="ean" id="ean" placeholder="Improvement Needed" type="text">
          </div>
          </div>
        </div>
         </div>
         </div>
     </div> 
<div class="row">
    <div class="col-sm-6 col-sm-offset-6">
        <div class="controls pull-right mar-b-20">
            <a onclick="generate_upc_ean()" id="generate_barcode" class="btn btn-success">ADD</a>
            <a onclick="generate_upc_ean()" id="generate_barcode" class="btn btn-danger">REMOVE</a>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-6">
                <input type="checkbox" name="complete_admin_part_1" id="complete_admin_part_1"> Part-1 Completed (33%)
                <br>
                <span class="color_red error_admin_part_1 hide">Please Check this checkbox to procced further.</span>
            </div>
            <div class="col-sm-6">
                <div class="form-group pull-right">
                  <div class="controls">
                    <input type="hidden" name="barcode_id" id="barcode_id" value="">
                    <input type="hidden" name="product_id" id="product_id">
                    <a class="btn btn-success" onclick="validate_admin_part_1()">
                        <i class="icon-save"></i> Save
                    </a>
                    <a href="" class="btn btn-default">Cancel</a>
                  </div>
                </div>
            </div>
        </div>    
        
    </div>
</div>
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
                    <p>1- LOGO ON THE PRODUCT (Label, mark, etc)</p>     
               </div>
               <div class="col-sm-3">
                   <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                  <input type='checkbox' name="switch_11" id="11" value="11">
                </div>
               </div>
            </div>
            <div class="details_main">
                <label class="col-md-1 col-sm-2">Details</label>
                <div class="col-sm-7">
                   <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea> 
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="label_main">   
               <div class="col-sm-9">
                    <p>1- LOGO ON THE PRODUCT (Label, mark, etc)</p>     
               </div>
               <div class="col-sm-3">
                   <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                  <input type='checkbox' name="switch_11" id="11" value="11">
                </div>
               </div>
            </div>
            <div class="label_main">   
               <div class="col-sm-9">
                    <p>1- LOGO ON THE PRODUCT (Label, mark, etc)</p>     
               </div>
               <div class="col-sm-3">
                   <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                  <input type='checkbox' name="switch_11" id="11" value="11">
                </div>
               </div>
            </div>
            <div class="label_main">   
               <div class="col-sm-9">
                    <p>1- LOGO ON THE PRODUCT (Label, mark, etc)</p>     
               </div>
               <div class="col-sm-3">
                   <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                  <input type='checkbox' name="switch_11" id="11" value="11">
                </div>
               </div>
            </div>
            <div class="label_main">   
               <div class="col-sm-9">
                    <p>1- LOGO ON THE PRODUCT (Label, mark, etc)</p>     
               </div>
               <div class="col-sm-3">
                   <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                  <input type='checkbox' name="switch_11" id="11" value="11">
                </div>
               </div>
            </div>

        </div>   
        </div>
    

<script type="text/javascript"> 
    
    function add_production_part_1(){
        var production_part_1_count = $('#production_part_1_count').val();
        $.ajax({
            url: '<?php echo base_url()."products/production_add_more_tab_1"; ?>',
            type: 'POST',
            dataType: 'json',
            data: {production_part_1_count: production_part_1_count},
            success:function(data){
                $('.span_production_tab_1').append(data.add_more);
            }
        });        
    }    
    
</script>