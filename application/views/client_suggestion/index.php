<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-trello'></i>
			  <span><?=lang('idea_heading')?></span>
			</h1>
			<div class='pull-right'>
        
			 
			</div>
		  </div>
		</div>
	  </div>
	  <?php  if($this->session->flashdata('msg')!=''){ ?>
            <div class='alert alert-success alert-dismissable'>
                       <a class="close" data-dismiss="alert" href="#">&times;</a>
           <i class='icon-ok-sign'></i>
            <?php if($this->session->flashdata('msg')):echo $this->session->flashdata('msg');endif; ?>  
         </div>
           <?php } ?>
	
	<br/>    
	<div class='col-sm-12'>
	  <div class='box bordered-box orange-border' style='margin-bottom:0;'>
		<div class='box-header orange-background'>
		  <div class='title'><?=lang('idea_sub_heading')?></div>
                        <a href="<?php echo site_url('client_suggestion/add') ?>" class="btn btn-primary pull-right"><?=lang('idea_create')?></a>
		  </div>
		</div>
		<div class='box-content box-no-padding'>
		  <div class='responsive-table'>
			<div class='scrollable-area'>
			  <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
				<thead>
				  <tr>
					<th>
					 <?=lang('idea_id')?>
					</th>
					<th>
					  <?=lang('idea_Subject')?>
					</th>
					<th>
					  <?=lang('idea_Date')?>
					</th>
					<th>
					 <?=lang('idea_store')?>
					</th>
					<th>
					  <?=lang('idea_user')?>
					</th>
					<th>
					  <?=lang('idea_status')?>
					</th>
					<th>
					  <?=lang('action')?>
					</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($suggestion_list as $u_key){ ?>
				  <tr>
					<td><?php echo $u_key->id; ?> </td>
					<td><?php echo $u_key->subject; ?> </td>
					<td>
                                            <?php 
                                              $date = new DateTime($u_key->created_date);
                                              echo $date->format('d F Y');
                                            ?> 
                                        </td>
					<td><?php echo $u_key->store_name; ?> </td>
					<td><?php echo $u_key->username; ?></td>
					<td><?=lang($u_key->suggestion_status)?></td>
					
					
					<td>
					   <div class='text-left'>
						<a class='btn btn-primary btn-xs' href='<?php echo site_url('client_suggestion/edit/'.$u_key->id) ?>'>
						  <i class='icon-list'></i>
						  <?=lang('View')?>
						</a>
						<!--
						<a class='btn btn-danger btn-xs' href='<?php echo site_url('client_suggestion/delete/'.$u_key->id) ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
						  <i class='icon-remove'></i>Delete
						</a> -->
					  </div>
					</td>
				  </tr>
				 <?php }?> 
				  
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>

 