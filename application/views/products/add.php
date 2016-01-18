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
                                  <a data-toggle='tab' class="other_tabs" href='#tab2' >
                                    <i class='icon-edit text-red'></i>
                                    Marketing
                                  </a>
                                </li>
                                <li>
                                  <a data-toggle='tab' class="other_tabs" href='#tab3' >
                                    <i class='icon-ambulance text-blue'></i>
                                    Attachments
                                  </a>
                                </li>
                                <li>
                                  <a data-toggle='tab' class="other_tabs" href='#tab4'>
                                    <i class='icon-ambulance text-blue'></i>
                                    Production
                                  </a>
                                </li>
                                <li>
                                  <a data-toggle='tab' class="other_tabs" href='#tab5'>
                                    <i class='icon-ambulance text-blue'></i>
                                    Quality
                                  </a>
                                </li>
                            </ul>
                            <div class='tab-content'>
                                <div class='tab-pane active' id='tab1'>
                                    <!-- ====== Admin TAB Partial View Start ====== -->
                                    <?php $this->load->view('products/admin_tab'); ?>
                                    <!-- ====== END ====== -->
                                </div>
                                <div class='tab-pane' id='tab2'>
                                    <!-- ====== Marketing TAB Partial View Start ====== -->
                                    <?php $this->load->view('products/marketing_tab'); ?>
                                    <!-- ====== END ====== -->
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

    

   $('.other_tabs').click(function(event){
        var product_id = $('#product_id').val();

        console.log('Here'+product_id);
        event.preventDefault();
        // return false;
   });
</script>

