<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
      <div class='row'>
        <div class='col-sm-12'>
          <div class='page-header'>
            <h1 class='pull-left'>
              <i class='icon-tint'></i>
              <span> Manage Product</span>
            </h1>
<!--             <div class='pull-right'>
              <ul class='breadcrumb'>
                <li>
                  <a href='index.html'>
                    <i class='icon-bar-chart'></i>
                  </a>
                </li>
                <li class='separator'>
                  <i class='icon-angle-right'></i>
                </li>
                <li>
                  UI Elements & Widgets
                </li>
                <li class='separator'>
                  <i class='icon-angle-right'></i>
                </li>
                <li class='active'>UI Elements</li>
              </ul>
            </div> -->
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
                                        <li class='active' data-target='#step1'>
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
                                        <button class='btn btn-xs btn-prev'>
                                            <i class='icon-arrow-left'></i>
                                            Prev
                                        </button>
                                        <button class='btn btn-xs btn-success btn-next' data-last='Finish'>
                                          Next
                                          <i class='icon-arrow-right'></i>
                                        </button>
                                      </div>
                                    </div>
                                    <div class='step-content'>
                                      <hr class='hr-normal'>

                                        <input name="authenticity_token" type="hidden" />
                                        <div class='step-pane active' id='step1'>
                                            <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class='form-group'>
                                                          <label class='control-label' for='inputText'>Product</label>
                                                          <div class='controls'>
                                                            <input class='form-control' id='inputText' placeholder='Product Name' type='text'>
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
                                                            <input class='form-control' name="upc" id='upc' placeholder='UPC' type='text'>
                                                          </div>
                                                        </div>
                                                        <div class='form-group'>
                                                          <label class='control-label' for='ean'>EAN</label>
                                                          <div class='controls'>
                                                            <input class='form-control' name="ean" id='ean' placeholder='EAN' type='text'>
                                                          </div>
                                                        </div>
                                                        <div class='form-group'>
                                                          <label class='control-label' for='prod_code'>Product Code</label>
                                                          <div class='controls'>
                                                            <input class='form-control' name="prod_code" id='prod_code' placeholder='Product Code' type='text'>
                                                          </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class='form-group pull-right'>
                                                          <div class='controls'>
                                                            <a href="" class="btn btn-success btn-lg">GENERATE</a>
                                                          </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class='form-group'>
                                                          <div class='controls'>
                                                            <a href=""  class="btn btn-success" ><i class='icon-save'></i> Save</a>
                                                            <a href="" class="btn btn-default" >Cancel</a>
                                                          </div>
                                                        </div>
                                                    </div>    
                                                </div>                                                
                                            </form>
                                        </div>

                                      <div class='step-pane' id='step2'>
                                        <div class='form-group'>
                                          <label class='control-label' for='inputPassword'>Password field</label>
                                          <div class='controls'>
                                            <input class='form-control' id='inputPassword' placeholder='Password field' type='password'>
                                          </div>
                                        </div>
                                      </div>
                                      <div class='step-pane' id='step3'>
                                        <div class='form-group'>
                                          <label class='control-label' for='inputTextArea'>Textarea</label>
                                          <div class='controls'>
                                            <textarea class='form-control' id='inputTextArea' placeholder='Textarea' rows='3'></textarea>
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
    
    // $(function(){
    //     bootbox.alert('Here');
    // });
</script>