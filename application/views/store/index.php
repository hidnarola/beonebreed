<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-retweet'></i>
			  <span>STORES MONDOU</span>
			</h1>
			<div class='pull-right'>
			 
			</div>
		  </div>
		</div>
	  </div>
    <div id="alert_messges" >
      
      
    </div>
	  <?php  if(!empty($this->session->flashdata('msg'))){ ?>
            <div class='alert alert-success alert-dismissable'>
                       <a class="close" data-dismiss="alert" href="#">&times;</a>
           <i class='icon-ok-sign'></i>
            <?php if($this->session->flashdata('msg')):echo $this->session->flashdata('msg');endif; ?>  
         </div>
           <?php } ?>
     <?php  if(!empty($this->session->flashdata('err_msg'))){ ?>
            <div class='alert alert-danger alert-dismissable'>
                       <a class="close" data-dismiss="alert" href="#">&times;</a>
           <i class='icon-ok-sign'></i>
            <?php if($this->session->flashdata('err_msg')):echo $this->session->flashdata('err_msg');endif; ?>  
         </div>
           <?php } ?>
    	<br/> 

  <div class='col-sm-12 text-right'>
    <button class='btn btn-danger inline-block margin-b-10' type='button' data-target="#myuploadModal" data-toggle="modal">
      <i class='icon-save'></i>
      IMP .CSV
    </button>
    <a href="<?php echo site_url('store/export_to_csv') ?>" class="btn btn-warning inline-block margin-b-10">EXP .CSV</a>
  </div>
  
 <div style="clear: both;"></div>
	<div class='col-sm-12'>
	  <div class='box bordered-box orange-border' style='margin-bottom:0;'>
      <div class='box-header orange-background'> 
        <div class='title'>Store</div>
                          <?php if(!empty($client_id)){ $id=$client_id; }else{ $id=0; } ?>
                          <a href="<?php echo site_url('store/add/'.$id) ?>" class="btn btn-primary pull-right">Add Store</a>
        </div>
		
		<div class='box-content box-no-padding'>
		  <div class='responsive-table white-space-no'>
			<div class='scrollable-area'>
			  <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
				<thead>
				  <tr>
					<th>
					 Name
					</th>
					<th>
					  Address
					</th>
          <th>
					  Tel
					</th>
          <th>
					  Fax
					</th>
           <th>
					  Contact Info
					</th>
                     <th>
					  Action
					</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach ($store_list as $u_key){ ?>
				  <tr>
					<td><?php echo $u_key->name; ?> </td>
          <td><?php echo $u_key->address; ?> </td>
					<td><?php echo $u_key->telephone; ?> </td>
          <td><?php echo $u_key->fax; ?> </td>
          <td><?php echo $u_key->contact; ?> </td>
                    
					<td>
					   <div class='text-left'>
						<a class='btn btn-primary btn-xs' href='<?php echo site_url('store/edit/'.$u_key->id.'/'.$client_id) ?>'>
						  <i class='icon-edit'></i>
						  Edit
						</a>
						<a class='btn btn-danger btn-xs' href='<?php echo site_url('store/delete/'.$u_key->id.'/'.$client_id) ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}">
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
                    <!-- attachment bootstrap upload container start-->
<div class="container">
  <form class="form" action="<?php echo site_url("store/importcsv/".$client_id); ?>" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_upload_form" enctype="multipart/form-data">
      <!-- Modal -->
      <div class="modal fade" id="myuploadModal" role="dialog">
          <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Attachment</h4>
                  </div> 
                  <div class='box-content'>		
                      <div class='form-group'>
                          <label for='inputText'>Upload</label><span style="color:red">*</span>
                          <input type="file" class="form_input_contact" name="file" id="file" accept=".csv" required/>
                         
                      </div>
                      <span style="color:red" id="file_err_msg"><span>
                    </div> 
                    <div class="modal-footer" style="border-top: 1px solid #fff;">
                        <button type="submit" class="btn btn-success" id="upload_form_data">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                    </div>
                  </div>
              </div>
            </div>
        </form>
      </div>
          <!-- attachemnt bootstrap container end -->
		</div>
				</div>
	  </div>
	</div>
  </div>
</div>
<script>
  
  /*
    $(document).on("click", "#upload_form_data", function() {
      uploadForm();
    }); */
    
    function uploadForm() {
            var data = new FormData($("#project_upload_form")[0]);
           
            $.ajax({
                url: '<?php echo site_url('store/importcsv'); ?>',
                processData: false,
                type: 'post',
                dataType: 'json',
                data: data,
                contentType: false,
                success: function(response) {
                  
                   var msg=response.msg;
                  if(response.status=="success"){
                  
                  alert("file Successfully uploaded");
                    location.reload();
                    //$('#alert_messges').append('<div class="alert alert-success alert-dismissable"><a class=close data-dismiss=alert href=#>&times;</a><i class=icon-ok-sign></i>&nbsp;'+msg+'</div>');
                    
                  }else{
                    
                    $('#alert_messges').append('<div class="alert alert-danger alert-dismissable"><a class=close data-dismiss=alert href=#>&times;</a><i class=icon-ok-sign></i>&nbsp;'+msg+'</div>');
                  }
                  $('#myuploadModal').modal('hide');
                   
                }
            });
           
  
            return false;
      }
</script>
 