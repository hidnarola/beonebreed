<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-user'></i>
			  <span>Manage Client User</span>
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
		  <div class='title'>Client User</div>
						<?php if(!empty($client_id)){ $id=$client_id; }else{ $id=0; } ?>
                        <a href="<?php echo site_url('client_user/add/'.$id) ?>" class="btn btn-primary pull-right">Add User</a>
		  </div>
		</div>
		<div class='box-content box-no-padding'>
		  <div class='responsive-table'>
			<div class='scrollable-area'>
			  <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
				<thead>
				  <tr>
					<th>
					 Username
					</th>
					<th>
					  Email
					</th>
					<th>
					  Store
					</th>
					<th>
					  Action
					</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($client_user_list as $u_key){ ?>
				  <tr>
					<td><?php echo $u_key->username; ?> </td>
					<td><?php echo $u_key->email; ?> </td>
					<td><span>#<?php echo $u_key->store_id; ?>  <span><?php echo $u_key->store_name; ?> </td>
					<td>
					   <div class='text-left'>
						<a class='btn btn-primary btn-xs' href='<?php echo site_url('client_user/edit/'.$u_key->id.'/'.$client_id) ?>'>
						  <i class='icon-edit'></i>
						  Edit
						</a>
						<a class='btn btn-danger btn-xs' href='<?php echo site_url('client_user/delete/'.$u_key->id.'/'.$client_id) ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
						  <i class='icon-remove'></i>Delete
						</a>
						 
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
<script type="text/javascript">

 

</script>
 