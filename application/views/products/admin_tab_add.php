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
        </ul>
    </div>
    <div class="inline-block complete-level-action">
        <h1 class="percentage_complete_admin"> 0% </h1>
    </div>
</div>

<div class='row'>
    <div class='col-sm-12'>
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
                        <div class='form-group col-sm-4 text-left'>
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
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
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
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
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
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='r_gross_weight' onkeyup="$('.error_retail').html('');" name="r_gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='r_net_weight' onkeyup="$('.error_retail').html('');" name="r_net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' > </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_retail' readonly name="dm3_retail" 
                                   placeholder='DM3 Retail' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">DM3</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <span class="color_red error_retail"></span>
                    </div>

                    <div class="col-sm-6 border-left">
                        <h4> MASTERCASE DIMENSION (CMA) </h4>
                        <br/>
                        <div class='form-group col-sm-2 text-left'>
                            <div class='controls'>
                                <label class='control-label' >UPC</label>
                            </div>    
                        </div> 
                        <div class='form-group col-sm-6'>
                          <div class='controls'>
                            <input class='form-control' id='m_upc' readonly name="m_upc" 
                                   placeholder='UPC' type='text' >       
                          </div>
                        </div>
                         <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                                <a onclick="event.preventDefault(); m_upc_get(); $('.error_master_case').html('');" class="btn btn-g-bar-code btn-success">G</a>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='m_length' onkeyup="dm3_mastercase();" name="m_length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='m_width' onkeyup="dm3_mastercase()" name="m_width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='m_height' onkeyup="dm3_mastercase()" name="m_height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='m_gross_weight' onkeyup="$('.error_master_case').html('');" name="m_gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='m_net_weight' onkeyup="$('.error_master_case').html('');" name="m_net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' > </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_master' readonly name="dm3_master" 
                                   placeholder='DM3 Mastercase' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">DM3</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label'> NO OF PC IN CASE </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='no_pc_master' onkeyup="$('.error_master_case').html('');" name="no_pc_master" 
                                   placeholder=' No Of PC in CASE' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <span class="color_red error_master_case"></span>
                    </div>
                </div>    

                <div class="col-sm-12">
                    <div class="col-sm-6 ">
                        <h4> INNERCASE DIMENSION (CIN) </h4>
                        <br/>
                        <div class='form-group col-sm-2 text-left'>
                            <div class='controls'>
                                <label class='control-label' >UPC</label>
                            </div>    
                        </div> 
                        <div class='form-group col-sm-6'>
                          <div class='controls'>
                            <input class='form-control' id='i_upc' readonly name="i_upc" 
                                   placeholder='UPC' type='text' >       
                          </div>
                        </div>
                         <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                                <a onclick="event.preventDefault(); i_upc_get()" class="btn btn-g-bar-code btn-success">G</a>
                          </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' onkeyup="dm3_inner_func()" id='i_length' name="i_length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control'onkeyup="dm3_inner_func()" id='i_width' name="i_width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' onkeyup="dm3_inner_func()" id='i_height' name="i_height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='i_gross_weight' name="i_gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='i_net_weight' name="i_net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' > </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_inner' readonly name="dm3_inner" 
                                   placeholder='DM3 INNER' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">DM3</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label'> NO OF PC IN CASE </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='no_pc_inner' name="no_pc_inner" 
                                   placeholder='No Of PC in INNER CASE' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-sm-6 border-left">
                        <h4> PALLET DIMENSION (PAL) </h4>
                        <br/>

                        <div class='form-group col-sm-2 text-left'>
                            <div class='controls'>
                                <label class='control-label' >UPC</label>
                            </div>    
                        </div> 
                        <div class='form-group col-sm-6'>
                          <div class='controls'>
                            <input class='form-control' id='p_upc' readonly name="p_upc" 
                                   placeholder='UPC' type='text' >       
                          </div>
                        </div>
                         <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                                <a onclick="event.preventDefault(); p_upc_get();$('.error_pallet').html('');" class="btn btn-g-bar-code btn-success">G</a>
                          </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >LENGTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' onkeyup="dm3_pallet_func()" id='p_length' name="p_length" 
                                   placeholder='Length' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >WIDTH</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' onkeyup="dm3_pallet_func()" id='p_width' name="p_width" 
                                   placeholder='Width' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >HEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' onkeyup="dm3_pallet_func()" id='p_height' name="p_height" 
                                   placeholder='Height' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">CM</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >GROSS WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='p_gross_weight' onkeyup="$('.error_pallet').html('');" name="p_gross_weight" 
                                   placeholder='Gross Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' >NET WEIGHT</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='p_net_weight' onkeyup="$('.error_pallet').html('');" name="p_net_weight" 
                                   placeholder='Net Weight' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">KG</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' ></label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='dm3_pallet' readonly name="dm3_pallet" 
                                   placeholder='DM3 Pallet' type='text' >       
                          </div>
                        </div>
                        <div class='form-group col-sm-4 padding-l-0'>
                          <div class='controls'>
                            <p class="input-sub">DM3</p>
                          </div>
                        </div>
                        <div class="clearfix"></div>   
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' > CASE/ROW</label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='p_case_row' onkeyup="cma_per_pal();" name="p_case_row" 
                                   placeholder=' CASE/ROW ' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>        
                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' > # of ROWS </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='p_no_of_row' onkeyup="cma_per_pal()" name="p_no_of_row" 
                                   placeholder='# of ROWS' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label' > CMA PER PAL </label>
                            </div>    
                        </div>    
                        <div class='form-group col-sm-4'>
                          <div class='controls'>
                            <input class='form-control' id='p_cma_per_pal' readonly name="p_cma_per_pal" 
                                   placeholder='CMA PER PAL' type='text' >       
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <span class="color_red error_pallet"></span>
                    </div>
                </div>    
                
                <div class="col-sm-12">
                    <div class='form-group col-sm-4 text-left'>
                            <div class='controls'>
                                <label class='control-label check-box-margin'>
                                    <input type="checkbox" name="complete_admin_part_2" id="complete_admin_part_2"> <span>PART 2 COMPLETED (33%)</span>
                                </label>
                                <br/>
                                <span class="hide  color_red error_admin_part_2">Plese Check this checkbox to proceed further.</span>
                            </div>    
                        </div>
                    
                    <div class='form-group pull-right'>
                        <div class='controls'>
                            <input type="hidden" name="" id="" value="">
                            <input type="hidden" name="product_retail_id" id="product_retail_id">
                            <input type="hidden" name="product_master_id" id="product_master_id">
                            <input type="hidden" name="product_pallet_id" id="product_pallet_id">
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
                      <label class='control-label' for='product_name'>MRSP INTERNTIONAL</label>
                      <div class='controls'>
                        <input class='form-control' id='hs_code' name="hs_code" 
                               placeholder='Please MRSP INTERNATIONAL' type='text' onkeyup="$('.error_hs_code').addClass('hide');">
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
                      <label class='control-label' for='product_name'>COUNTRY OF ORIGIN</label>
                      <div class='controls'>
                        <input class='form-control' id='hs_code' name="hs_code" 
                               placeholder='Please enter Country of origin' type='text' onkeyup="$('.error_hs_code').addClass('hide');">
                        <span class="color_red hide error_hs_code" >Plese Enter HS CODE </span>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                </div> 

                <div class="clearfix"></div>
               <div class="col-sm-12">
                    <h4> CHECK LIST </h4>
                    <div class="row check-list">
                        <div class="col-sm-6">
                            <span class="check-list-number">1</span>
                            <label class='control-label'>HAVE YOU SENT THE UPC CODE TO THE SUPPLIER ?</label>
                        </div>
                        <div class="col-sm-4">
                            <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                              <input type='checkbox'>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-6">
                            <span class="check-list-number">2</span>
                            <label class='control-label'>HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?</label>
                        </div>
                        <div class="col-sm-4">
                            <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                              <input   type='checkbox'>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-sm-6">
                   
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="checkbox" name="complete_admin_part_1" id="complete_admin_part_1" > Part-3 Completed (34%)
                            <span class="color_red error_admin_part_3 hide">Please Check this checkbox for procced further.</span>
                        </div>
                        <div class="col-sm-6">
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
                    <div class="clearfix"></div>
                </div>   
            </div>                                                
        </form> 
        <!--  =========== //END TAB-3 ===============  -->
    </div>
</div>


<script type="text/javascript">

    //Check Value is an Integer
    function isInt(n) {
       return n % 1 === 0;
    }

    function isNumber(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }

    // validation for Checkbox weather it is checked or not? 
    function validate_checkbox(field_name) {
        if (document.getElementById(field_name).checked) {
            return true;
        } else {
            return false;
        }
    }

//------------------- ADMIN PART 1 START ---------------------/

    // For generate UPC and EAN number     
    function generate_upc_ean(){
        
        $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
        $("#fakeLoader").fakeLoader({
            timeToHide:300,
            bgColor:"#2ecc71",
            spinner:"spinner7"
        }); // Fakeloader plugin

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

    function validate_admin_part_1(){
        
        var error_cnt = 0;
        var product_name = $('#product_name').val();
        product_name = $.trim(product_name);
        
        var upc = $('#upc').val();
        var ean = $('#ean').val();
        var prod_code = $('#prod_code').val();
        var complete_admin_part_1 = validate_checkbox('complete_admin_part_1');        

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
                    $('.percentage_complete_admin').html('33%');
                    $('.part_1_admin').addClass('active');
               }
            });
        }
    }

//------------------- //ADMIN PART 1 END ---------------------/

//------------------- ADMIN PART 2 START ---------------------/
    
    function dm3_retail_func(){
        
        $('.error_retail').html(''); // Empty the Error in Error Retail class

        var r_length=1;
        var r_width=1;
        var r_height=1;

        if($('#r_length').val() == '' && $('#r_width').val() == '' && $('#r_height').val() == '' ){ $('#dm3_retail').val(''); return false; }
        
        if($('#r_length').val() != ''){ r_length = parseFloat($('#r_length').val()); }
        if($('#r_width').val() != ''){ r_width = parseFloat($('#r_width').val()); }
        if($('#r_height').val() != ''){ r_height = parseFloat($('#r_height').val());}
        
        var r_dm3 = parseFloat(r_length*r_width*r_height)/1000;

        $('#dm3_retail').val(r_dm3);
    }

    function dm3_mastercase(){

        var m_length=1;
        var m_width=1;
        var m_height=1;

        if($('#m_length').val() == '' && $('#m_width').val() == '' && $('#m_height').val() == '' ){ $('#dm3_master').val(''); return false; }
        
        if($('#m_length').val() != ''){ m_length = parseFloat($('#m_length').val()); }
        if($('#m_width').val() != ''){ m_width = parseFloat($('#m_width').val()); }
        if($('#m_height').val() != ''){ m_height = parseFloat($('#m_height').val());}
        
        var m_dm3 = parseFloat(m_length*m_width*m_height)/1000;

        $('#dm3_master').val(m_dm3);
    }

    function dm3_inner_func(){
        var i_length=1;
        var i_width=1;
        var i_height=1;

        if($('#i_length').val() == '' && $('#i_width').val() == '' && $('#i_height').val() == '' ){ $('#dm3_inner').val(''); return false; }
        
        if($('#i_length').val() != ''){ i_length = parseFloat($('#i_length').val()); }
        if($('#i_width').val() != ''){ i_width = parseFloat($('#i_width').val()); }
        if($('#i_height').val() != ''){ i_height = parseFloat($('#i_height').val());}
        
        var i_dm3 = parseFloat(i_length*i_width*i_height)/1000;

        $('#dm3_inner').val(i_dm3);
    }

    function dm3_pallet_func(){

        $('.error_pallet').html('');
        var p_length=1;
        var p_width=1;
        var p_height=1;

        if($('#p_length').val() == '' && $('#p_width').val() == '' && $('#p_height').val() == '' ){ $('#dm3_pallet').val(''); return false; }
        
        if($('#p_length').val() != ''){ p_length = parseFloat($('#p_length').val()); }
        if($('#p_width').val() != ''){ p_width = parseFloat($('#p_width').val()); }
        if($('#p_height').val() != ''){ p_height = parseFloat($('#p_height').val());}
        
        var p_dm3 = parseFloat(p_length*p_width*p_height)/1000;

        $('#dm3_pallet').val(p_dm3);
    }

    function m_upc_get(){
        $.ajax({
            url: '<?php echo base_url()."products/upc_get"; ?>',
            type: 'GET',
            success:function(data){
                $('#m_upc').val(data);
            }
        });        
    }

    //To Generate UPC number for Inner Case
    function i_upc_get(){
        $.ajax({
            url: '<?php echo base_url()."products/upc_get"; ?>',
            type: 'GET',
            success:function(data){
                $('#i_upc').val(data);
            }
        });        
    }

    //To Generate UPC number for Pallet
    function p_upc_get(){
        $.ajax({
            url: '<?php echo base_url()."products/upc_get"; ?>',
            type: 'GET',
            success:function(data){
                $('#p_upc').val(data);
            }
        });
    }

    //To Generate UPC number for Pallet Case
    function cma_per_pal(){

        $('.error_pallet').html('');

        var p_case_row = 1;
        var p_no_of_row = 1;

        if( $('#p_case_row').val() != '') { p_case_row = $('#p_case_row').val(); }
        if( $('#p_no_of_row').val() != '') { p_no_of_row = $('#p_no_of_row').val(); }

        if($('#p_case_row').val() == '' && $('#p_no_of_row').val() ){ $('#p_cma_per_pal').val(''); return false; }
        var res = parseFloat(p_case_row*p_no_of_row);

        p_cma_per_pal = $('#p_cma_per_pal').val(res);        
    }

    function validate_admin_part_2(){
        var product_id = $('#product_id').val();
        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        var error_cnt = 0;
        var complete_admin_part_2 = validate_checkbox('complete_admin_part_2');    

        // Retail Unit Dimension Validation [STRAT]
        var dm3_retail = $('#dm3_retail').val();
        var r_gross_weight = $('#r_gross_weight').val();
        var r_net_weight = $('#r_net_weight').val();
        var error_retail_str = '';

        if(dm3_retail != ''){ if(isNumber(dm3_retail) == false){ error_retail_str += '<p> DM3 should be Number.</p>'; error_cnt++; }  
        }else{ error_retail_str += '<p> DM3 is Required.</p>'; error_cnt++; }

        if(r_gross_weight != ''){ if(isNumber(r_gross_weight) == false){ error_retail_str += '<p> Gross Weight should be Number.</p>'; error_cnt++; }  
        }else{ error_retail_str += '<p> Gross Weight is required.</p>'; error_cnt++; }

        if(r_net_weight != ''){ if(isNumber(r_net_weight) == false){ error_retail_str += '<p> Net Weight should be Number.</p>'; error_cnt++; }  
        }else{ error_retail_str += '<p> Net Weight is required.</p>'; error_cnt++; }

        $('.error_retail').html(error_retail_str); // Append Retail Error String to error_retail Class        
        // Retail Unit Dimension Validation [END]

        // MasterCase Dimension Validation [START]
        var m_upc = $('#m_upc').val();
        var dm3_master = $('#dm3_master').val();
        var m_gross_weight = $('#m_gross_weight').val();
        var m_net_weight = $('#m_net_weight').val();
        var no_pc_master = $('#no_pc_master').val();
        var error_master_str = '';

        if(m_upc == ''){ error_master_str += '<p> UPC is Required.</p>'; error_cnt++; }  

        if(m_gross_weight != ''){ if(isNumber(m_gross_weight) == false){ error_master_str += '<p> Gross Weight should be Number.</p>'; error_cnt++; }  
        }else{ error_master_str += '<p> Gross Weight is required.</p>'; error_cnt++; }

        if(m_net_weight != ''){ if(isNumber(m_net_weight) == false){ error_master_str += '<p> Net Weight should be Number.</p>'; error_cnt++; }  
        }else{ error_master_str += '<p> Net Weight is required.</p>'; error_cnt++; }

        if(dm3_master != ''){ if(isNumber(dm3_master) == false){ error_master_str += '<p>DM3 should be Number.</p>'; error_cnt++; }  
        }else{ error_master_str += '<p> DM3 is required.</p>'; error_cnt++; }

        if(no_pc_master != ''){ if(isNumber(no_pc_master) == false){ error_master_str += '<p> No of PC in CASE should be Number.</p>'; error_cnt++; }  
        }else{ error_master_str += '<p> No of PC in CASE is required.</p>'; error_cnt++; }

        $('.error_master_case').html(error_master_str); // Append Retail Error String to error_retail Class      

        // MasterCase Dimension Validation [END]

        // Pallet Dimension Validation [START]        
        
        var p_upc = $('#p_upc').val();    
        var p_gross_weight = $('#p_gross_weight').val();
        var p_net_weight = $('#p_net_weight').val();
        var dm3_pallet = $('#dm3_pallet').val();
        var p_cma_per_pal = $('#p_cma_per_pal').val();
        var error_pallet_str = '';

        if(p_upc == ''){ error_pallet_str += '<p> UPC is Required.</p>'; error_cnt++; }  

        if(p_gross_weight != ''){ if(isNumber(p_gross_weight) == false){ error_pallet_str += '<p> Gross Weight should be Number.</p>'; error_cnt++; }  
        }else{ error_pallet_str += '<p> Gross Weight is required.</p>'; error_cnt++; }

        if(p_net_weight != ''){ if(isNumber(p_net_weight) == false){ error_pallet_str += '<p> Net Weight should be Number.</p>'; error_cnt++; }  
        }else{ error_pallet_str += '<p> Net Weight is required.</p>'; error_cnt++; }

        if(dm3_pallet != ''){ if(isNumber(dm3_pallet) == false){ error_pallet_str += '<p> DM3 should be Number.</p>'; error_cnt++; }  
        }else{ error_pallet_str += '<p> DM3 is required.</p>'; error_cnt++; }

        if(p_cma_per_pal != ''){ if(isNumber(p_cma_per_pal) == false){ error_pallet_str += '<p> CMA per PAL should be Number.</p>'; error_cnt++; }  
        }else{ error_pallet_str += '<p> CMA PER PAL is required.</p>'; error_cnt++; }

        $('.error_pallet').html(error_pallet_str);

        if(complete_admin_part_2 == false){ $('.error_admin_part_2').removeClass('hide'); error_cnt++; }else{ $('.error_admin_part_2').addClass('hide');}


        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#admin_part_2").serializeArray();
            
            form_data.push({name:"product_id",value:product_id}); 

            $.ajax({
               url: '<?php echo base_url()."products/admin_form_tab_2"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                    
                    $('#product_retail_id').val(data.product_retail_id);
                    $('#product_master_id').val(data.product_master_id);
                    $('#product_pallet_id').val(data.product_pallet_id);
                    $('#complete_admin_part_2').attr('disabled',true);
                    $('.percentage_complete_admin').html('66%');
                    $('.part_2_admin').addClass('active');
                        
                    return false;
                    
               }
            });
        }
        // Pallet Dimension Validation [END]        
    }

//------------------- //ADMIN PART 2 END ---------------------/
    
</script>