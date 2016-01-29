<div class="complete-level">
    <h5>COMPLETE LEVEL</h5>
    <div class="inline-block complete-level-ul"> 
        <ul>
            <li class="part_1_production">
                <span></span>
                <span>PART 1</span>
            </li>
            <li class="part_2_production">
                <span></span>
                <span>PART 2</span>
            </li>
            <li class="part_3_production">
                <span></span>
                <span>PART 3</span>
            </li>
            <li class="part_4_production">
                <span></span>
                <span>PART 4</span>
            </li>
            <li class="part_5_production">
                <span></span>
                <span>PART 5</span>
            </li>
        </ul>
    </div>
    <div class="inline-block complete-level-action">
        <h1 class="percentage_complete_production"> 0% </h1>
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

            <div class="row prod_row_1">
                <div class="col-sm-12">    
                    <h3 style="margin: 0 0 15px;">Supplier 1</h3>
                </div> 
                <div class="col-sm-6"><div class="form-group">
                      <label class="control-label" for="supplier_name_1">Supplier Name</label>
                      <div class="controls">
                        <select name="supplier_1" id="supplier_1" class="form-control" onchange="$('.error_supplier_name_1').html('');fetch_supplier_data(this)" >
                            <option value="" selected readonly>Select Supplier</option>
                        <?php 
                            if(!empty($suppliers)) { 
                                foreach($suppliers as $supplier) {
                        ?>
                            <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['supplier_name']; ?></option>        
                        <?php } } ?>
                        </select>
                        <span class="color_red error_supplier_name_1"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="country_1">Country</label>
                      <div class="controls">
                        <input class="form-control" id="country_1" readonly placeholder="Country name" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="tel_no_1">Tel No</label>
                      <div class="controls">
                        <input class="form-control" id="tel_no_1" readonly placeholder="Telephone No" type="text" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="address_1">Address</label>
                      <div class="controls">
                        <textarea id="address_1" cols="30" rows="5" readonly class="form-control"></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="contact_name_1">Contact Name</label>
                      <div class="controls">
                        <input class="form-control"  id="contact_name_1" readonly placeholder="Contact Name" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="contact_email_1">Contact Email</label>
                      <div class="controls">
                        <input class="form-control"  id="contact_email_1" readonly placeholder="Contact Email" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="product_cost_1">Product Cost</label>
                      <div class="controls">
                        <input class="form-control" name="product_cost_1" id="product_cost_1" placeholder="Product Cost" type="text">
                      </div>
                      <span class="color_red error_product_cost_1"> </span>
                    </div>
                    <div class="clearfix"></div>                    
                    <input type="hidden" name="production_supplier_1" id="production_supplier_1" value="">
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
                        <span class="color_red error_production_part_1 hide">Please Check this checkbox to procced further.</span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group pull-right">
                          <div class="controls">
                            <input type="hidden" name="production_part_1_count" id="production_part_1_count" value="1">
                            <a class="btn btn-success" onclick="validate_production_part_1()">
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

<!--  =========== PRODUCTION TAB PART 2 START ===============  -->
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
<!--  =========== //PRODUCTION TAB PART 2 END ===============  -->

<?php $this->load->view('products/prod_tab_3');?>

<script type="text/javascript"> 
    
    // Production Tab-1 Add More & Save Functionality Start
    function add_production_part_1(){

        var production_part_1_count = $('#production_part_1_count').val();
        var new_cnt_production = parseInt(production_part_1_count)+1;

        //Allow only 3 Suppliers to Add
        if(new_cnt_production == '4'){
            $(function(){
                bootbox.alert('Can not add more than 3 Supplier');
            });
            return false;
        }else{
            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
        }

        $('#production_part_1_count').val(new_cnt_production);

        $.ajax({
            url: '<?php echo base_url()."products/production_add_more_tab_1"; ?>',
            type: 'POST',
            dataType: 'json',
            data: {new_cnt: new_cnt_production},
            success:function(data){
                $('.span_production_tab_1').append(data.add_more);
            }
        });        
    }

    function fetch_supplier_data(data){

        $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
        $("#fakeLoader").fakeLoader({
            timeToHide:300,
            bgColor:"#2ecc71",
            spinner:"spinner7"
        }); // Fakeloader plugin

        supplier_id = data.value;
        if(supplier_id == ''){
            return false;
        }

        var myid = data.id;
        myid = myid.replace('supplier_','');
        
        $.ajax({
            url: '<?php echo base_url()."products/fetch_supplier_data";?>',
            type: 'POST',
            dataType: 'json',
            data: {supplier_id: supplier_id},
            success:function(data){
                $('#country_'+myid).val(data.country);
                $('#tel_no_'+myid).val(data.tel_no);
                $('#address_'+myid).val(data.address);
                $('#contact_name_'+myid).val(data.contact_name);
                $('#contact_email_'+myid).val(data.contact_email);
            }
        });
    }    

    function validate_production_part_1(){
        var product_id = $('#product_id').val();
        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            // $(function(){ bootbox.alert('Please create product in Part-1.');  });
            // return false;
            product_id = 1;
        }

        var production_part_1_count = $('#production_part_1_count').val();
        var complete_production_part_1 = validate_checkbox('complete_production_part_1');    // Check If check box checked
        var error_cnt = 0;

        if(complete_production_part_1 == false){ $('.error_production_part_1').removeClass('hide'); error_cnt++; 
            }else{ $('.error_production_part_1').addClass('hide');}

        for(var i=1; i<=production_part_1_count; i++){

            var supplier_name = $('#supplier_'+i).val();
            var prod_cost_value = $('#product_cost_'+i).val();

            if(supplier_name == null || supplier_name == '' ){ error_cnt++; $('.error_supplier_name_'+i).html('Please select Supplier.');   
                }else{ $('.error_supplier_name_'+i).html(''); }
            if(prod_cost_value == '' ){  error_cnt++; $('.error_product_cost_'+i).html('Please enter product cost');
                }else{   $('.error_product_cost_1'+i).html(''); }
        }

        if(error_cnt != '0'){
            return false;
        }else{

            var form_data = $("#production_part_1").serializeArray();
            
            form_data.push({name:"product_id",value:product_id}); 

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin

            $.ajax({
               url: '<?php echo base_url()."products/production_form_tab_1"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                    return false;
                    $('#product_id').val(data.product_id);
                    $('#complete_admin_part_1').attr('disabled',true);
                    $('#generate_barcode').attr('disabled',true);
                    $('.percentage_complete_admin').html('33%');
                    $('.part_1_admin').addClass('active');
               }
            });

        }    

    }

    // Production Tab-1 Add More & Save Functionality END
    
</script>