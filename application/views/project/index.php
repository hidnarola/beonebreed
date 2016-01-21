<div class='row' id='content-wrapper'>
  <div class='col-xs-12'>
    <div class='row'>
      <div class='col-sm-12'>
        <div class='page-header'>
          <h1 class='pull-left'>
            <i class='icon-table'></i>
            <span>Manage Project</span>
          </h1>
        </div>
      </div>
    </div>

    <?php if (!empty($this->session->flashdata('msg'))) { ?>
      <div class='alert alert-success alert-dismissable'>
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        <i class='icon-ok-sign'></i>
        <?php if ($this->session->flashdata('msg')):echo $this->session->flashdata('msg');
        endif;
        ?>  
      </div>
<?php } ?>  
    <!--
  <div style="margin-right:15px;">
<a href="<?php //echo site_url('project/add')   ?>" class="btn btn-primary pull-right">Add Project</a>     
</div> -->
    <div class="clearfix">	</div>
    <br/>
    <div class='col-sm-12'>
      <div class='box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
          <div class='title'>IN PROGRESS</div>

          <div class='actions'>


            <a href="<?php echo site_url('project/add') ?>" class="btn btn-primary pull-right">Add Project</a>     

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
                      Project Name
                    </th>
                    <th>
                      Date Created
                    </th>
                    <th>
                      Priority
                    </th>
                    <th>
                      Days
                    </th>
                    <th>
                      Last User
                    </th>
                    <th style="width:auto">
                      Notes
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
<?php foreach ($inprogress_list as $u_key) { ?>
                    <tr>
                      <td><?php echo $u_key->id; ?> </td>
                      <td><?php echo $u_key->name; ?> </td>
                      <td>
                        <?php
                        $date = new DateTime($u_key->created_date);
                        echo $date->format('d F Y');
                        ?> 
                      </td>
                      <td><?php
                        if (!empty($u_key->priority)) {
                          echo $u_key->priority;
                        } else {
                          echo " ";
                        }
                        ?></td>
                      <td><?php 
                      /*
                          $estimate_value=$u_key->estimated_days;
                          $current_date = date("Y-m-d H:i:s");    // or your date as well
                          $create_date =$u_key->created_date;
                          $interval = date_diff($create_date,$current_date);
                          echo $interval->format('%R%a days');
                        */  
                      /*
                          $exp = date("y-m-d",strtotime($u_key->created_date));
                          $now = date("y-m-d",time());
                          $diffday = $now-$exp;
                          //echo $diffday;
                          
                          echo $diffday;*/
                          
                          if(!empty($u_key->estimated_days)){
                            $datetime1 = new DateTime($u_key->created_date);
                            $datetime2 = new DateTime();
                            $interval = $datetime1->diff($datetime2);
                            $days=$interval->format('%a');

                            $estimate_value=$u_key->estimated_days;
                            $display_day=$estimate_value-$days;
                            if($display_day >=0){
                              
                              echo $display_day;
                            }else{
                              
                              echo "<span style=color:red>".$display_day."</sapn>";
                            }
                            
                          }  
                          
                          //echo "create_date=>".$u_key->created_date." current_date=>".$datetime1."day_diff=>".$days."estimate_value=>".$estimate_value."final_value=>".$display_day;
                          
                          
                        ?> 
                      </td>
                      <td><?php echo $u_key->project_manager; ?> </td>
                      <td style="width:auto"><p class="fixed_width"><?php echo substr($u_key->quick_notes, 0,80); ?></p> </td>

                      <td>


                        <div class='text-left'>
                          <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit/' . $u_key->id) ?>'>
                            <i class='icon-edit'></i>
                            Edit
                          </a>
                          <!--
                            <a class='btn btn-danger btn-xs' href='<?php echo site_url('project/delete/' . $u_key->id) ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
                              <i class='icon-remove'></i>Delete
                            </a>-->
                        </div>
                      </td>
                    </tr>
<?php } ?> 

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/><br/><br/>
    <!-- end of inprogress project -->

    <!--start of idea project -->

    <div class='col-sm-12'>
      <div class='box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
          <div class='title'>IDEA</div>

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
                      Project Name
                    </th>
                    <th>
                      Date Created
                    </th>
                    <th>
                      Priority
                    </th>
                    <th>
                      Notes
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
<?php foreach ($idea_list as $u_key) { ?>
                    <tr>
                      <td><?php echo $u_key->id; ?> </td>
                      <td><?php echo $u_key->name; ?> </td>
                      <td>
                        <?php
                        $date = new DateTime($u_key->created_date);
                        echo $date->format('d F Y');
                        ?> 
                      </td>
                      <td><?php
                        if (!empty($u_key->priority)) {
                          echo $u_key->priority;
                        } else {
                          echo " ";
                        }
                        ?> </td>
                      <td><p class="fixed_width"><?php echo $u_key->quick_notes; ?> </p></td>

                      <td>


                        <div class='text-left'>
                          <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit/' . $u_key->id) ?>'>
                            <i class='icon-edit'></i>
                            Edit
                          </a>
                          <!--
                            <a class='btn btn-danger btn-xs' href='<?php //echo site_url('project/delete/'.$u_key->id)   ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
                              <i class='icon-remove'></i>Delete
                            </a>-->
                        </div>
                      </td>
                    </tr>
<?php } ?> 

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--end of idea project -->
  </div>
</div>
<script type="text/javascript">
  
  
  
</script>
