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
 
 
    <?php if ($this->session->flashdata('msg')!='') { ?>

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
              <table class='data-table table table-bordered' style='margin-bottom:0;'>
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
                        <td>
                            <?php echo $u_key->id; ?>
                            <a class="fancybox" href="http://farm2.staticflickr.com/1617/24108587812_6c9825d0da_b.jpg" title="Morning Godafoss (Brads5)">
                                <img src="http://farm2.staticflickr.com/1617/24108587812_6c9825d0da_m.jpg" alt="" width="50px" height="50px" />
                            </a>
                        </td>
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
                      <td>
                        <?php 
                          
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
                      Creator
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
                      <td><?php echo $u_key->pid; ?> </td>
                      <td><?php echo $u_key->name; ?> </td>
                      <td>
                        <?php
                            $date = new DateTime($u_key->p_created_at);
                            echo $date->format('d F Y');
                        ?> 
                      </td>
                      <td>
                        <?php
                            echo $u_key->username;
                        ?> 
                      </td>
                      <td>
                        <p class="fixed_width"> <?php echo $u_key->quick_notes; ?> </p>
                      </td>
                      <td>
                        <div class='text-left'>
                          <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit/' . $u_key->pid) ?>'>
                            <i class='icon-edit'></i>
                            Edit
                          </a>
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
    $(document).ready(function() {
        $(".fancybox").fancybox({
            openEffect  : 'none',
            closeEffect : 'none'
        });
    });
</script>