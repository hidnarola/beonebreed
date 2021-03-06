<div class="row prod_row_<?php echo $cnt; ?>">
    <div class="col-sm-12">    
        <h3 style="margin: 0 0 15px;">Supplier <?php echo $cnt; ?></h3>
    </div> 
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label" for="supplier_name_<?php echo $cnt; ?>">Supplier Name</label>
            <div class="controls">
                <select name="supplier_<?php echo $cnt; ?>" id="supplier_<?php echo $cnt; ?>" 
                        onchange="$('.error_supplier_name_<?php echo $cnt; ?>').html('');
                                fetch_supplier_data(this)" class="form-control supplier_dropdown" onchange="">
                    <option value="" selected disabled>Select Supplier</option>
                    <?php
                    if (!empty($suppliers)) {
                        foreach ($suppliers as $supplier) {
                            ?>
                            <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['supplier_name']; ?></option>        
    <?php }
} ?>
                </select>
                <span class="color_red error_supplier_name_<?php echo $cnt; ?>"></span>
                <div class="text-right" style="padding-top: 10px;">
                    <button type="button" no="<?php echo $cnt; ?>" class="btn-sm btn-success add_supplier" data-toggle="modal">Add New</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="country_<?php echo $cnt; ?>">Country</label>
            <div class="controls">
                <input class="form-control" id="country_<?php echo $cnt; ?>" readonly placeholder="Country name" type="text" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="tel_no_<?php echo $cnt; ?>">Tel No</label>
            <div class="controls">
                <input class="form-control" id="tel_no_<?php echo $cnt; ?>" readonly placeholder="Telephone No" type="text" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="address_<?php echo $cnt; ?>">Address</label>
            <div class="controls">
                <textarea id="address_<?php echo $cnt; ?>" cols="30" rows="5" readonly class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="control-label" for="contact_name_<?php echo $cnt; ?>">Contact Name</label>
            <div class="controls">
                <input class="form-control"  id="contact_name_<?php echo $cnt; ?>" readonly placeholder="Contact Name" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="contact_email_<?php echo $cnt; ?>">Contact Email</label>
            <div class="controls">
                <input class="form-control"  id="contact_email_<?php echo $cnt; ?>" readonly placeholder="Contact Email" type="text">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="product_cost_<?php echo $cnt; ?>">Product Cost</label>
            <div class="controls">
                <input class="form-control" name="product_cost_<?php echo $cnt; ?>" onkeyup="$('.error_product_cost_<?php echo $cnt; ?>').html('');" id="product_cost_<?php echo $cnt; ?>" placeholder="Product Cost" type="text">
            </div>
            <span class="color_red error_product_cost_<?php echo $cnt; ?>"> </span>
        </div>
        <div class="clearfix"></div>                    
        <input type="hidden" name="production_supplier_<?php echo $cnt; ?>" id="production_supplier_<?php echo $cnt; ?>" value="">
    </div>    
</div>