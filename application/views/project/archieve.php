
<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-archive'></i>
			  <span>Archives Project</span>
			</h1>
			<div class='pull-right'>
			 
			</div>
		  </div>
		</div>
	  </div>
	  
	   <div class='pull-left' style="color:#fcd052;margin-left:15px;">
          <?php if($this->session->flashdata('msg')):echo $this->session->flashdata('msg');endif; ?>  
	</div>
	<!--
	  <div style="margin-right:15px;">
       <a href="<?php //echo site_url('project/add') ?>" class="btn btn-primary pull-right">Add Project</a>     
	</div>-->
	<div class="clearfix">	</div>
	<br/>
	<div class='col-sm-12'>
	  <div class='box bordered-box orange-border' style='margin-bottom:0;'>
		<div class='box-header orange-background'>
		  <div class='title'>ARCHIVES</div>
		  
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
					 Date Closed
					</th>
					<th>
						Days
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
				<?php foreach ($archieve_list as $u_key){ ?>
				  <tr>
					<td><?php echo $u_key->id; ?> </td>
					<td><?php echo $u_key->name; ?> </td>
					<td>
						<?php 
							$date = new DateTime($u_key->created_date);
							echo $date->format('d F Y');?> 
					</td>
					<td><?php 
							$date = new DateTime($u_key->updated_date);
							echo $date->format('d F Y');?> 
					</td>
					<td>
            <?php
              $datetime1 = new DateTime($u_key->created_date);
              $datetime2 = new DateTime($u_key->updated_date);
              $interval = $datetime1->diff($datetime2);
              $days=$interval->format('%a');
              echo $days; 
          ?>
          </td>
					<td><?php echo substr($u_key->quick_notes, 0,80); ?></td>
                                        <td> 
                                            <div class='text-left'>
						<a class='btn btn-primary btn-xs' href='<?php echo site_url('project/view_archieve/'.$u_key->id) ?>'>
						  <i class='icon-list'></i>
						  View
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
	<br/><br/><br/>
	<!-- end of inprogress project -->
  </div>
</div>

 