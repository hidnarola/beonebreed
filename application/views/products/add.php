<style type="text/css">
    .color_red{
        color:red;
    }
    .color_grey{
        background-color: #888;
        color:#fff;
        padding:10px;
        font-weight: bold;
    }
    .hr-normal{
        margin-top: 10px !important;
        margin-bottom: 10px !important;
    }

</style>

<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
      <div class='row'>
        <div class='col-sm-12'>
          <div class='page-header'>
            <h1 class='pull-left'>
              <i class='icon-tint'></i>
              <span> Manage Product</span>
            </h1>
          </div>
        </div>
      </div>              
      <div class='row'>
        <div class='col-sm-12 box' style='margin-bottom: 0'>
          <div class='box-header purple-background'>
            <div class='title'>Product</div>
            <div class='actions'>
              <!-- <a class="btn btn-success" href="<?php echo base_url().'products/manage_product'; ?>">
                <i class='icon-plus'></i>
                Add Product  
              </a> -->
            </div>
          </div>
          <div class='box-content'>
            <div class='row'>
              <div class='col-sm-12'>
                <div class='tabbable'>
                  <ul class='nav nav-tabs'>
                    <li class='active'>
                      <a data-toggle='tab' href='#tab1'>
                        <i class='icon-indent-left'></i>
                        Admin
                      </a>
                    </li>
                    <li>
                      <a data-toggle='tab' href='#tab2'>
                        <i class='icon-edit text-red'></i>
                        Marketing
                      </a>
                    </li>
                    <li>
                      <a data-toggle='tab' href='#tab3'>
                        <i class='icon-ambulance text-blue'></i>
                        Attachments
                      </a>
                    </li>
                    <li>
                      <a data-toggle='tab' href='#tab4'>
                        <i class='icon-ambulance text-blue'></i>
                        Production
                      </a>
                    </li>
                    <li>
                      <a data-toggle='tab' href='#tab5'>
                        <i class='icon-ambulance text-blue'></i>
                        Quality
                      </a>
                    </li>
                  </ul>
                  <div class='tab-content'>
                    <div class='tab-pane active' id='tab1'>
                      <div class=''>
                          <div class='row'>
                            <div class='col-sm-12'>
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
                                        <h1> 33% </h1>
                                        <!-- <button class='btn btn-xs btn-success btn-next' data-last='Finish'>
                                          Next
                                          <i class='icon-arrow-right'></i>
                                        </button> -->
                                      </div>
                                    </div>
                                    
                                    <div class='step-content'>
                                        <hr class='hr-normal'>
                                        <div class='' id='step1'>
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
                                                            <a onclick="generate_upc_ean()" class="btn btn-success btn-lg">GENERATE</a>
                                                          </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <br/>
                                                        <div>
                                                            <input type="checkbox" name="complete_admin_part_1" id="complete_admin_part_1" > Part-1 Completed (33%)
                                                            <span class="color_red error_admin_part_1 hide">Please Check this checkbox for procced further.</span>
                                                        </div>    
                                                        <div class='form-group pull-right'>

                                                          <div class='controls'>
                                                            <input type="hidden" name="barcode_id" id="barcode_id" value="">
                                                            <a class="btn btn-success" onclick="validate_admin_part_1()" >
                                                                <i class='icon-save'></i> Save
                                                            </a>
                                                            <a href="" class="btn btn-default" >Cancel</a>
                                                          </div>
                                                        </div>
                                                    </div>    
                                                </div>                                                
                                            </form>
                                        </div>
                                        <hr class="hr-normal">
                                        <!--  =========== ADMIN TAB PART 2 START ===============  -->
                                        <form class="form" style="margin-bottom: 0;" method="post" action="#" 
                                              accept-charset="UTF-8" id="admin_part_2">
                                            <div class="row">
                                                <div class="col-sm-12 pull-left"> 
                                                    <span class="">
                                                        <h3 class="color_grey"> PART - 2 </h3>
                                                    </span>
                                                </div>
                                                
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

                                                </div>    
                                            </div>   
                                        </form>    
                                        <!--  =========== //ADMIN TAB PART 2 END ===============  -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class='tab-pane' id='tab2'>
                      <p>Marketing</p>
                    </div>
                    <div class='tab-pane' id='tab3'>
                      <p>Attachments</p>
                    </div>
                    <div class='tab-pane' id='tab4'>
                      <p>Production</p>
                    </div>
                    <div class='tab-pane' id='tab5'>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
</div>

<script type="text/javascript">

//------------------- ADMIN PART 1 START ---------------------/

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
        
    }

}

//------------------- //ADMIN PART 1 END ---------------------/


    
</script>