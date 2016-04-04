<?php //p($marketing_part1_title,1);?>
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-tint'></i>
                        <span> Manage Product</span>
                    </h1>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            <a href='<?php echo site_url('products/') ?>'>Products/Products</a>
                        </li>
                        <li class='separator'>
                            <i class='icon-angle-right'></i>
                        </li>
                        <li>
                            <?php echo $data_admin_part_1['product_name'];?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>              
        <div class='row'>
            <div class='col-sm-12 box' style='margin-bottom: 0'>
                <div class='box-header orange-background'>
                    <div class='title'>Product</div>
                    <div class='actions'>

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
                                        <?php $this->load->view('products/edit/admin_tab_edit'); ?>
                                        <!-- ====== END ====== -->
                                    </div>
                                    <div class='tab-pane ' id='tab2'>
                                        <!-- ====== Marketing TAB Partial View Start ====== -->
                                        <?php $this->load->view('products/edit/marketing_tab_edit'); ?>
                                        <!-- ====== END ====== -->
                                    </div>
                                    <div class='tab-pane ' id='tab3'>
                                        <!-- ====== Attachment TAB Partial View Start ====== -->
                                        <?php $this->load->view('products/edit/attachment_tab_edit'); ?>
                                        <?php $this->load->view('products/edit/notes_tab_edit'); ?>                                    
                                        <!-- ====== END ====== -->
                                    </div>
                                    <div class='tab-pane ' id='tab4'>
                                        <?php //p($data_production_part_1,1); ?>
                                        <?php $this->load->view('products/edit/production_tab_edit'); ?>
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
    
    $('#brand_name').val('<?php echo $data_admin_part_1["brand_id"]; ?>');
    $('#category').val('<?php echo $data_admin_part_1["short_name"]; ?>');

    $('.other_tabs').click(function (event) {

        var product_id = $('#product_id').val();

        $('#attach_project_id').val(product_id);
        $('#notes_project_id').val(product_id);
        $('#hdn_marketting_part_3').val(product_id); //done
        $('#hdn_marketting_part_4').val(product_id); //done
        event.preventDefault();
        // return false;

    });

</script>

