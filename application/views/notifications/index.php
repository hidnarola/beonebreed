
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='row'>
            <div class='col-sm-12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <i class='icon-table'></i>
                        <span>Manage Notifications</span>
                    </h1>

                    <div class='pull-right'>  
                    </div>
                </div>
            </div>
        </div>

        <?php 
            echo myflash_message('success', 'success');
            echo myflash_message('error'); 
        ?>

        <div class="clearfix">	</div>
        <div class='col-sm-12'>
            <div class='box bordered-box orange-border' style='margin-bottom:0;'>
                <div class='box-header orange-background'>
                    <div class='title'> Product Notifications </div>
                    <div class='actions'>
                        <a class="btn box-collapse btn-xs btn-link" href="#">
                        </a>
                    </div>
                </div>
                <div class='box-content box-no-padding'>
                    <div class='responsive-table'>
                        <div class='scrollable-area'>
                            <table id="actsort" class='table table-bordered table-striped' style='margin-bottom:0;'>
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            NOTIFICATION TITLE
                                        </th>
                                        <th>
                                            STATUS
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
                                    if (!empty($all_notifications)) {
                                        foreach ($all_notifications as $notification) {
                                            ?>
                                            <tr>
                                                <td><?php echo $notification['id']; ?></td>
                                                <td><?php echo $notification['notification_en']; ?></td>
                                                <td>

                                                    <?php echo ($notification['status']=='1') ? '<span class="label label-success btn-sm">Active</span>':'<span class="label label-danger btn-sm">Deactive</span>';?>
                                                </td>
                                                <td><?php echo $notification['created_date']; ?></td>                        
                                                <td>
                                                    <div class='text-left'>
                                                        <a class='btn btn-danger btn-xs' 
                                                           href="<?php echo base_url() . 'notifications/delete/'.$notification['id']; ?>"
                                                           onClick='return doconfirm(this.href);' >
                                                            <i class='icon-remove'></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                    <?php if($notification['status']=='1') { ?>
                                                    <div class='text-left'>
                                                        <a class='btn btn-primary btn-xs' 
                                                            href="<?php echo base_url() . 'notifications/change_status/'.$notification['id']; ?>"
                                                            onClick='return doconfirm(this.href);'>
                                                            <i class='icon-check'></i>
                                                            Change Status
                                                        </a>
                                                    </div>
                                                    <?php } ?>
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
    $(document).ready(function () {
        $('#actsort').dataTable({
            "aaSorting": [[2, 'asc']],
        });
     });   
</script>

