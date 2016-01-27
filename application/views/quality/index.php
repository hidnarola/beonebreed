<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
	<div class='row'>
	    <div class='col-sm-12'>
		<div class='page-header'>
		    <h1 class='pull-left'>
			<i class='icon-bookmark'></i>
			<span>Quality <?php if ($client_name['username']=='') {
						echo ucfirst($client_name['username']);
					} ?>
			</span>
		    </h1>
		    <div class='pull-right'>

		    </div>
		</div>
	    </div>
	</div>
<?php if ($this->session->flashdata('msg')!='') { ?>
    	<div class='alert alert-success alert-dismissable'>
    	    <a class="close" data-dismiss="alert" href="#">&times;</a>
    	    <i class='icon-ok-sign'></i>
		<?php
		if ($this->session->flashdata('msg')):echo $this->session->flashdata('msg');
		endif;
		?>  
    	</div>
	<?php } ?>

	<br/>    
	<div class='col-sm-12'>
	    <div class='box bordered-box orange-border' style='margin-bottom:0;'>
		<div class='box-header orange-background'>
		    <div class='title'>Stores Report In Progress</div>

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
					    Product
					</th>
					<th>
					    Defect type
					</th>
					<th>
					    Date
					</th>
					<th>
					    Store
					</th>
					<th>
					    Status
					</th>
					<th>
					    Quick Details
					</th>
					<th>
					    Action
					</th>
				    </tr>
				</thead>
				<tbody>
				<?php foreach ($quality_list as $u_key) { ?>
    				    <tr>
    					<td><?php echo $u_key->id; ?> </td>
    					<td><?php echo $u_key->product_name; ?> </td>
    					<td><?php echo $u_key->defect_type; ?></td>
    					<td>
						<?php
						$date = new DateTime($u_key->created_date);
						echo $date->format('d F Y');
						?> 
    					</td>
    					<td><?php echo $u_key->store_name; ?> </td>

    					<td> <?php echo $u_key->report_status; ?> </td>
    					<td><?php echo substr($u_key->description, 0,80); ?> </td>
						
    					<td>
    					    <div class='text-left'>
    						<a class='btn btn-primary btn-xs' href='<?php echo site_url('quality/edit/' . $u_key->id.'/'.$client_id) ?>'>
    						    <i class='icon-edit'></i>
    						    Edit
    						</a>

    						<!--			
    						<a class='btn btn-danger btn-xs' href='<?php //echo site_url('mondou/quality/delete/'.$u_key->id)  ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
    						  <i class='icon-remove'></i>Delete
    						</a> -->
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
	<br/>
	<br/>
	<!-- completed report start-->

	<div class='col-sm-12'>
	    <div class='box bordered-box orange-border' style='margin-bottom:0;'>
		<div class='box-header orange-background'>
		    <div class='title'>Stores Report Completed</div>

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
					    Product
					</th>
					<th>
					    Defect type
					</th>
					<th>
					    Date
					</th>
					<th>
					    Store
					</th>
					<th>
					    Status
					</th>
					<th>
					    Quick Details
					</th>
					<th>
					    Action
					</th>
				    </tr>
				</thead>
				<tbody>
<?php foreach ($completed_quality_list as $u_key) { ?>
    				    <tr>
    					<td><?php echo $u_key->id; ?> </td>
    					<td><?php echo $u_key->product_name; ?> </td>
    					<td><?php echo $u_key->defect_type; ?></td>
    					<td>
						<?php
						$date = new DateTime($u_key->created_date);
						echo $date->format('d F Y');
						?> 
    					</td>
    					<td><?php echo $u_key->store_name; ?> </td>

    					<td> Case Closed</td>
    					<td><?php echo substr($u_key->description, 0,80); ?></td>

    					<td>
    					    <div class='text-left'>
    						<a class='btn btn-primary btn-xs' href='<?php echo site_url('quality/edit/' . $u_key->id.'/'.$client_id) ?>'>
    						    <i class='icon-edit'></i>
    						    Edit
    						</a>

    						<!--			
    						<a class='btn btn-danger btn-xs' href='<?php //echo site_url('mondou/quality/delete/'.$u_key->id)  ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
    						  <i class='icon-remove'></i>Delete
    						</a> -->
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






	<!-- completed report end -->
    </div>
</div>
</div>

