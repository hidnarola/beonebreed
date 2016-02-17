<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-table'></i>
                        <span>Manage Project</span>
                    </h1>
                    <ul class='breadcrumb' style="padding-top: 62px;">
                        <li class='separator'>
                        </li>
                        <li>
                            Design/Manage Project
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if ($this->session->flashdata('msg') != '') { ?>

    <div class='alert alert-success alert-dismissable'>
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        <i class='icon-ok-sign'></i>
        <?php
        if ($this->session->flashdata('msg')):echo $this->session->flashdata('msg');
        endif;
        ?>  
    </div>
    <br/>
<?php } ?>  
<div class="clearfix">	</div>

<!--<div class="container">
    <?php
    if (!empty($inprogress_projects)) {
        foreach ($inprogress_projects as $u_key) {
            ?>
             Modal 
            <div class="modal fade" id="myModal_<?php echo $u_key['id']; ?>" role="dialog">
                <div class="modal-dialog">

                     Modal content
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Action Plan</h4>
                        </div>
                        <div class="modal-body">
                            <div class='box-content'>
                                <ul class='list-unstyled tasks'>
                                    <?php
                                    if (!empty($u_key['action_plans'])) {
                                        foreach ($u_key['action_plans'] as $u_key_action) {
                                            ?>
                                            <li>
                                                <div class='task'>
                                                    <span class='pull-left'>
                                                        <?php echo $u_key_action->action ?>
                                                    </span>
                                                    <small class='pull-right'><?php echo $u_key_action->complete_level ?>%</small>
                                                </div>
                                                <div class='progress progress-small'>
                                                    <div class='progress-bar' style='width: <?php echo $u_key_action->complete_level ?>%'></div>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <li> No Actions found!</li>
                                    <?php }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <?php
        }
    }
    ?>

</div>-->
<div class='col-sm-12'>
    <div class='box bordered-box orange-border' style='margin-bottom:0;'>
        <div class='box-header orange-background'>
            <div class='title'>IN PROGRESS</div>
            <div class='actions'>
                <a href="<?php echo site_url('project/add') ?>" class="btn btn-primary pull-right">
                    <i class="icon-plus"></i>
                    Add Project
                </a>     
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
                                    Project Manager
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
                            <?php
                            if (!empty($inprogress_projects)) {
                                foreach ($inprogress_projects as $u_key) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $u_key['id']; ?>
                                            <?php
                                            if (!empty($u_key['image'])) {
                                                $cnt = 0;
                                                ?>
                                                <?php foreach ($u_key['image'] as $image) { ?>
                                                    <a class="fancybox <?php
                                                    if ($cnt == 0) {
                                                        $cnt++;
                                                    } else {
                                                        echo 'hide';
                                                    }
                                                    ?>" rel="gallery1_<?php echo $u_key['id']; ?>" href="<?php echo site_url('uploads/' . $image) ?>" title="<?php echo $image; ?>">
                                                        <img class="projectImage" src="<?php echo site_url('uploads/' . $image) ?>" alt=""/>
                                                    </a>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <a class="fancybox" href="<?php echo site_url('uploads/no_image/no_image_available.jpg') ?>" title="No Image">
                                                    <img class="projectImage" src="<?php echo site_url('uploads/no_image/no_image_available.jpg') ?>" alt=""/>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!--<a href="" data-toggle="modal" data-target="#myModal_<?php // echo $u_key['id']; ?>">
                                                <?php // echo $u_key['name']; ?>
                                            </a>-->
                                            <a class='accordion-toggle' data-parent='#accordion' data-toggle='collapse' href='#collapseOne-accordion_<?php echo $u_key['id']; ?>'><?php echo $u_key['name']; ?></a>
                                            <div class='panel-collapse collapse' id='collapseOne-accordion_<?php echo $u_key['id']; ?>'>
                                                <?php
                                    if (!empty($u_key['action_plans'])) {
                                        foreach ($u_key['action_plans'] as $u_key_action) {
                                            ?>
                                                <div class='task'>
                                                    <span class='pull-left'>
                                                        <?php echo $u_key_action->action ?>
                                                    </span><br>
                                                    <small class='pull-right'><?php echo $u_key_action->complete_level ?>%</small>
                                                </div>
                                                <div class='progress progress-small'>
                                                    <div class='progress-bar' style='width: <?php echo $u_key_action->complete_level ?>%'></div>
                                                </div>
                                    <?php } } else {?>
                                                <div class='task'>
                                                    <span class='pull-left'>
                                                        No action plan found!
                                                    </span>
                                                </div>
                                    <?php }?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $date = new DateTime($u_key['created_date']);
                                            echo $date->format('d F Y');
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                            if (!empty($u_key['priority'])) {
                                                echo $u_key['priority'];
                                            } else {
                                                echo " ";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (!empty($u_key['estimated_days'])) {
                                                $datetime1 = new DateTime($u_key['created_date']);
                                                $datetime2 = new DateTime();
                                                $interval = $datetime1->diff($datetime2);
                                                $days = $interval->format('%a');

                                                $estimate_value = $u_key['estimated_days'];
                                                $display_day = $estimate_value - $days;

                                                if ($display_day >= 0) {
                                                    echo $display_day;
                                                } else {
                                                    echo "<span style=color:red>" . $display_day . "</sapn>";
                                                }
                                            }
                                            ?> 
                                        </td>
                                        <td><?php echo $u_key['project_manager']; ?> </td>
                                        <td style="width:auto"><p class="fixed_width"><?php echo substr($u_key['quick_notes'], 0, 80); ?></p> </td>

                                        <td>
                                            <div class='text-left'>
                                                <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit/' . $u_key['id']) ?>'>
                                                    <i class='icon-edit'></i>
                                                    Edit
                                                </a>
                                                <?php if ($this->session->userdata('user_type') == 1) { ?>
                                                    <a class='btn btn-primary btn-xs btn-delete' href='<?php echo site_url('project/delete/' . $u_key['id']) ?>' onClick='return doconfirm(this.href);'>
                                                        <i class='icon-remove'></i>
                                                        Delete
                                                    </a>
                                                <?php }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?> 
                        </tbody>
                    </table>

                </div>
            </div>
            <br/><br/><br/>
            <!-- end of inprogress project -->

            <!--start of idea project -->

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
                                    <?php
                                    if (!empty($idea_projects)) {
                                        foreach ($idea_projects as $u_key) {
                                            ?>
                                            <tr>
                                                <td><?php echo $u_key['pid']; ?> 
                                                    <?php
                                                    if (!empty($u_key['image'])) {
                                                        $cnt = 0;
                                                        ?>
                                                        <?php foreach ($u_key['image'] as $image) { ?>
                                                            <a class="fancybox <?php
                                                            if ($cnt == 0) {
                                                                $cnt++;
                                                            } else {
                                                                echo 'hide';
                                                            }
                                                            ?>" rel="gallery2_<?php echo $u_key['pid']; ?>" href="<?php echo site_url('uploads/' . $image) ?>" title="<?php echo $image; ?>">
                                                                <img class="projectImage" src="<?php echo site_url('uploads/' . $image) ?>" alt=""/>
                                                            </a>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <a class="fancybox" href="<?php echo site_url('uploads/no_image/no_image_available.jpg') ?>" title="No Image">
                                                            <img class="projectImage" src="<?php echo site_url('uploads/no_image/no_image_available.jpg') ?>" alt=""/>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $u_key['name']; ?> </td>
                                                <td>
                                                    <?php
                                                    $date = new DateTime($u_key['p_created_at']);
                                                    echo $date->format('d F Y');
                                                    ?> 
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $u_key['username'];
                                                    ?> 
                                                </td>
                                                <td>
                                                    <p class="fixed_width"> <?php echo $u_key['quick_notes']; ?> </p>
                                                </td>
                                                <td>
                                                    <div class='text-left'>
                                                        <a class='btn btn-primary btn-xs' href='<?php echo site_url('project/edit/' . $u_key['pid']) ?>'>
                                                            <i class='icon-edit'></i>
                                                            Edit
                                                        </a>
                                                        <?php if ($this->session->userdata('user_type') == 1) { ?>
                                                            <a class='btn btn-primary btn-xs btn-delete' href='<?php echo site_url('project/delete/' . $u_key['pid']) ?>' onClick='return doconfirm(href);'>
                                                                <i class='icon-remove'></i>
                                                                Delete
                                                            </a>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--end of idea project -->
                </div>
            </div>

            <div id="actionModal" class="modal hide fade" role="dialog" aria-labelledby="actionModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3>Order</h3>

                </div>
                <div id="actionDetails" class="modal-body"></div>
                <div id="actionItems" class="modal-body"></div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>
            
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".fancybox").fancybox({
                        openEffect: 'none',
                        closeEffect: 'none'
                    });
                    $('#actionModal').modal({
                        keyboard: true,
                        backdrop: "static",
                        show: false,
                    }).on('show', function () {
                        var getIdFromRow = $(event.target).closest('a').data('id');
                        alert(getIdFromRow);
                        //make your ajax call populate items or what even you need
                        $(this).find('#actionDetails').html($('<b> action Id selected: ' + getIdFromRow + '</b>'))
                    });
                });

            </script>
