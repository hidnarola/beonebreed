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
                        <select name="supplier_1" id="supplier_1" class="form-control supplier_dropdown" onchange="$('.error_supplier_name_1').html('');
                                fetch_supplier_data(this)" >
                            <option value="" selected readonly>Select Supplier</option>
                            <?php
                            if (!empty($suppliers)) {
                                foreach ($suppliers as $supplier) {
                                    ?>
                                    <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['supplier_name']; ?></option>        
    <?php }
} ?>
                        </select>
                        <span class="color_red error_supplier_name_1"></span>
                        <div class="text-right" style="padding-top: 10px;">
                            <button type="button" no="1" class="btn-sm btn-success add_supplier" data-toggle="modal">Add New</button>
                        </div> 
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
                        <input class="form-control" name="product_cost_1" id="product_cost_1" 
                               placeholder="Product Cost" type="text" onkeyup="$('.error_product_cost_1').html('');">
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
                <a onclick="remove_production_part_1()" class="btn btn-danger">REMOVE</a>
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
<form method="post" id='production_part_2'>
    <div class="row">
        <div class="col-sm-12 pull-left"> 
            <span class="">
                <h3 class="color_grey"> PART - 2 </h3>
            </span>
        </div>
    </div>

    <!-- Span For Production Part 2 Div START -->

    <span class="span_production_tab_2">
        <div class="row prod_row2_1">
            <div class="form-horizontal label-left">
                <div class="col-sm-12">    
                    <h3 style="margin: 0 0 15px;">Sample 1</h3>
                </div>    
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Date:</label>
                        <div class="col-sm-4">
                            <div class="controls">
                                <div class='datetimepicker input-group form-group target_datetimepicker' >
                                    <input class='form-control' readonly data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' 
                                           type='text' name='prod_date_1' id="prod_date_1">
                                    <span class='input-group-addon'>
                                        <span data-date-icon='icon-calendar' data-time-icon='icon-time'></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="control-label col-sm-1" >Approved:</label>
                        <div class="col-sm-5">
                            <div class="controls">
                                <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' 
                                     data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                                    <input type='checkbox' name="is_approve_1" id="is_approve_1" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="color_red error_prod_date_1" ></span>
                </div>
            </div>
            <div class="form-horizontal label-left">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">Notes</label>
                        <div class="col-sm-10">
                            <div class="controls">
                                <input class="form-control"  name="prod_note_1" id="prod_note_1" type="text" 
                                       onkeyup="$('.error_prod_note_1').html('');">
                            </div>
                            <span class="color_red text-center error_prod_note_1" ></span>                    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">IMPROVMENTS NEEDED <br/>(IF ANY)</label>
                        <div class="col-sm-10">
                            <div class="controls">
                                <input class="form-control"  name="improvement_needed_1" 
                                       id="improvement_needed_1" placeholder="Improvement Needed" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="production_sample_1" id="production_sample_1" value="">
        </div>
    </span>
    <!-- Span For Production Part 2 Div ENDS -->    
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            <div class="controls pull-right mar-b-20">
                <a onclick="add_production_part_2()" id="" class="btn btn-success">ADD</a>
                <a onclick="remove_production_part_2()" id="" class="btn btn-danger">REMOVE</a>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-6">
                    <input type="checkbox" name="complete_production_part_2" id="complete_production_part_2"> 
                    Part-2 Completed (20%)
                    <br>
                    <span class="color_red error_production_part_2 hide">Please Check this checkbox to procced further.</span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="production_part_2_count" id="production_part_2_count" value="1">
                            <input type="hidden" name="" id="">
                            <a class="btn btn-success" onclick="validate_production_part_2()">
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

<div id="addSuppluer" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><div class="title">Add Supplier</div></h4>
      </div>
      <div class="modal-body">
        <div class='col-sm-12'>
               
            <form class="form" id="supplier_form" style="margin-bottom: 0;" method="post">   
                    <div class='form-group'>
                        <label for='s_name'>Supplier Name</label><span style="color:red">*</span>
                        <input class='form-control' id='s_name' placeholder='Supplier Name' 
                               type='text' name='supplier_name'>
                        <span style="color:red" id="err_sname" class="error"></span>
                    </div>

                    <div class='form-group'>
                        <label for='c_name'>Contact Name</label><span style="color:red">*</span>
                        <input class='form-control' id='c_name' placeholder='Contact Name' 
                               type='text' name='contact_name'>
                        <span style="color:red" id="err_cname" class="error"></span>
                    </div>

                    <div class='form-group'>
                        <label for='country_id'>Country</label><span style="color:red">*</span>
                        <input class='form-control' id='country_id' placeholder='Country' 
                               type='text' name='country'>
                        <span style="color:red" id="err_country" class="error"></span>
                    </div>

                    <div class='form-group'>
                        <label for='c_email'>Contact Email</label><span style="color:red">*</span>
                        <input class='form-control' id='c_email' placeholder='Contact Email' 
                               type='text' name='contact_email'>
                        <span style="color:red" id="err_email" class="error"></span>
                    </div>

                    <div class='form-group'>
                        <label for='tel_no'>Tel No</label><span style="color:red">*</span>
                        <input class='form-control' id='tel_no' placeholder='Tel No' 
                               type='text' name='tel_no'>
                        <span style="color:red" id="err_tel_no" class="error">
                            
                        </span>
                    </div>
                    <div class='form-group'>
                        <label for='tel_no'>Potential Level</label><span style="color:red">*</span>
                        <select name="potential_level" id="potential_level" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='address_id'>Address</label><span style="color:red">*</span>
                        <textarea name="supplier_address" id="address" cols="30" rows="5" class="form-control"></textarea>
                        <span style="color:red" id="err_address" class="error">
                        </span>
                    </div>
                
                    <div class='text-right form-actions form-actions-padding-sm 
                                form-actions-padding-md form-actions-padding-lg' 
                         style='margin-bottom: 0;'>
                        <button class='btn btn-success' id="saveSupplyer" type='button'>
                            <i class='icon-save'></i>
                            Save
                        </button>
                    </div>
                <div class="clearfix"></div>
            </form>		
                <!-- end of add form -->	
        </div>      
      </div>
      
    </div>

  </div>
</div>
<!--  =========== //PRODUCTION TAB PART 2 END ===============  -->

<?php $this->load->view('products/prod_tab_3'); ?>

<script type="text/javascript">
    // Add Suppler.
    var id = "1";
    $(document).on('click','.add_supplier',function()
    {
        $(".error").html("");
        id = $(this).attr("no");
        $("#supplier_form")[0].reset();
        $("#addSuppluer").modal();
    });
    $("#saveSupplyer").click(function(){
        $(".error").html("");
        var  s_name = $("#s_name").val().trim();
        var  c_name = $("#c_name").val().trim();
        var  country_id = $("#country_id").val().trim();
        var  c_email = $("#c_email").val().trim();
        var  tel_no = $("#tel_no").val().trim();
        var  address = $("#address").val().trim();
        
        var email = new RegExp('^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$');
        var no = new RegExp('^[0-9]+$');
        
        var flag = 0; 
        
        if(s_name == '')
        {
            var msg = "This field is required.";
            $("#err_sname").html(msg);
            flag ++;
        }
        if(c_name == '')
        {
            var msg = "This field is required.";
            $("#err_cname").html(msg);
            flag ++;
        }
        if(country_id == '')
        {
            var msg = "This field is required.";
            $("#err_country").html(msg);
            flag ++;
        }
        if(tel_no == '')
        {
            var msg = "This field is required.";
            $("#err_tel_no").html(msg);
            flag ++;
        }
        else if (!no.test(tel_no)) {
            var msg = "Please enter only numeric value.";
            $("#err_tel_no").html(msg);
            flag ++;
        }
        if(address == "")
        {
            var msg = "This field is required.";
            $("#err_address").html(msg);
            flag ++;
        }
        if(c_email == '')
        {
            var msg = "This field is required.";
            $("#err_email").html(msg);
            flag ++;
        }
        else if (!email.test(c_email)) {
            var msg = "Please enter valid email";
            $("#err_email").html(msg);
            flag ++;
        }
        
        if(flag == 0)
        {
            var form_data = $("#supplier_form").serializeArray();
            $.ajax({
                    url: '<?php echo base_url() . "products/add_supplyer"; ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    success: function (data) 
                    {
                        if(data.status)
                        {
                            var option = "<option value="+data.id+">"+data.supplier_name+"</option>";
                            $(".supplier_dropdown").append(option);
                            $("#addSuppluer").modal("hide");
                            //supplier_1
                            $('#supplier_'+ id ).val(data.id);
                            $('#country_' + id).val(data.country);
                            $('#tel_no_' + id).val(data.tel_no);
                            $('#address_' + id).val(data.address);
                            $('#contact_name_' + id).val(data.contact_name);
                            $('#contact_email_' + id).val(data.contact_email);
                        }
                    }
               });
           }
    });

    // Production Tab-1 Add More & Save Functionality Start
    function add_production_part_1() {

        var production_part_1_count = $('#production_part_1_count').val();
        var new_cnt_production = parseInt(production_part_1_count) + 1;

        //Allow only 3 Suppliers to Add
        if (new_cnt_production == '4') {
            $(function () {
                bootbox.alert('Can not add more than 3 Supplier');
            });
            return false;
        } else {
            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin
        }

        $('#production_part_1_count').val(new_cnt_production);

        $.ajax({
            url: '<?php echo base_url() . "products/production_add_more_tab_1"; ?>',
            type: 'POST',
            dataType: 'json',
            data: {new_cnt: new_cnt_production},
            success: function (data) {
                $('.span_production_tab_1').append(data.add_more);
            }
        });
    }

    // Production Part-1 Remove Supplier & Update Functionality Start
    function remove_production_part_1() {

        var new_cnt = $('#production_part_1_count').val();
        var production_supplier = '';

        if (new_cnt > 1) {
            production_supplier = $('#production_supplier_' + new_cnt).val(); // Get Total Value     
            if (production_supplier != '') {
                $('.prod_row_' + new_cnt).remove(); // Remove HTML
                $.post("<?php echo base_url() . 'products/prod_part_1_delete'; ?>",
                        {'production_supplier': production_supplier});
                new_cnt = new_cnt - 1; // Decrease by one
                $('#production_part_1_count').val(new_cnt);
            } else {
                $('.prod_row_' + new_cnt).remove(); // Remove HTML
                new_cnt = new_cnt - 1; // Decrease by one
                $('#production_part_1_count').val(new_cnt);
            }
        }
    }

    function fetch_supplier_data(data) {

        $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
        $("#fakeLoader").fakeLoader({
            timeToHide: 300,
            bgColor: "#2ecc71",
            spinner: "spinner7"
        }); // Fakeloader plugin

        supplier_id = data.value;
        if (supplier_id == '') {
            return false;
        }

        var myid = data.id;
        myid = myid.replace('supplier_', '');

        $.ajax({
            url: '<?php echo base_url() . "products/fetch_supplier_data"; ?>',
            type: 'POST',
            dataType: 'json',
            data: {supplier_id: supplier_id},
            success: function (data) {
                $('#country_' + myid).val(data.country);
                $('#tel_no_' + myid).val(data.tel_no);
                $('#address_' + myid).val(data.address);
                $('#contact_name_' + myid).val(data.contact_name);
                $('#contact_email_' + myid).val(data.contact_email);
            }
        });
    }

    function validate_production_part_1() {
        var product_id = $('#product_id').val();
        if (product_id == '') {
            //uncommetn below line for validate Part-1 Required Part
            $(function () {
                bootbox.alert('Please create product in Part-1.');
            });
            return false;
        }

        var production_part_1_count = $('#production_part_1_count').val();
        var complete_production_part_1 = validate_checkbox('complete_production_part_1');    // Check If check box checked
        var error_cnt = 0;

        for (var i = 1; i <= production_part_1_count; i++) {

            var supplier_name = $('#supplier_' + i).val();
            var prod_cost_value = $('#product_cost_' + i).val();

            if (supplier_name == null || supplier_name == '') {
                error_cnt++;
                $('.error_supplier_name_' + i).html('Please select Supplier.');
            } else {
                $('.error_supplier_name_' + i).html('');
            }
            if (prod_cost_value == '') {
                error_cnt++;
                $('.error_product_cost_' + i).html('Please enter product cost');
            } else {
                if (isNumber(prod_cost_value) == false) {
                    $('.error_product_cost_' + i).html('Please enter only numeric value.');
                    error_cnt++;
                } else {
                    $('.error_product_cost_' + i).html('');
                }
            }
        }

        if (error_cnt != '0') {
            return false;
        } else {

            var form_data = $("#production_part_1").serializeArray();
            form_data.push({name: "product_id", value: product_id});
            form_data.push({name: "completed", value: complete_production_part_1});

            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin

            $.ajax({
                url: '<?php echo base_url() . "products/production_form_tab_1"; ?>',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    var prod_new_id;
                    for (var i = 0; i < data.res.length; i++) {
                        prod_new_id = i + 1;
                        $('#production_supplier_' + prod_new_id).val(data.res[i]);
                    }
//                    $('#complete_production_part_1').attr('disabled', true);
//                    $('#complete_production_part_1').prop('checked', true);
                    if(data.completed == 'true')
                    {
                        $('.part_1_production').addClass('active');
//                        $('#complete_production_part_1').prop('disabled', true);
                    }
                    else
                    {
                        $('.part_1_production').removeClass('active');
                    }
                    $('.percentage_complete_production').html(data.complete_bar_no + '%');
                    return false;
                }
            });

        }
    }

    // Production Part-1 Add More & Save Functionality END

    //--------------------------------------------------------------------------------------

    // Production Part-2 Remove Sample & Update Functionality Start
    function add_production_part_2() {
        // alert('Hello World');
        // return false;
        var production_part_2_count = $('#production_part_2_count').val();
        var new_cnt_production = parseInt(production_part_2_count) + 1;

        //Allow only 3 Suppliers to Add
        if (new_cnt_production == '4') {
            $(function () {
                bootbox.alert('Can not add more than 3 Sample');
            });
            return false;
        } else {
            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin
        }

        $('#production_part_2_count').val(new_cnt_production);

        $.ajax({
            url: '<?php echo base_url() . "products/production_add_more_tab_2"; ?>',
            type: 'POST',
            dataType: 'json',
            data: {new_cnt: new_cnt_production},
            success: function (data) {
                $('.span_production_tab_2').append(data.add_more);
                $(document).ready(function () {
                    $('.datetimepicker').datetimepicker();
                    // $('.make-switch')['bootstrapSwitch']();
                    $('.make-switch-' + data.new_cnt).bootstrapSwitch();
                });
            }
        });
    }

    function validate_production_part_2() {
        var product_id = $('#product_id').val();
        if (product_id == '') {
            //uncommetn below line for validate Part-1 Required Part
            $(function () {
                bootbox.alert('Please create product in Part-1.');
            });
            return false;
        }

        var production_part_2_count = $('#production_part_2_count').val();
        var complete_production_part_2 = validate_checkbox('complete_production_part_2');    // Check If check box checked
        var error_cnt = 0;

//        if (complete_production_part_2 == false) {
//            $('.error_production_part_2').removeClass('hide');
//            error_cnt++;
//        } else {
//            $('.error_production_part_2').addClass('hide');
//        }

        for (var i = 1; i <= production_part_2_count; i++) {

            var prod_date = $('#prod_date_' + i).val();
            var prod_note = $('#prod_note_' + i).val();

            if (prod_date == '') {
                error_cnt++;
                $('.error_prod_date_' + i).html('Please select date.');
            } else {
                $('.error_prod_date_' + i).html('');
            }
//            if (prod_note == '') {
//                error_cnt++;
//                $('.error_prod_note_' + i).html('Please enter notes');
//            } else {
//                $('.error_prod_note_' + i).html('');
//            }
        }

        if (error_cnt != '0') {
            return false;
        } else {

            var form_data = $("#production_part_2").serializeArray();
            form_data.push({name: "product_id", value: product_id});
            form_data.push({name: "completed", value: complete_production_part_2});
            
            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin

            $.ajax({
                url: '<?php echo base_url() . "products/production_form_tab_2"; ?>',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    var prod_new_id;
                    for (var i = 0; i < data.res.length; i++) {
                        prod_new_id = i + 1;
                        $('#production_sample_' + prod_new_id).val(data.res[i]);
                    }
//                    $('#complete_production_part_2').attr('disabled', true);
//                    $('#complete_production_part_2').prop('checked', true);
                    if(data.completed == 'true')
                    {
                        $('.part_2_production').addClass('active');
//                        $('#complete_production_part_2').attr('disabled', true);
                    }
                    else
                    {
                        $('.part_2_production').removeClass('active');
                    }
                    $('.percentage_complete_production').html(data.complete_bar_no + '%');
                    return false;
                }
            });

        }
    }

    // Production Part-1 Remove Supplier & Update Functionality Start
    function remove_production_part_2() {

        var new_cnt = $('#production_part_2_count').val();
        var production_sample = '';

        if (new_cnt > 1) {

            production_sample = $('#production_sample_' + new_cnt).val(); // Get Total Value     
            if (production_sample != '') {
                $('.prod_row2_' + new_cnt).remove(); // Remove HTML
                $.post("<?php echo base_url() . 'products/prod_part_2_delete'; ?>",
                        {'production_sample': production_sample});
                new_cnt = new_cnt - 1; // Decrease by one
                $('#production_part_2_count').val(new_cnt);
            } else {
                $('.prod_row2_' + new_cnt).remove(); // Remove HTML
                new_cnt = new_cnt - 1; // Decrease by one
                $('#production_part_2_count').val(new_cnt);
            }
        }
    }

    $(function () {
        $('#target_datetimepicker').datetimepicker({
        });
    });

</script>

