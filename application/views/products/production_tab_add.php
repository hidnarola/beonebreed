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
<form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="admin_part_1">
            <div class="row">
                <div class="col-sm-12 pull-left"> 
                    <span class="">
                        <h3 class="color_grey"> PART - 1 </h3>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="product_name">Supplier Name</label>
                      <div class="controls">
                        <input class="form-control" id="product_name" name="product_name" placeholder="Product Name" type="text" onkeyup="$('.error_product_name').addClass('hide');">
                        <span class="color_red hide error_product_name">Plese Enter Product name </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputText">Country</label>
                      <div class="controls">
                        <select name="category" id="category" class="form-control">
                                                        <option value="CF">Comfort</option>
                                                        <option value="AM">Fun</option>
                                                        <option value="BE">Well being</option>
                                                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="category">Tel</label>
                      <div class="controls">
                        <select name="brand_name" id="brand_name" class="form-control">
                                                        <option value="1">Beonebreed</option>
                                                        <option value="2">Kate &amp; ox</option>
                                                        <option value="3">O’ Select</option>
                                                        <option value="4">OEM</option>
                                                        <option value="5"> Mr. Osbone</option>
                                                        <option value="9">!@#$%^&amp;*(</option>
                                                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="description">Address</label>
                      <div class="controls">
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="upc">Contact Name</label>
                      <div class="controls">
                        <input class="form-control" readonly="" name="upc" id="upc" placeholder="UPC" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="ean">Contact Email</label>
                      <div class="controls">
                        <input class="form-control" readonly="" name="ean" id="ean" placeholder="EAN" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="prod_code">Product Cost</label>
                      <div class="controls">
                        <input class="form-control " readonly="" name="prod_code" id="prod_code" placeholder="Product Code" type="text">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group ">
                      <div class="controls pull-left">
                        <span class="color_red error_generate hide">Please generate product code</span>
                      </div>                        
                    </div>
                    <div class="clearfix"></div>                    
                </div>    
            </div> 
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <div class="controls pull-right mar-b-20">
                        <a onclick="generate_upc_ean()" id="generate_barcode" class="btn btn-success btn-lg">GENERATE</a>
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
        </form>
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
                        <input class="form-control" id="product_name" name="product_name" placeholder="Product Name" type="text" onkeyup="$('.error_product_name').addClass('hide');">
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
                        <input class="form-control" readonly="" name="upc" id="upc" type="text">
                      </div>
                  </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="ean">IMPROVMENTS NEEDED (IF ANY)</label>
                      <div class="col-sm-10">
                      <div class="controls">
                        <input class="form-control" readonly="" name="ean" id="ean" placeholder="EAN" type="text">
                      </div>
                      </div>
                    </div>
                     </div>
                     </div>
                 </div> 
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <div class="controls pull-right mar-b-20">
                        <a onclick="generate_upc_ean()" id="generate_barcode" class="btn btn-success btn-lg">GENERATE</a>
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
                </div>
            </div>
        </div>