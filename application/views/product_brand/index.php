
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-table'></i>
                        <span>Manage Product Brands</span>
                    </h1>

                    <div class='pull-right'>  
                        <a href="<?php echo base_url() . 'product_brand/add'; ?>" class="btn btn-success">Add Brand</a>
                    </div>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            Settings/Product Brand
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>

        <?php echo myflash_message('success', 'success');
        echo myflash_message('error'); ?>

        <div class="clearfix">	</div>
        <div class='col-sm-12'>
            <div class='box bordered-box orange-border' style='margin-bottom:0;'>
                <div class='box-header orange-background'>
                    <div class='title'> Product Brand </div>
                    <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#">
                        </a>
                    </div>
                </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            BRAND NAME
                                        </th>
                                        <th>
                                            CREATED DATE
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($brands)) {
                                        foreach ($brands as $brand) {
                                            ?>
                                            <tr>
                                                <td><?php echo $brand['id']; ?></td>
                                                <td><?php echo $brand['brand_name']; ?></td>
                                                <td><?php echo $brand['created_date']; ?></td>                        
                                                <td>
                                                    <div class='text-left'>
                                                        <a class='btn btn-primary btn-xs' href="<?php echo base_url() . 'product_brand/edit/' . $brand['id']; ?>">
                                                            <i class='icon-edit'></i>
                                                            Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
    <?php }
} ?> 

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/><br/>
        <!-- end of inprogress project -->

    </div>
</div>
<script type="text/javascript">



</script>
