<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-bookmark'></i>
			  <span>QUALITÉ</span>
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
	
	<br/>    
	<div class='col-sm-12'>
	  <div class='box bordered-box orange-border' style='margin-bottom:0;'>
		<div class='box-header orange-background'>
		  <div class='title'>Report</div>
                        <a href="<?php echo site_url('Client_quality/add') ?>" class="btn btn-primary pull-right">New</a>
		  </div>
		
		<div class='box-content box-no-padding'>
		  <div class='responsive-table'>
			<div class='scrollable-area'>
			  <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
				<thead>
				  <tr>
					<th>
					 Id
					</th>
					<th>
					  Title
					</th>
					<th>
					  Date
					</th>
					<th>
					  Product
					</th>
					<th>
					  Store
					</th>
					<th>
					  User
					</th>
					<th>
					  Status
					</th>
					<th>
					  Action
					</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($quality_list as $u_key){ ?>
				  <tr>
					<td><?php echo $u_key->id; ?> </td>
					<td><?php echo $u_key->title; ?> </td>
					<td>
            <?php 
              $date = new DateTime($u_key->created_date);
              echo $date->format('d F Y');
            ?> 
          </td>
					<td><?php echo $u_key->product_name; ?> </td>
					<td><?php echo $u_key->store_name; ?> </td>
					<td><?php echo $u_key->username; ?> </td>
					<td><?php echo $u_key->report_status; ?> </td>
					
					<td>
					   <div class='text-left'>
						<a class='btn btn-primary btn-xs' href='<?php echo site_url('client_quality/edit/'.$u_key->id) ?>'>
						  <i class='icon-list'></i>
						  View
						</a>
							
						<!--			
						<a class='btn btn-danger btn-xs' href='<?php //echo site_url('mondou/quality/delete/'.$u_key->id) ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
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
</div>