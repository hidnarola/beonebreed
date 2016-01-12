
<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-tint'></i>
			  <span>Manage Project Category</span>
			</h1>
			<div class='pull-right'>
			 
			</div>
		  </div>
		</div>
	  </div>
	  <?php  if(!empty($this->session->flashdata('msg'))){ ?>
            <div class='alert alert-success alert-dismissable'>
                       <a class="close" data-dismiss="alert" href="#">&times;</a>
           <i class='icon-ok-sign'></i>
            <?php if($this->session->flashdata('msg')):echo $this->session->flashdata('msg');endif; ?>  
         </div>
           <?php } ?>
	
	<div class='col-sm-12'>
	  <div class='box bordered-box orange-border' style='margin-bottom:0;'>
		<div class='box-header orange-background'>
		  <div class='title'>Project Category</div>
		  <div class='actions'>
			 <a href="<?php echo site_url('category/add') ?>" class="btn btn-primary pull-right">Add Category</a>
			
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
					  Category
					</th>
					<th>
					  Action
					</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($category_list as $u_key){ ?>
				  <tr>
					<td><?php echo $u_key->id; ?> </td>
					<td><?php echo $u_key->name; ?> </td>
					
					<td>
					
	
					  <div class='text-left'>
						<a class='btn btn-primary btn-xs' href='<?php echo site_url('category/edit/'.$u_key->id) ?>'>
						  <i class='icon-edit'></i>
						  Edit
						</a>
						<a class='btn btn-danger btn-xs' href='<?php echo site_url('category/delete/'.$u_key->id) ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
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
 