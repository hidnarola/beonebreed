
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-table'></i>
                        <span>Manage Barcodes</span>
                    </h1>

                    <div class='pull-right'>  
                        <a href="<?php echo base_url() . 'barcode/import'; ?>" class="btn btn-success">Import UPC EAN Codes</a>
                        <a href="<?php echo base_url() . 'barcode/export'; ?>" class="btn btn-info">Export</a>
                    </div>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            <a href='<?php echo site_url('barcode/') ?>'>Products/Barcode</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <?php echo myflash_message('success', 'success');
        echo myflash_message('error'); ?>
        <div class="clearfix">	</div>
        <br/>
        <div class='col-sm-12'>
            <div class='box bordered-box orange-border' style='margin-bottom:0;'>
                <div class='box-header orange-background'>
                    <div class='title'> Barcodes </div>
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
                                            UPC
                                        </th>
                                        <th>
                                            EAN
                                        </th>
                                        <th>
                                            DESCRIPTION
                                        </th>
                                        <th>
                                            CREATED DATE
                                        </th>
                                        <th>
                                            MODIFIED DATE
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($barcodes)) {
                                        foreach ($barcodes as $barcode) {
                                            ?>
                                            <tr>
                                                <td><?php echo $barcode['id']; ?></td>
                                                <td><?php echo $barcode['upc']; ?></td>
                                                <td><?php echo $barcode['ean']; ?></td>
                                                <td><?php echo $barcode['description']; ?></td>
                                                <td><?php echo $barcode['created_date']; ?></td>                        
                                                <td><?php echo $barcode['modified_date']; ?></td>                        
                                                <td>
                                                    <div class='text-left'>
                                                        <a class='btn btn-primary btn-xs' href="<?php echo base_url() . 'barcode/edit/' . $barcode['id']; ?>">
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
