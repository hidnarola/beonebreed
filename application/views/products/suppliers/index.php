
<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-table'></i>
            <span>Manage Suppliers</span>
          </h1>
          
          <div class='pull-right'>  
            <a href="<?php echo base_url().'suppliers/add'; ?>" class="btn btn-success">Add Supplier</a>
          </div>

        </div>
      </div>
    </div>

    <?php echo myflash_message('success','success'); echo myflash_message('error'); ?>

    <div class="clearfix">	</div>
    <div class='col-sm-12'>
      <div class='box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
          <div class='title'> Product Supplier </div>
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
                    <th class="text-center">
                      Potential Level
                    </th>
                    <th>
                      Supplier Name
                    </th>
                    <th>
                      Created Date
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    if(!empty($suppliers)) {
                    foreach ($suppliers as $supplier) { 
                ?>
                    <tr>
                      <td class="text-center"><?php echo $supplier['potential_level']; ?></td>
                      <td><?php echo character_limiter($supplier['supplier_name'],40); ?></td>
                      <td><?php echo $supplier['created_date']; ?></td>                        
                      <td>
                        <div class='text-left'>
                          <a class='btn btn-primary btn-xs' href="<?php echo base_url().'suppliers/edit/'.$supplier['id']; ?>">
                            <i class='icon-edit'></i>
                            Edit
                          </a>
                        </div>
                      </td>
                    </tr>
                <?php } } ?> 

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
