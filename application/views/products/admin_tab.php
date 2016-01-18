<div class='box'>
    <div class='box-content box-padding'>
        <div class='fuelux'>
            <div class='wizard'>
              <ul class='steps'>
                <li class='active'>
                  <span class='step'>Part - 1</span>
                </li>
                <li data-target='#step2'>
                  <span class='step'>Part - 2</span>
                </li>
                <li data-target='#step3'>
                  <span class='step'>Part - 3</span>
                </li>
              </ul>
              <div class='actions'>
                <h1 id="percentage_complete"> 0% </h1>
              </div>
            </div>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
        <hr class='hr-normal'>
        <!--  =========== ADMIN TAB PART 1 START ===============  -->
        <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="admin_part_1">
            <div class="row">
                <div class="col-sm-12 pull-left"> 
                    <span class="">
                        <h3 class="color_grey"> PART - 1 </h3>
                    </span>
                </div>
                <div class="col-sm-6">
                    <div class='form-group'>
                      <label class='control-label' for='product_name'>Product</label>
                      <div class='controls'>
                        <input class='form-control' id='product_name' name="product_name" 
                               placeholder='Product Name' type='text' onkeyup="$('.error_product_name').addClass('hide');">
                        <span class="color_red hide error_product_name" >Plese Enter Product name </span>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='inputText'>Category</label>
                      <div class='controls'>
                        <select name="category" id="category" class="form-control">
                            <?php 
                                if(!empty($categories)) { 
                                    foreach($categories as $category) {
                            ?>
                            <option value="<?php echo $category['short_name']; ?>"><?php echo $category['name']; ?></option>
                            <?php } } ?>
                        </select>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='category'>Brand</label>
                      <div class='controls'>
                        <select name="brand_name" id="brand_name" class="form-control">
                            <?php 
                                if(!empty($brands)) { 
                                    foreach($brands as $brand) {
                            ?>
                            <option value="<?php echo $brand['id']; ?>"><?php echo $brand['brand_name']; ?></option>
                            <?php } } ?>
                        </select>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='description'>Description</label>
                      <div class='controls'>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class='form-group'>
                      <label class='control-label' for='upc'>UPC</label>
                      <div class='controls'>
                        <input class='form-control' readonly name="upc" id='upc' placeholder='UPC' type='text'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='ean'>EAN</label>
                      <div class='controls'>
                        <input class='form-control' readonly name="ean" id='ean' placeholder='EAN' type='text'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='prod_code'>Product Code</label>
                      <div class='controls'>
                        <input class='form-control ' readonly name="prod_code" id='prod_code' placeholder='Product Code' type='text'>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class='form-group '>
                      <div class='controls pull-left'>
                        <span class="color_red error_generate hide">Please generate product code</span>
                      </div>  
                      <div class='controls pull-right'>
                        <a onclick="generate_upc_ean()" id="generate_barcode" class="btn btn-success btn-lg">GENERATE</a>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <div>
                        <input type="checkbox" name="complete_admin_part_1" id="complete_admin_part_1" > Part-1 Completed (33%)
                        <br/>
                        <span class="color_red error_admin_part_1 hide">Please Check this checkbox to procced further.</span>
                    </div>    
                    <div class='form-group pull-right'>

                      <div class='controls'>
                        <input type="hidden" name="barcode_id" id="barcode_id" value="">
                        <input type='hidden' name="product_id" id="product_id" >
                        <a class="btn btn-success" onclick="validate_admin_part_1()" >
                            <i class='icon-save'></i> Save
                        </a>
                        <a href="" class="btn btn-default" >Cancel</a>
                      </div>
                    </div>
                </div>    
            </div>                                                
        </form>
        <!--  =========== // END TAB-1 ===============  -->
        <hr class="hr-normal">
        <!--  =========== ADMIN TAB PART 2 START ===============  -->
        <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="admin_part_2">
            <div class="row">
                <div class="col-sm-12 pull-left"> 
                    <span class="">
                        <h3 class="color_grey"> PART - 2 </h3>
                    </span>
                </div>
                
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h4> RETAIL UNIT DIMENSION </h4>
                        <br/>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='r_length' onkeyup="dm3_retail_func()" name="r_length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='r_width' onkeyup="dm3_retail_func()" name="r_width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='r_height' onkeyup="dm3_retail_func()" name="r_height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='gross_weight' name="gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='net_weight' name="net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >DM3</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_retail' readonly name="dm3_retail" 
                                   placeholder='DM3 Retail' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-sm-6">
                        <h4> MASTERCASE DIMENSION (CMA) </h4>
                        <br/>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='gross_weight' name="gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='net_weight' name="net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >DM3</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_retail' name="dm3_retail" 
                                   placeholder='DM3 Retail' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>    

                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h4> INNERCASE DIMENSION (CIN) </h4>
                        <br/>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='gross_weight' name="gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='net_weight' name="net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >DM3</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_retail' name="dm3_retail" 
                                   placeholder='DM3 Retail' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-sm-6">
                        <h4> PALLET DIMENSION (PAL) </h4>
                        <br/>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='' name="height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='gross_weight' name="gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='net_weight' name="net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-center'>
                            <div class='controls'>
                                <label class='control-label' >DM3</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_retail' name="dm3_retail" 
                                   placeholder='DM3 Retail' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>                        
                    </div>
                </div>    
                
                <div class="col-sm-12">
                    <div class='form-group pull-right'>
                        <div class='controls'>
                            <input type="hidden" name="" id="" value="">
                            <a class="btn btn-success" onclick="validate_admin_part_2()" >
                                <i class='icon-save'></i> Save
                            </a>
                            <a href="" class="btn btn-default" >Cancel</a>
                        </div>
                    </div>
                </div>
            </div>   
        </form>    
        <!--  =========== //END TAB-2 ===============  -->
        <hr class="hr-normal">
        <!--  =========== ADMIN TAB PART 3 START ===============  -->
        <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="admin_part_3">
            <div class="row">
                <div class="col-sm-12 pull-left"> 
                    <span class="">
                        <h3 class="color_grey"> PART - 3 </h3>
                    </span>
                </div>
                <div class="col-sm-6">
                    <div class='form-group'>
                      <label class='control-label' for='product_name'>MRSP CANADA</label>
                      <div class='controls'>
                        <input class='form-control' id='mrsp_canada' name="mrsp_canada" 
                               placeholder='Please enter MRSP CANADA' type='text' onkeyup="$('.error_mrsp_canada').addClass('hide');">
                        <span class="color_red hide error_mrsp_canada" >Plese Enter MRSP CANADA </span>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='product_name'>HS CODE</label>
                      <div class='controls'>
                        <input class='form-control' id='hs_code' name="hs_code" 
                               placeholder='Please enter HS CODE' type='text' onkeyup="$('.error_hs_code').addClass('hide');">
                        <span class="color_red hide error_hs_code" >Plese Enter HS CODE </span>
                      </div>
                    </div>
                    
                </div>
                <div class="col-sm-6">
                    <div class='form-group'>
                      <label class='control-label' for='product_name'>HS CODE</label>
                      <div class='controls'>
                        <input class='form-control' id='hs_code' name="hs_code" 
                               placeholder='Please enter HS CODE' type='text' onkeyup="$('.error_hs_code').addClass('hide');">
                        <span class="color_red hide error_hs_code" >Plese Enter HS CODE </span>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='control-label' for='product_name'>HS CODE</label>
                      <div class='controls'>
                        <input class='form-control' id='hs_code' name="hs_code" 
                               placeholder='Please enter HS CODE' type='text' onkeyup="$('.error_hs_code').addClass('hide');">
                        <span class="color_red hide error_hs_code" >Plese Enter HS CODE </span>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <div>
                        <input type="checkbox" name="complete_admin_part_1" id="complete_admin_part_1" > Part-3 Completed (34%)
                        <span class="color_red error_admin_part_1 hide">Please Check this checkbox for procced further.</span>
                    </div>    
                    <div class='form-group pull-right'>

                      <div class='controls'>
                        <input type="hidden" name="" id="" value="">
                        <a class="btn btn-success" onclick="validate_admin_part_3()" >
                            <i class='icon-save'></i> Save
                        </a>
                        <a href="" class="btn btn-default" >Cancel</a>
                      </div>
                    </div>
                </div>    
            </div>                                                
        </form> 
        <!--  =========== //END TAB-3 ===============  -->
    </div>
</div>


<script type="text/javascript">

//------------------- ADMIN PART 1 START ---------------------/

    // For generate UPC and EAN number     
    function generate_upc_ean(){
        
        $('.error_generate').addClass('hide');
        var cat_id = $('#category').val();

        $.ajax({
            url: '<?php echo base_url()."products/generate_upc_ean"; ?>',
            type: 'POST',
            dataType: 'json',
            data: {cat_id: cat_id},
            success:function(data){
                $('#upc').val(data.upc);
                $('#ean').val(data.ean);
                $('#prod_code').val(data.product_code);
                $('#barcode_id').val(data.id);
            }
        });
    }

    //Check Value is an Integer
    function isInt(n) {
       return n % 1 === 0;
    }

    // validation for Checkbox weather it is checked or not? 
    function validate(field_name) {
        if (document.getElementById(field_name).checked) {
            return true;
        } else {
            return false;
        }
    }

    function validate_admin_part_1(){
        
        var error_cnt = 0;
        var product_name = $('#product_name').val();
        product_name = $.trim(product_name);
        
        var upc = $('#upc').val();
        var ean = $('#ean').val();
        var prod_code = $('#prod_code').val();
        var complete_admin_part_1 = validate('complete_admin_part_1');

        
        
        var form_data = $("#admin_part_1").serializeArray();

        if(product_name == ''){ $('.error_product_name').removeClass('hide'); error_cnt++; }else{ $('.error_product_name').addClass('hide'); }
        if(upc == '' || ean == '' || prod_code==''){ $('.error_generate').removeClass('hide'); error_cnt++; }else{ $('.error_generate').addClass('hide');  }
        if(complete_admin_part_1 == false){ $('.error_admin_part_1').removeClass('hide'); error_cnt++; }else{ $('.error_admin_part_1').addClass('hide');}

        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
           $.ajax({
               url: '<?php echo base_url()."products/admin_form_tab_1"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                    $('#product_id').val(data.product_id);
                    $('#complete_admin_part_1').attr('disabled',true);
                    $('#generate_barcode').attr('disabled',true);
                    $('#percentage_complete').html('33%');
               }
           });
           
        }
    }

    function dm3_retail_func(){
        var r_length=1;
        var r_width=1;
        var r_height=1;
       
        r_length = parseFloat($('#r_length').val()); // set like if blank then 1
        r_width = parseFloat($('#r_width').val());  
        r_height = parseFloat($('#r_height').val()); 
        
        var r_dm3 = parseFloat(r_length*r_width*r_height)/1000;

        $('#dm3_retail').val(r_dm3);
    }

//------------------- //ADMIN PART 1 END ---------------------/

    
</script>