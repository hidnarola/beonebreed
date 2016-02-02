<div class="row ">
    <div class="form-horizontal label-left">
        <div class="col-sm-12">    
            <h3 style="margin: 0 0 15px;">Sample <?php echo $cnt; ?></h3>
        </div>    
        <div class="col-sm-12">
            <div class="form-group">
                <label class="control-label col-sm-2" >Date:</label>
                <div class="col-sm-4">
                  <div class="controls">
                    <div class='datetimepicker input-group form-group target_datetimepicker' >
                        <input class='form-control' readonly data-format='yyyy-MM-dd hh:mm:ss'  placeholder='Select timepicker' 
                               type='text' name='prod_date_<?php echo $cnt; ?>' id="prod_date_<?php echo $cnt; ?>">
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
                              <input type='checkbox' name="is_approve_<?php echo $cnt; ?>" id="is_approve_<?php echo $cnt; ?>" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <span class="color_red error_prod_date_<?php echo $cnt; ?>" ></span>
        </div>
    </div>
    <div class="form-horizontal label-left">
        <div class="col-sm-12">
            <div class="form-group">
              <label class="control-label col-sm-2" for="">Notes</label>
              <div class="col-sm-10">
                  <div class="controls">
                    <input class="form-control"  name="prod_note_<?php echo $cnt; ?>" 
                            id="prod_note_<?php echo $cnt; ?>" type="text" 
                           onkeyup="$('.error_prod_note_<?php echo $cnt; ?>').html('');">
                  </div>
                  <span class="color_red text-center error_prod_note_<?php echo $cnt; ?>" ></span>                    
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="">IMPROVMENTS NEEDED <br/>(IF ANY)</label>
                <div class="col-sm-10">
                  <div class="controls">
                    <input class="form-control"  name="improvement_needed_<?php echo $cnt; ?>" 
                           id="improvement_needed_<?php echo $cnt; ?>" placeholder="Improvement Needed" type="text">
                  </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="production_sample_1" id="production_sample_1" value="">
</div>