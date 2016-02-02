
<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-table'></i>
            <span>Manage Products</span>
          </h1>
          
          <div class='pull-right'>  
            <!-- <a href="<?php echo base_url().'barcode/import'; ?>" class="btn btn-success">Import UPC EAN Codes</a> -->
            <a class="btn btn-info">Export</a>
          </div>

        </div>
      </div>
    </div>

 

    <div class="clearfix">	</div>
    <br/>
    <div class='col-sm-12'>
      <div class='box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
          <div class='title'> Products </div>
          <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url().'products/add'; ?>">
                <i class='icon-plus'></i>
                Add Product  
              </a>
          </div>
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
                      Product
                    </th>
                    <th>
                      Type
                    </th>
                    <th>
                      Code
                    </th>
                    <th>
                      UPC
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($products_new as $prod){
                  ?>
                      <tr>
                        <td><?php echo $prod->id; ?></td>
                        <td><?php echo $prod->product_name; ?></td>
                        <td><?php echo $prod->name; ?></td>
                        <td><?php echo $prod->product_code; ?></td>
                        <td><?php echo $prod->upc; ?></td>      
                        <td>
                          <div>
                            <a class='btn btn-primary btn-xs' href=''>
                              <i class='icon-edit'></i>Edit
                            </a>
                          </div>
                        </td>
                      </tr>
                  <?php
                    }
                  ?>
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
