<br/>
<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
	<thead>
	    <tr>
		<th>
		    Id
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
	<?php 
		if(!empty($quality_list)) {
			foreach ($quality_list as $quality) { 
	?>
	<tr>
		<td><?php echo $quality['id']; ?> </td>
		<td><?php echo $quality['defect_type']; ?></td>
		<td>
		<?php
			$date = new DateTime($quality['created_date']);
			echo $date->format('d F Y');
		?> 
		</td>
		<td><?php echo $quality['store_name']; ?> </td>

		<td> <?php echo $quality['report_status']; ?> </td>
		<td><?php echo substr($quality['description'], 0,80); ?> </td>
		
		<td>
		    <div class='text-left'>
				<a class='btn btn-primary btn-xs' href='<?php echo site_url('quality/edit/' . $quality['id'].'/'.$quality['client_id']) ?>'>
				    <i class='icon-edit'></i>
				    Edit
				</a>
		    </div>
		</td>
	</tr>
	<?php } } ?> 

	</tbody>
</table>