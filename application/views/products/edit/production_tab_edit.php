<?php
$p_part1_class = '';
$p_part2_class = '';
$p_part3_class = '';
$p_part4_class = '';
$p_part5_class = '';

$p_part1_check = '';
$p_part2_check = '';
$p_part3_check = '';
$p_part4_check = '';
$p_part5_check = '';

$production_complete_part = array();

if (!empty($data_admin_part_1['production_complete'])) {

    $production_complete_part = json_decode($data_admin_part_1['production_complete'], true);

    if ($production_complete_part['part_1'] != '0') {
        $p_part1_class = 'active';
        $p_part1_check = 'checked="checked"';
    }
    if ($production_complete_part['part_2'] != '0') {
        $p_part2_class = 'active';
        $p_part2_check = 'checked="checked"';
    }
    if ($production_complete_part['part_3'] != '0') {
        $p_part3_class = 'active';
        $p_part3_check = 'checked="checked"';
    }
    if ($production_complete_part['part_4'] != '0') {
        $p_part4_class = 'active';
        $p_part4_check = 'checked="checked"';
    }
    if ($production_complete_part['part_5'] != '0') {
        $p_part5_class = 'active';
        $p_part5_check = 'checked="checked"';
    }
}
?>

<div class="complete-level">
    <h5>COMPLETE LEVEL</h5>
    <div class="inline-block complete-level-ul"> 
        <ul>
            <li class="part_1_production <?php echo $p_part1_class; ?>">
                <span></span>
                <span>PART 1</span>
            </li>
            <li class="part_2_production <?php echo $p_part2_class; ?>">
                <span></span>
                <span>PART 2</span>
            </li>
            <li class="part_3_production <?php echo $p_part3_class; ?> ">
                <span></span>
                <span>PART 3</span>
            </li>
            <li class="part_4_production <?php echo $p_part4_class; ?> ">
                <span></span>
                <span>PART 4</span>
            </li>
            <li class="part_5_production <?php echo $p_part5_class; ?>">
                <span></span>
                <span>PART 5</span>
            </li>
        </ul>
    </div>
    <div class="inline-block complete-level-action">
        <h1 class="percentage_complete_production"> 
            <?php
            if (!empty($production_complete_part)) {
                echo array_sum(
                        array(
                            $production_complete_part['part_1'],
                            $production_complete_part['part_2'],
                            $production_complete_part['part_3'],
                            $production_complete_part['part_4'],
                            $production_complete_part['part_5']
                        )
                ) . '%';
            } else {
                echo '0%';
            }
            ?>
        </h1>
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
        <!-- ===================================================================================== -->
        <?php
        if (empty($data_production_part_1)) {
            ?>
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
                                    <?php
                                    }
                                }
                                ?>
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
            <?php
        } else {
            for ($i = 1; $i <= count($data_production_part_1); $i++) {
                ?>
                <div class="row prod_row_<?php echo $i; ?>">
                    <div class="col-sm-12">    
                        <h3 style="margin: 0 0 15px;">Supplier <?php echo $i; ?></h3>
                    </div> 
                    <div class="col-sm-6"><div class="form-group">
                            <label class="control-label" for="supplier_name_<?php echo $i; ?>">Supplier Name</label>
                            <div class="controls">
                                <select name="supplier_<?php echo $i; ?>" id="supplier_<?php echo $i; ?>" class="form-control supplier_dropdown" onchange="$('.error_supplier_name_1').html('');
                                        fetch_supplier_data(this)" >
                                    <option value="" selected readonly>Select Supplier</option>
                                    <?php
                                    if (!empty($suppliers)) {
                                        foreach ($suppliers as $supplier) {
                                            ?>
                                            <option value="<?php echo $supplier['id']; ?>" <?php
                                            if ($data_production_part_1[$i - 1]['supplier_id'] == $supplier['id']) {
                                                echo 'selected';
                                            }
                                            ?>><?php echo $supplier['supplier_name']; ?></option>        
                                                <?php
                                                }
                                            }
                                            ?>
                                </select>
                                <span class="color_red error_supplier_name_<?php echo $i; ?>"></span>
                                <div class="text-right" style="padding-top: 10px;">
                                    <button type="button" no="<?php echo $i; ?>" class="btn-sm btn-success add_supplier" data-toggle="modal">Add New</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="country_<?php echo $i; ?>">Country</label>
                            <div class="controls">
                                <input class="form-control" id="country_<?php echo $i; ?>" readonly placeholder="Country name" type="text" 
                                       value="<?php echo $data_production_part_1[$i - 1]['country']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tel_no_<?php echo $i; ?>">Tel No</label>
                            <div class="controls">
                                <input class="form-control" id="tel_no_<?php echo $i; ?>" readonly placeholder="Telephone No" type="text" 
                                       value="<?php echo $data_production_part_1[$i - 1]['tel_no']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address_<?php echo $i; ?>">Address</label>
                            <div class="controls">
                                <textarea id="address_<?php echo $i; ?>" cols="30" rows="5" readonly class="form-control"><?php echo $data_production_part_1[$i - 1]['address']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="contact_name_<?php echo $i; ?>">Contact Name</label>
                            <div class="controls">
                                <input class="form-control"  id="contact_name_<?php echo $i; ?>" readonly placeholder="Contact Name" type="text"
                                       value="<?php echo $data_production_part_1[$i - 1]['contact_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="contact_email_<?php echo $i; ?>">Contact Email</label>
                            <div class="controls">
                                <input class="form-control"  id="contact_email_<?php echo $i; ?>" readonly placeholder="Contact Email" type="text"
                                       value="<?php echo $data_production_part_1[$i - 1]['contact_email']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="product_cost_<?php echo $i; ?>">Product Cost</label>
                            <div class="controls">
                                <input class="form-control" name="product_cost_<?php echo $i; ?>" id="product_cost_<?php echo $i; ?>" 
                                       placeholder="Product Cost" type="text" onkeyup="$('.error_product_cost_1').html('');"
                                       value="<?php echo $data_production_part_1[$i - 1]['product_cost']; ?>">
                            </div>
                            <span class="color_red error_product_cost_<?php echo $i; ?>"> </span>
                        </div>
                        <div class="clearfix"></div>                    
                        <input type="hidden" name="production_supplier_<?php echo $i; ?>" id="production_supplier_<?php echo $i; ?>" value="<?php echo $data_production_part_1[$i - 1]['prod_supp_id']; ?>">
                    </div>    
                </div>    
            <?php
            }
        }
        ?>
        <!-- ===================================================================================== -->
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
                    <input type="checkbox" name="complete_production_part_1" <?php echo $p_part1_check; ?> id="complete_production_part_1"> Part-1 Completed (20%)
                    <br>
                    <span class="color_red error_production_part_1 hide">Please Check this checkbox to procced further.</span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="production_part_1_count" id="production_part_1_count" value="<?php
                            if (empty($data_production_part_1)) {
                                echo '1';
                            } else {
                                echo count($data_production_part_1);
                            }
                            ?>">
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
<?php
if (empty($data_production_part_2)) {
    ?>
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
            <?php
        } else {
            for ($i = 1; $i <= count($data_production_part_2); $i++) {
                ?>            
                <div class="row prod_row2_<?php echo $i; ?>">
                    <div class="form-horizontal label-left">
                        <div class="col-sm-12">    
                            <h3 style="margin: 0 0 15px;">Sample <?php echo $i; ?></h3>
                        </div>    
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Date:</label>
                                <div class="col-sm-4">
                                    <div class="controls">
                                        <div class='datetimepicker input-group form-group target_datetimepicker' >
                                            <input class='form-control' readonly data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' 
                                                   type='text' name='prod_date_<?php echo $i; ?>' id="prod_date_<?php echo $i; ?>" value="<?php echo $data_production_part_2[$i - 1]['sample_date']; ?>">
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
                                            <input type='checkbox' name="is_approve_<?php echo $i; ?>" id="is_approve_<?php echo $i; ?>" value="1" 
                                            <?php
                                                   if ($data_production_part_2[$i - 1]['is_approve'] == '1') {
                                                       echo 'checked="checked"';
                                                   }
                                                   ?>>
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
                                        <input class="form-control"  name="prod_note_<?php echo $i; ?>" id="prod_note_<?php echo $i; ?>" type="text" 
                                               onkeyup="$('.error_prod_note_1').html('');" value="<?php echo $data_production_part_2[$i - 1]['notes']; ?>">
                                    </div>
                                    <span class="color_red text-center error_prod_note_1" ></span>                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="">IMPROVMENTS NEEDED <br/>(IF ANY)</label>
                                <div class="col-sm-10">
                                    <div class="controls">
                                        <input class="form-control"  name="improvement_needed_<?php echo $i; ?>" id="improvement_needed_<?php echo $i; ?>" 
                                               placeholder="Improvement Needed" value="<?php echo $data_production_part_2[$i - 1]['improvement_needed']; ?>" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="production_sample_<?php echo $i; ?>" id="production_sample_<?php echo $i; ?>" value="<?php echo $data_production_part_2[$i - 1]['id']; ?>">
                </div>  

    <?php
    }
}
?>
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
                    <input type="checkbox" <?php echo $p_part2_check; ?> name="complete_production_part_2" id="complete_production_part_2"> 
                    Part-2 Completed (20%)
                    <br>
                    <span class="color_red error_production_part_2 hide">Please Check this checkbox to procced further.</span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="production_part_2_count" id="production_part_2_count" 
                                   value="<?php
                                   if (empty($data_production_part_2)) {
                                       echo '1';
                                   } else {
                                       echo count($data_production_part_2);
                                   }
                                   ?>">
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
<!--  =========== //PRODUCTION TAB PART 2 END ===============  -->

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
                            <input type="file" name="file" id="production_attachment_file" onchange="$('.error_upload_production').addClass('hide');
                                   " >
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
                                        <ul id="production_attachment" class="tab-ul my_attachment">
<?php
if (!empty($data_production_part_2_all_attachment)) {
    foreach ($data_production_part_2_all_attachment as $atch) {
        ?>    
                                                    <li style=list-style-type:none;>
                                                        <input type='checkbox' name='chk[]' id='chk_production_attachment' class='chk_notes' value="<?php echo $atch['id']; ?>">
                                                        <a  class='fancybox'  href="uploads/products/<?php echo $atch['attachment']; ?>">
                                                    <?php echo $atch['attachment']; ?>
                                                        </a>
                                                    </li>
    <?php
    }
}
?> 
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

<?php
$ques_17 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '17')), array('single' => true));
$ques_18 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '18')), array('single' => true));
$ques_19 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '19')), array('single' => true));
$ques_20 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '20')), array('single' => true));
$ques_21 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '21')), array('single' => true));
$ques_22 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '22')), array('single' => true));
$ques_23 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '23')), array('single' => true));
?>    

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
                        <input type='checkbox' name="production_part3_switch1" id="production_part3_switch1" 
                        <?php
                               if (!empty($ques_17)) {
                                   if ($ques_17['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="17">
                    </div>
                </div>
            </div>

            <div class="details_main">
                <label class="col-md-1 col-sm-2">Notes</label>
                <div class="col-sm-5">
                    <textarea name="production_part3_notes1" id="production_part3_notes1" cols="30" rows="5" class="form-control" 
                              onkeyup="$('.error_production_part3_notes1').addClass('hide');"><?php
                               if (!empty($ques_17)) {
                                   echo $ques_17['notes'];
                               }
                               ?></textarea> 
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
                        <input type='checkbox' name="production_part3_switch2" id="production_part3_switch2" 
                        <?php
                               if (!empty($ques_18)) {
                                   if ($ques_18['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="18">
                    </div>
                </div>
            </div>

            <div class="label_main">   
                <div class="col-sm-9">
                    <p><span class="check-list-number">3</span> FINAL APPROVAL (Placement on the product and quality</p>     
                </div>
                <div class="col-sm-3">
                    <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                        <input type='checkbox' name="production_part3_switch3" id="production_part3_switch3" 
                        <?php
                               if (!empty($ques_19)) {
                                   if ($ques_19['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="19">
                    </div>
                </div>
            </div>

            <div class="label_main">   
                <div class="col-sm-9">
                    <p><span class="check-list-number">4</span> LAW LABELS FOR THE PRODUCT</p>     
                </div>
                <div class="col-sm-3">
                    <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                        <input type='checkbox' name="production_part3_switch4" id="production_part3_switch4" 
                        <?php
                               if (!empty($ques_20)) {
                                   if ($ques_20['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="20">
                    </div>
                </div>
            </div>

            <div class="label_main">   
                <div class="col-sm-9">
                    <p><span class="check-list-number">5</span> CARE LABELS FOR THE PRODUCT</p>     
                </div>
                <div class="col-sm-3">
                    <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                        <input type='checkbox' name="production_part3_switch5" id="production_part3_switch5" 
                        <?php
                               if (!empty($ques_21)) {
                                   if ($ques_21['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="21">
                    </div>
                </div>
            </div>

            <div class="label_main">   
                <div class="col-sm-9">
                    <p><span class="check-list-number">6</span> ANY SPECIAL INSTRUCTION WITH THE PRODUCT ?</p>     
                </div>
                <div class="col-sm-3">
                    <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                        <input type='checkbox' name="production_part3_switch6" id="production_part3_switch6" 
                        <?php
                               if (!empty($ques_22)) {
                                   if ($ques_22['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="22">
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
                    <textarea name="production_part3_notes2" id="production_part3_notes2" cols="30" rows="5" class="form-control" 
                              onkeyup="$('.error_production_part3_notes2').addClass('hide');"> <?php
                               if (!empty($ques_23)) {
                                   echo $ques_23['notes'];
                               }
                               ?></textarea> 
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
                    <input type="checkbox" name="chkbox_production_part3" <?php echo $p_part3_check; ?> id="chkbox_production_part3"> Part-3 Completed (20%)
                    <br>
                    <span class="color_red error_production_part3 hide">Please Check this checkbox to procced further.</span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="production_part3_h1" value="<?php
                            if (!empty($ques_17)) {
                                echo $ques_17['id'];
                            }
                            ?>" id="production_part3_h1">
                            <input type="hidden" name="production_part3_h2" value="<?php
                            if (!empty($ques_18)) {
                                echo $ques_18['id'];
                            }
                            ?>" id="production_part3_h2">
                            <input type="hidden" name="production_part3_h3" value="<?php
                            if (!empty($ques_19)) {
                                echo $ques_19['id'];
                            }
                            ?>" id="production_part3_h3">
                            <input type="hidden" name="production_part3_h4" value="<?php
                            if (!empty($ques_20)) {
                                echo $ques_20['id'];
                            }
                            ?>" id="production_part3_h4">
                            <input type="hidden" name="production_part3_h5" value="<?php
                            if (!empty($ques_21)) {
                                echo $ques_21['id'];
                            }
                            ?>" id="production_part3_h5">
                            <input type="hidden" name="production_part3_h6" value="<?php
                            if (!empty($ques_22)) {
                                echo $ques_22['id'];
                            }
                            ?>" id="production_part3_h6">
                            <input type="hidden" name="production_part3_h7" value="<?php
                                   if (!empty($ques_23)) {
                                       echo $ques_23['id'];
                                   }
                            ?>" id="production_part3_h7">
                            <a class="btn btn-success" onclick="validate_production_part_3()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="<?php echo base_url() . "products"; ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</form>
<!--  =========== //PRODUCTION TAB PART 3 END ===============  -->
<?php
$ques_28 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '28')), array('single' => true));
$ques_29 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '29')), array('single' => true));
?>    
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
                        <input type='checkbox' name="production_part4_switch1" id="production_part4_switch1" 
                        <?php
                               if (!empty($ques_28)) {
                                   if ($ques_28['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="28">
                    </div>
                </div>
            </div>

            <div class="label_main">   
                <div class="col-sm-9">
                    <p><span class="check-list-number">2</span> File saved to the server</p>     
                </div>
                <div class="col-sm-3">
                    <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                        <input type='checkbox' name="production_part4_switch2" id="production_part4_switch2" 
                        <?php
                               if (!empty($ques_29)) {
                                   if ($ques_29['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="29">
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
                    <input type="checkbox" name="chkbox_production_part4" <?php echo $p_part4_check; ?> id="chkbox_production_part4"> Part-4 Completed (20%)
                    <br>
                    <span class="color_red error_production_part4 hide">Please Check this checkbox to procced further.</span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="production_part4_h1" value="<?php
                            if (!empty($ques_28)) {
                                echo $ques_28['id'];
                            }
                            ?>" id="production_part4_h1">
                            <input type="hidden" name="production_part4_h2" value="<?php
                                   if (!empty($ques_29)) {
                                       echo $ques_29['id'];
                                   }
                            ?>" id="production_part4_h2">
                            <a class="btn btn-success" onclick="validate_production_part_4()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="<?php echo base_url() . "products"; ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</form>
<!--  =========== //PRODUCTION TAB PART 4 END ===============  -->

<!--  =========== PRODUCTION TAB PART 5 START ===============  -->

<?php
$ques_26 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '26')), array('single' => true));
$ques_27 = $this->products_model->getfrom('product_question', false, array('where' => array('product_id' => $product_id, 'question_id' => '27')), array('single' => true));
?>
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
                        <input type='checkbox' name="production_part5_switch1" id="production_part5_switch1" 
                        <?php
                               if (!empty($ques_26)) {
                                   if ($ques_26['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="26">
                    </div>
                </div>
            </div>

            <div class="details_main">
                <label class="col-md-1 col-sm-2">Notes</label>
                <div class="col-sm-5">
                    <textarea cols="30" rows="5" class="form-control" name="production_part5_notes1" 
                              id="production_part5_notes1" onkeyup="$('.error_production_part5_notes1').addClass('hide');"> <?php
                               if (!empty($ques_26)) {
                                   echo $ques_26['notes'];
                               }
                               ?></textarea> 
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
                        <input type='checkbox' name="production_part5_switch2" id="production_part5_switch2" 
                        <?php
                               if (!empty($ques_27)) {
                                   if ($ques_27['answer'] == '1') {
                                       echo 'checked="checked"';
                                   }
                               }
                               ?> value="27">
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
                    <input type="checkbox" name="chkbox_production_part5" <?php echo $p_part5_check; ?> id="chkbox_production_part5"> Part-5 Completed (20%)
                    <br>
                    <span class="color_red error_production_part5 hide">Please Check this checkbox to procced further</span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group pull-right">
                        <div class="controls">
                            <input type="hidden" name="production_part5_h1" id="production_part5_h1" value="<?php
                            if (!empty($ques_26)) {
                                echo $ques_26['id'];
                            }
                            ?>">
                            <input type="hidden" name="production_part5_h2" id="production_part5_h2" value="<?php
                                   if (!empty($ques_27)) {
                                       echo $ques_27['id'];
                                   }
                            ?>" >
                            <a class="btn btn-success" onclick="validate_production_part_5()">
                                <i class="icon-save"></i> Save
                            </a>
                            <a href="<?php echo base_url() . "products"; ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</form>
<!--  =========== //PRODUCTION TAB PART 5 END ===============  -->
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

<script type="text/javascript">
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
                    if (data.completed == 'true')
                    {
                        $('.part_1_production').addClass('active');
//                            $('#complete_production_part_1').attr('disabled', true);
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

    function validate_production_part_2()
    {
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


        for (var i = 1; i <= production_part_2_count; i++) {

            var prod_date = $('#prod_date_' + i).val();
            var prod_note = $('#prod_note_' + i).val();

            if (prod_date == '') {
                error_cnt++;
                $('.error_prod_date_' + i).html('Please select date.');
            } else {
                $('.error_prod_date_' + i).html('');
            }
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
                    if (data.completed == 'true')
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



<script type="text/javascript">

    //----------------------------------------------------------------------
    $(document).ready(function () {
        $(".fancybox").fancybox({
            width: 1200,
            height: 900,
            type: 'iframe'
        });
    });

    $(document).on('click', '.no_preview', function () {
        var filename = $(this).text();
        $(".my_preview_download").attr("href", "uploads/products/" + filename);
        $(".download_filename").text(filename);
        $('#my_preview_production_form').modal('show');
        return false;
    });

    // validation Upload Attachments
    /*  By pav */
    function production_attachment_file() {
        var product_id = $('#product_id').val();
        if (product_id == '') {
            $(function () {
                bootbox.alert('Please create product in Part-1.');
            });
            return false;
        }
        $('#production_attachment_modal').modal('show');
    }
    //----------------------------------------------------------------------

    // production_attachment_file Upload Attachments
    /*  By pav */
    function production_attachment_upload() {
        if (document.getElementById("production_attachment_file").value != "") {
            var product_id = $('#product_id').val();
            var tab = 'production';
            var form_data = new FormData($("#production_attachment_form")[0]);
            form_data.append("product_id", product_id);
            form_data.append("tab", tab);
            $.ajax({
                url: '<?php echo base_url() . "products/product_attachment"; ?>',
                processData: false,
                type: 'post',
                dataType: 'json',
                data: form_data,
                contentType: false,
                success: function (response) {
                    if (response.status == 'success') {
                        $('#production_attachment_modal').modal('hide');
                        var filename = response.file_name;
                        var ext1 = filename.split('.').pop();
                        var ext = ext1.toLowerCase();

                        if (ext == 'pdf' || ext == 'jpg' || ext == 'png' || ext == 'gif') {
                            var classname = 'fancybox';
                        } else {
                            var classname = 'no_preview';
                        }
                        $('#production_attachment').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_production_attachment" class=chk_notes value=' + response.id + '><a  class=' + classname + '  href=uploads/products/' + response.file_name + '>' + response.file_name + '</a></li>');
                        $('#attachment_tab')[0].reset();
                    } else {
                        $("#error_upload_production").append(response.msg);
                    }
                }
            });

        } else {
            $('.error_upload_production').removeClass('hide');
        }
    }

    $('#delete_production_attachment').click(function () {
        var prod_id = $('#product_id').val();
        var cek_id = new Array();
        $('#chk_production_attachment:checked').each(function () {
            cek_id.push($(this).val());// an array of selected values
        });
        if (cek_id.length == 0) {
            alert("Please select atleast one checkbox");
        } else {

            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: '<?php echo base_url() . "products/delete_production_tab_selected_attachemnt" ?>',
                    type: 'post',
                    data: {ids: cek_id, pid: prod_id},
                    dataType: 'json',
                    success: function (data) {
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
    function validate_production_part_3() {
        var error_cnt = 0;
        var product_id = $('#product_id').val();

        var production_part3_notes1 = $('#production_part3_notes1').val();
        var production_part3_notes2 = $('#production_part3_notes2').val();
        var complete_production_part3 = validate_checkbox('chkbox_production_part3');

        if (product_id == '') {
            //uncommetn below line for validate Part-1 Required Part
            $(function () {
                bootbox.alert('Please create product in Part-1.');
            });
            return false;
        }

        if (error_cnt != '0') {
            return false;
        } else {

            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin

            var form_data = $("#production_part3").serializeArray();
            form_data.push({name: "product_id", value: product_id});
            form_data.push({name: "completed", value: complete_production_part3});

            $.ajax({
                url: '<?php echo base_url() . "products/production_part3"; ?>',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    if (data.status == "success") {
                        $('#production_part3_h1').val(data.production_part3_1);
                        $('#production_part3_h2').val(data.production_part3_2);
                        $('#production_part3_h3').val(data.production_part3_3);
                        $('#production_part3_h4').val(data.production_part3_4);
                        $('#production_part3_h5').val(data.production_part3_5);
                        $('#production_part3_h6').val(data.production_part3_6);
                        $('#production_part3_h7').val(data.production_part3_7);
                        //alert(document.getElementById('production_part3_h1').value);
//                        $('#chkbox_production_part3').attr('disabled', true); // Disable Checkbox

                        $('.percentage_complete_production').html(data.complete_bar_no + '%'); // Update Percentage for product update
                        if (data.completed == 'true')
                        {
                            $('.part_3_production').addClass('active');
//                            $('#chkbox_production_part3').attr('disabled', true);
                        }
                        else
                        {
                            $('.part_3_production').removeClass('active');
                        }
                        return false;
                    }
                }
            });
        }
    }
    //----------------------------------------------------------------------

    // production_part_4 Add More & Save Functionality Start
    /*  By pav */
    function validate_production_part_4() {
        var error_cnt = 0;
        var product_id = $('#product_id').val();

        var complete_production_part4 = validate_checkbox('chkbox_production_part4');

        if (product_id == '') {
            //uncommetn below line for validate Part-1 Required Part
            $(function () {
                bootbox.alert('Please create product in Part-1.');
            });
            return false;
        }


        if (error_cnt != '0') {
            return false;
        } else {

            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin

            var form_data = $("#production_part4").serializeArray();
            form_data.push({name: "product_id", value: product_id});
            form_data.push({name: "completed", value: complete_production_part4});

            $.ajax({
                url: '<?php echo base_url() . "products/production_part4"; ?>',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    if (data.status == "success") {
                        $('#production_part4_h1').val(data.production_part4_1);
                        $('#production_part4_h2').val(data.production_part4_2);

//                        $('#chkbox_production_part4').attr('disabled', true); // Disable Checkbox
                        $('.percentage_complete_production').html(data.complete_bar_no + '%'); // Update Percentage for product update
                        if (data.completed == 'true')
                        {
                            $('.part_4_production').addClass('active');
//                            $('#chkbox_production_part4').attr('disabled', true);
                        }
                        else
                        {
                            $('.part_4_production').removeClass('active');
                        }
                        return false;
                    }
                }
            });
        }
    }
    //----------------------------------------------------------------------

    // production_part_5 Add More & Save Functionality Start
    /*  By pav */
    function validate_production_part_5() {
        var error_cnt = 0;
        var product_id = $('#product_id').val();
        var production_part5_notes1 = $('#production_part5_notes1').val();
        var complete_production_part5 = validate_checkbox('chkbox_production_part5');

        if (product_id == '') {
            //uncommetn below line for validate Part-1 Required Part
            $(function () {
                bootbox.alert('Please create product in Part-1.');
            });
            return false;
        }

        if (error_cnt != '0') {
            return false;
        } else {

            $("#fakeLoader").attr('style', ''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide: 1200,
                bgColor: "#2ecc71",
                spinner: "spinner7"
            }); // Fakeloader plugin

            var form_data = $("#production_part5").serializeArray();
            form_data.push({name: "product_id", value: product_id});
            form_data.push({name: "completed", value: complete_production_part5});

            $.ajax({
                url: '<?php echo base_url() . "products/production_part5"; ?>',
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (data) {
                    if (data.status == "success") {
                        $('#production_part5_h1').val(data.production_part5_1);
                        $('#production_part5_h2').val(data.production_part5_2);
//                        $('#chkbox_production_part5').attr('disabled', true); // Disable Checkbox
                        if (data.completed == 'true')
                        {
                            $('.part_5_production').addClass('active');
//                            $('#chkbox_production_part5').attr('disabled', true);
                        }
                        else
                        {
                            $('.part_5_production').removeClass('active');
                        }
                        $('.percentage_complete_production').html(data.complete_bar_no + '%'); // Update Percentage for product update

                        return false;
                    }
                }
            });
        }
    }
    //----------------------------------------------------------------------    
</script>
