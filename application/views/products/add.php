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
                <div class='box-header orange-background'>
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
                                <li class="active" >
                                  <a data-toggle='tab' href='#tab1'>
                                    <i class='icon-gears text-blue'></i>
                                    Admin
                                  </a>
                                </li>
                                <li class="">
                                  <a data-toggle='tab' class="other_tabs" href='#tab2' >
                                    <i class='icon-bullhorn text-red'></i>
                                    Marketing
                                  </a>
                                </li>
                                <li class=''>
                                  <a data-toggle='tab' class="other_tabs" href='#tab3' >
                                    <i class='icon-paper-clip'></i>
                                    Attachments
                                  </a>
                                </li>
                                <li class="">
                                  <a data-toggle='tab' class="other_tabs" href='#tab4'>
                                    <i class='icon-ok text-blue'></i>
                                    Production
                                  </a>
                                </li>
                                <li>
                                  <a data-toggle='tab' class="other_tabs" href='#tab5'>
                                    <i class='icon-upload-alt text-red'></i>
                                    Quality
                                  </a>
                                </li>
                            </ul>
                            <div class='tab-content'>
                                <div class='tab-pane active' id='tab1'>
                                    <!-- ====== Admin TAB Partial View Start ====== -->
                                    <?php $this->load->view('products/admin_tab_add'); ?>
                                    <!-- ====== END ====== -->
                                </div>
                                <div class='tab-pane ' id='tab2'>
                                    <!-- ====== Marketing TAB Partial View Start ====== -->
                                    <?php $this->load->view('products/marketing_tab_add'); ?>
                                    <!-- ====== END ====== -->
                                </div>
                                <div class='tab-pane ' id='tab3'>
                                    <!-- ====== Attachment TAB Partial View Start ====== -->
                                    <?php $this->load->view('products/attachment_tab_add'); ?>
                                    <?php $this->load->view('products/notes_tab_add'); ?>                                    
                                    <!-- ====== END ====== -->
                                </div>
                                <div class='tab-pane ' id='tab4'>
                                    <?php $this->load->view('products/production_tab_add'); ?>
                                </div>
                                <div class='tab-pane' id='tab5'>
                                  <?php $this->load->view('products/product_quality_tab'); ?>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div> <!-- End of class box-content -->
            </div>
        </div>      
    </div>
</div>

<script type="text/javascript">

   $('.other_tabs').click(function(event){
       
       var product_id = $('#product_id').val();

       $('#attach_project_id').val(product_id);
       $('#notes_project_id').val(product_id);
       $('#hdn_marketting_part_3').val(product_id);
       $('#hdn_marketting_part_4').val(product_id);
       
       event.preventDefault();
       // return false;

   });

</script>

