
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
	<div class='row'>
	    <div class='col-sm-12'>
		<div class='page-header'>
		    <h1 class='pull-left'>
			<i class='icon-bookmark'></i>
			<span>
				Report
				<?php if (!empty($client_name['username'])) {
						echo ucfirst($client_name['username']);
					} ?>
			</span>
		    </h1>
		    <div class='pull-right'>

		    </div>
		</div>
	    </div>
	</div>
	<div class='row'>
	    <div class='col-sm-12'>
		<div class='box bordered-box orange-border'>
		    <div class='box-header orange-background'>
			<div class="title">
			    Report:<?php if (!empty($quality['qty_in_store'])) { echo $quality['id'];} ?>
			</div>
		    </div>
		    <div class='box-content box-padding'>
			<div class='fuelux'>
			    <div class='wizard'>
				<div class='actions'>
				    <button class='btn  btn-success' onclick="window.location.href = '<?php echo site_url('project'); ?>'" style="display:none" id="finish" >
					<!--disabled="disabled"-->
					Finish
					<i class='icon-arrow-right'></i>
				    </button>
				</div>
			    </div>
			    <div class='step-content'>
				<hr class='hr-normal'>
				<!-- inserting add project form -->	
				<form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data" name="quality_report" id="quality_report">   
				    <div style="display:inline-block;float:left;width:45%" class='box-content'>
					<div class='form-group'>
					    <label for='inputText'>Name</label><span style="color:red">*</span>
					    <input class='form-control' id='inputText' placeholder='Name' type='text' name='name' value="<?php
					    if (!empty($quality['name'])) {
						echo $quality['name'];
					    }
					    ?>">
					    <span style="color:red"><?php echo form_error('name'); ?><span>
						    </div>
						    <div class='form-group'>
							<label for='inputText'>Product</label><span style="color:red">*</span>
							<select class="form-control js-example-data-array-selected1" name="product" >
							    <option value="">Select Product</option>
							    <?php
							    if (!empty($product_list)) {
								foreach ($product_list as $k => $v) {
								    if ($v->id == $quality['product']) {
									?>
	    							    <option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
								    <?php } else {
									?>
	    							    <option value="<?php echo $v->id; ?>" ><?php echo ucfirst($v->name); ?></option>
									<?php
								    }
								}
							    }
							    ?>		
							</select>
							<span style="color:red"><?php echo form_error('product'); ?><span>
								</div>
								<div class='form-group'>
								    <label for='inputText'>Title</label>
								    <input class='form-control' id='inputText' placeholder='Title' type='text' name='title' value="<?php
								    if (!empty($quality['title'])) {
									echo $quality['title'];
								    }
								    ?>">

								</div>
								<div class='form-group'>
								    <label for='inputText'>Description</label>
								    <textarea class="form-control" rows="5" id="comment" name="description"><?php
									if (!empty($quality['description'])) {
									    echo $quality['description'];
									}
									?></textarea>

								</div>
								<div class='form-group'>
								    <label for='inputText'>Problem Type</label><span style="color:red">*</span>
								    <select class="form-control js-example-data-array-selected1" name="problem_type" >
									<option value="">Select Problem Type</option>
									<?php
									if (!empty($problem_list)) {
									    foreach ($problem_list as $k => $v) {
										if ($v->id == $quality['problem_type']) {
										    ?>
	    									<option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
										<?php } else {
										    ?>
	    									<option value="<?php echo $v->id; ?>" ><?php echo ucfirst($v->name); ?></option>
										    <?php
										}
									    }
									}
									?>		
								    </select>
								    <span style="color:red"><?php echo form_error('problem_type'); ?><span>
								    </div>
								    <div class='form-group'>
										<label for='inputText'>Status</label>
										<select class="form-control js-example-data-array-selected1" name="status" id="status">
										
										<?php
										if (!empty($status_list)) {
											foreach ($status_list as $k => $v) {
											if ($v->id == $quality['status']) {
												?>
												<option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
											<?php } else {
												?>
												<option value="<?php echo $v->id; ?>" ><?php echo ucfirst($v->name); ?></option>
												<?php
											}
											}
										}
										?>		
										</select>
								    </div>

									    </div>
									    <div style="display:inline-block;float:right;width:50%" class='box-content'>
										<div class='form-group'>
										    <label for='inputText'>Store</label><span style="color:red">*</span>
										    <select class="form-control js-example-data-array-selected1 store" name="store" id="store">
											<option value="">Select Store</option>
											<?php
											if (!empty($store_list)) {
											    foreach ($store_list as $k => $v) {
												if ($v->id == $quality['store']) {
												    ?>
	    											<option value="<?php echo $v->id; ?>" selected><?php echo ucfirst($v->name); ?></option>
												<?php } else {
												    ?>
	    											<option value="<?php echo $v->id; ?>" ><?php echo ucfirst($v->name); ?></option>
												    <?php
												}
											    }
											}
											?>		
										    </select>  
										    <span style="color:red"><?php echo form_error('store'); ?><span>
											    </div>
											    <div class='form-group'>
												<label for='inputText'>Contact Info</label><span style="color:red">*</span>
												<textarea class="form-control" rows="5" id="contact_info" name="contact_info"><?php
												    if (!empty($quality['contact_info'])) {
													echo $quality['contact_info'];
												    }
												    ?></textarea>

											    </div>
											    <div class='form-group'>
												<label for='inputText'>#Ds</label>
												<input class='form-control' id='inputText' placeholder='#Ds' type='text' name='ds' value="<?php
												if (!empty($quality['ds'])) {
												    echo $quality['ds'];
												}
												?>">
												<!-- <span style="color:red"><?php //echo form_error('name');    ?><span>-->
											    </div>
											    <div class='form-group'>
												<label for='inputText'>Qty In Store</label><span style="color:red">*</span>
												<input class='form-control store' id='inputText' placeholder='Qty In Store' type='text' name='qty_in_store' value="<?php
												if (!empty($quality['qty_in_store'])) {
												    echo $quality['qty_in_store'];
												}
												?>" >
												<span style="color:red"><?php echo form_error('qty_in_store'); ?><span>
													</div>
													<div class='form-group'>
													    <label for='inputText'>Qty Defect</label><span style="color:red">*</span>
													    <input class='form-control' id='inputText' placeholder='Qty Defect' type='text' name='qty_defect' value="<?php
													    if (!empty($quality['qty_defect'])) {
														echo $quality['qty_defect'];
													    }
													    ?>">
													    <span style="color:red"><?php echo form_error('qty_in_store'); ?><span>
														    </div>

														    <div class='text-right form-actions form-actions-padding-sm form-actions-padding-md form-actions-padding-lg' style='margin-bottom: 0;'>
															<button class='btn btn-success' type='submit' id="submit_button">
																<i class='icon-save'></i>
																Save
															  </button>
															<a class='btn' type='submit' href="<?php echo site_url('quality/index/'.$client_id); ?>">Cancel</a>
														    </div>
														    </div>
														    <div class="clearfix"></div>
														    </form>		
														    <!-- end of add form -->	
														    </div>
														    </div>

														    <div class='step-pane' id='step2'>

															<!--start second step-->

															<div class="col-sm-12">
															    <div class="row">
																<div class="">
																    <h3 class="title font-s-0">Timesheet</h3>
																    <!-- Nav tabs -->
																</div>
																<div class="">
																    <ul class="nav nav-tabs" role="tablist">
																	<li class="active">
																	    <a href="#home" role="tab" data-toggle="tab">
																		<icon class="icon-paper-clip"></icon> Attachment
																	    </a>
																	</li>
																	<li><a href="#profile" role="tab" data-toggle="tab">
																		<i class="icon-file-text"></i> Notes
																	    </a>
																	</li>
																	<li><a href="#external" role="tab" data-toggle="tab">
																		<i class="icon-external-link"></i> External Com
																	    </a>
																	</li>
																    </ul>

																    <!-- Tab panes -->
																    <div class="tab-content">
																	<div class="tab-pane fade active in" id="home">

																	    <div class='row' style='margin-bottom: 0;'>


																		<div class="col-md-6">
																		    <ul id="attachment" class="tab-ul"> 

																			<?php
																			foreach ($attachment as $u_key) {
																			    $filetype = $u_key->name;
																			    $ext = strtolower(pathinfo($filetype, PATHINFO_EXTENSION));
																			    if ($ext == 'pdf' || $ext == 'gif' || $ext == 'jpg' || $ext == 'png') {
																				?>
																				<li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="<?php echo $u_key->id; ?>"><a class="fancybox" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

																				    <?php } else { ?>

																																								<li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_attachment" value="<?php echo $u_key->id; ?>"><a class="no_preview" href='uploads/<?php echo $u_key->name; ?>' ><?php echo $u_key->name; ?></a></li>

																				    <?php }
																				} ?> 
																		    </ul>
																		</div> 


																	    </div>

																	    <div class='' style='margin-bottom: 0;'>
																		<button class='btn btn-success' type='button' data-target="#myuploadModal" data-toggle="modal">
																		    <i class='icon-save'></i>
																		    Add
																		</button>
																		<button class='btn btn-danger' type='button' id="delete_my_upload">
																		    <i class='icon-save'></i>
																		    Remove
																		</button>
																	    </div> 

																	</div>

																	<!-- preview download bootstrap files-->

																	<div class="container">
																	    <!-- Modal -->
																	    <div class="modal fade" id="my_preview_form" role="dialog">
																		<div class="modal-dialog">

																		    <!-- Modal content-->
																		    <div class="modal-content">
																			<div class="modal-header">
																			    <button type="button" class="close" data-dismiss="modal">&times;</button>
																			    <h4 class="modal-title"><h3 class="download_filename"> </h3></h4>
																			</div>
																			<!--
																			<div class="modal-body">
																			  <h3 class="download_filename"> </h3>
																			</div> -->
																			<div class="modal-body">
																			    <a href="" class="btn btn-success my_preview_download"><i class="icon-download bounce"></i>&nbsp;Download</a>
																			</div>
																			<div class="modal-footer">
																			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			</div>
																		    </div>

																		</div>
																	    </div>

																	</div>





																	<!-- preview download-->

																	<!-- bootstrap upload container start-->

																	<div class="container">
																	    <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_upload_form" enctype="multipart/form-data">
																		<!-- Modal -->
																		<div class="modal fade" id="myuploadModal" role="dialog">
																		    <div class="modal-dialog">
																			<input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php
																				if (!empty($quality['id'])) {
																				    echo $quality['id'];
																				}
																				?>">
																			<!-- Modal content-->
																			<div class="modal-content">
																			    <div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal">&times;</button>
																				<h4 class="modal-title">Attachment</h4>
																			    </div> 
																			    <div class='box-content'>		
																				<div class='form-group'>
																				    <label for='inputText'>Upload</label><span style="color:red">*</span>
																				    <input type="file" class="form_input_contact" name="file" id="file"/>

																				</div>
																				<span style="color:red" id="file_err_msg"><span>
																					</div> 
																					<div class="modal-footer" style="border-top: 1px solid #fff;">
																					    <button type="button" class="btn btn-success" id="upload_form_data">Save</button>
																					    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

																					</div>
																					</div>

																					</div>
																					</div>
																					</form>
																					</div>

																					<!-- bootstrap container end -->
																					<div class="tab-pane fade" id="profile"> 
																					    <div class="tab-pane fade active in" id="home">
																						<div class='row' style='margin-bottom: 0;' id="notes_div_form">
																						    <div class="col-md-6">
																							<ul id="notes" class="tab-ul">
																							    <?php foreach ($notes as $u_key) { ?>

    																							    <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_attachment" class="chk_notes" value="<?php echo $u_key->id; ?>"><a href="javascript:void(0)"  data-desc="<?php echo $u_key->description; ?>" class="notes_link" id="<?php echo $u_key->id; ?>"><?php echo $u_key->name; ?></a><span style="margin-left: 60px;"><?php $date = new DateTime($u_key->created_date);
																								echo $date->format('d F Y'); ?></span></li>

<?php } ?> 
																							</ul>
																						    </div>
																						</div>

																						<div class="">
																						    <button class='btn btn-success' type='button' id="expand_notes">
																							<i class='icon-save'></i>
																							Add
																						    </button>
																						    <button class='btn btn-danger' type='button' id="delete_my_notes">
																							<i class='icon-save'></i>
																							Remove
																						    </button>
																						</div> 
																						<hr>
																						<form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_notes_form" >
																						    <div class='' style='margin-bottom: 0;display:none' id="expand_notes_form">
																							<input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php
if (!empty($quality['id'])) {
    echo $quality['id'];
}
?>">
																							<div class='form-group'>
																							    <label for='inputText'>Title</label><span style="color:red">*</span>
																							    <input class='form-control'   type='text' name='notes_name' id="notes_title">
																							    <span style="color:red" id="notes_err_msg"></span>
																							</div>
																							<div class="form-group">
																							    <label for="comment">Description:</label>
																							    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
																							</div>
																							<button type="button" class="btn btn-success" id="notes_form_data">Save</button>
																							<button type="button" class="btn " id="cancel_notes_form">Cancel</button>

																						    </div>
																						</form>    

																						<!-- bootstrap container for notes information -->
																						<div id="my_notes_description" class="modal fade" role="dialog">
																						    <div class="modal-dialog">
																							<!-- Modal content-->
																							<div class="modal-content">
																							    <div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal">&times;</button>
																								<h4 class="modal-title">Notes</h4>
																							    </div>
																							    <div class="modal-body" id="notes_desc">

																							    </div>
																							    <div class="modal-footer">
																								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																							    </div>
																							</div>

																						    </div>
																						</div>
																						<!-- bootstrap container for notes information ends -->

																					    </div>
																					</div>
																					<div class="tab-pane fade" id="external">
																					    <div class="tab-pane fade active in" id="home">
																						<div class='row' style='margin-bottom: 0;' id="external_link_div">
																						    <div class="col-md-6">
																							<!--<a class="fancybox" href="uploads/Users1.pdf">Open pdf</a>-->
																							<ul id="external_links" class="tab-ul">

																							    <?php foreach ($external_link as $u_key) { ?>

    																							    <li style="list-style:none"><input type="checkbox" name="chk[]" id="chk_external_link" class="chk_external_link" value="<?php echo $u_key->id; ?>"><a href="javascript::void(0)" class="external_link_data " data-desc="<?php echo $u_key->description; ?>" ><?php echo $u_key->name; ?></a><span style="margin-left: 60px;"><?php $date = new DateTime($u_key->created_date);
																							    echo $date->format('d F Y'); ?></span></li>

<?php } ?> 

																							</ul>
																						    </div>
																						</div>

																						<div class="">
																						    <button class='btn btn-success' type='button' id="expand_external_links">
																							<i class='icon-save'></i>
																							Add
																						    </button>
																						    <button class='btn btn-danger' type='button' id="delete_my_external_link">
																							<i class='icon-save'></i>
																							Remove
																						    </button>   
																						</div> 
																						<hr>
																						<form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="project_external_form" >  
																						    <div class='' style='margin-bottom: 0;display:none' id="expand_external_form">
																							<input  type='hidden' name='hdn_project_id' id="hdn_project_id" class="hdn_project_id" value="<?php
if (!empty($quality['id'])) {
    echo $quality['id'];
}
?>">
																							<div class='form-group'>
																							    <label for='inputText'>Title</label><span style="color:red">*</span>
																							    <input class='form-control' placeholder='Title' type='text' name='external_com' id="external_com">
																							    <span style="color:red" id="link_err_msg"></span>
																							</div>
																							<div class='form-group'>
																							    <label for='inputText'>Description</label>
																							    <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
																							    <span style="color:red" id="link_err_msg"></span>
																							</div>       
																							<button type="button" class="btn btn-success" id="external_form_data">Save</button>
																							<button type="button" class="btn " id="cancel_external_form">Cancel</button>

																						    </div>
																						</form>    

																						<!-- bootstrap container for external notes information -->
																						<div id="my_external_description" class="modal fade" role="dialog">
																						    <div class="modal-dialog">
																							<!-- Modal content-->
																							<div class="modal-content">
																							    <div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal">&times;</button>
																								<h4 class="modal-title">External Com</h4>
																							    </div>
																							    <div class="modal-body" id="external_desc">

																							    </div>
																							    <div class="modal-footer">
																								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																							    </div>
																							</div>

																						    </div>
																						</div>
																						<!-- bootstrap container for notes information ends -->

																					    </div>

																					</div>
																					</div>
																					</div>
																					</div>
																					</div>	
																					<!-- end form -->
																					</div>
																					</div>
																					</div>
																					</div>
																					</div>


																					<!-- start of tab panes -->



































																					<!--end of tab panes -->

																					</div>
																					</div>

																					<script type="text/javascript">

																							      $(".store").change(function() {

																								  var store_id = $('.store').val();
																								  if (store_id != '') {
																								      $.ajax({
																									url: '<?php echo site_url('quality/get_contact_info'); ?>',
																									type: 'post',
																									dataType: 'json',
																									data: {id: store_id},
																									success: function(response) {

																									if (response.status == 'success') {
																									$('#contact_info').text('');
																									$('#contact_info').text(response.contact_info);
																									}
																									}
																								      });
																								  }
																							      });
																							      $(document).ready(function() {

																								  //$('input[type="text"],select').prop("disabled", true);
																								  //$("#contact_info").attr("disabled", "disabled");
																								  //$("#comment").attr("disabled", "disabled");
																								  //disableForm('#quality_report');
																								  $('#quality_report').find('input, textarea, button, select').attr('disabled', 'disabled');
																								  $("#status").attr("disabled",false);
																								  $("#submit_button").attr("disabled",false);
																									


																								  $(".fancybox").fancybox({
																								      width: 1200,
																								      height: 900,
																								      type: 'iframe'
																								  });

																							      });

																							      $(document).on("click", "#btn_finish_send", function() {

																								  submitForm();
																							      });
																							      $(document).on("click", "#upload_form_data", function() {

																								  uploadForm();
																							      });
																							      $(document).on("click", "#notes_form_data", function() {

																								  noteForm();
																							      });

																							      $(document).on("click", "#external_form_data", function() {

																								  externalForm();
																							      });

																							      $(document).on("click", "#expand_notes", function() {

																								  $('#expand_notes_form').show();
																								  $('#notes_div_form').hide();

																							      });
																							      $(document).on("click", "#expand_external_links", function() {

																								  $('#expand_external_form').show();
																								  $('#external_link_div').hide();

																							      });
																							      $(document).on("click", "#cancel_external_form", function() {

																								  $("#expand_external_form").css("display", "none");
																								  $('#external_link_div').show();
																							      });
																							      $(document).on("click", "#cancel_notes_form", function() {

																								  $('#expand_notes_form').hide();
																								  $('#notes_div_form').show();
																							      });

																							      $(document).on('click', '.notes_link', function() {

																								  var data = $(this).attr("data-desc");
																								  $('#notes_desc').text(data);
																								  $('#my_notes_description').modal('show');
																							      });
																							      $(document).on('click', '.external_link_data', function() {

																								  var data = $(this).attr("data-desc");
																								  $('#external_desc').text(data);
																								  $('#my_external_description').modal('show');
																							      });
																							      $(document).on('click', '#archive_projects', function() {

																								  var id = $(this).attr("data-archieve");
																								  archieveProject(id);

																							      });
																							      $(document).on('click', '.no_preview', function() {
																								  var filename = $(this).text();
																								  $(".my_preview_download").attr("href", "uploads/" + filename);
																								  $(".download_filename").text(filename);
																								  $('#my_preview_form').modal('show');
																								  return false;
																							      });

																							      //deleting notes
																							      $('#delete_my_notes').click(function() {

																								  var cek_id = new Array();
																								  $('.chk_notes:checked').each(function() {
																								      cek_id.push($(this).val());// an array of selected values
																								  });
																								  if (cek_id.length == 0) {
																								      alert("Please select atleast one checkbox");
																								  } else {

																								      if (confirm("Are you sure you want to delete this?")) {
																									$.ajax({
																									url: '<?php echo base_url() . "quality/delete_selected_notes"; ?>',
																									type: 'post',
																									data: {ids: cek_id},
																									dataType: 'json',
																									success: function(data) {

																									if (data.status == 'success') {

																									location.reload();
																									}
																									}
																									});
																								      } else {
																									return false;
																								      }

																								  }
																							      });



																							      //deleting attachment
																							      $('#delete_my_upload').click(function() {

																								  var cek_id = new Array();
																								  $('.chk_attachment:checked').each(function() {
																								      cek_id.push($(this).val());// an array of selected values
																								  });
																								  if (cek_id.length == 0) {
																								      alert("Please select atleast one checkbox");
																								  } else {

																								      if (confirm("Are you sure you want to delete this?")) {
																									$.ajax({
																									url: '<?php echo base_url() . "quality/delete_selected_attachemnt"; ?>',
																									type: 'post',
																									data: {ids: cek_id},
																									dataType: 'json',
																									success: function(data) {

																									if (data.status == 'success') {

																									location.reload();
																									}
																									}
																									});
																								      } else {
																									return false;
																								      }

																								  }
																							      });

																							      //delete selected link
																							      $('#delete_my_external_link').click(function() {

																								  var cek_id = new Array();
																								  $('.chk_external_link:checked').each(function() {
																								      cek_id.push($(this).val());// an array of selected values
																								  });
																								  if (cek_id.length == 0) {
																								      alert("Please select atleast one checkbox");
																								  } else {

																								      if (confirm("Are you sure you want to delete this?")) {
																									$.ajax({
																									url: '<?php echo base_url() . "quality/delete_selected_link"; ?>',
																									type: 'post',
																									data: {ids: cek_id},
																									dataType: 'json',
																									success: function(data) {

																									if (data.status == 'success') {

																									location.reload();
																									}
																									}
																									});
																								      } else {
																									return false;
																								      }

																								  }
																							      });



																							      function archieveProject(id) {
																								  var project_id = id;
																								  if (confirm("Are you sure you want to archieve this project?")) {
																								      $.ajax({
																									url: '<?php echo site_url('project/project_archieve'); ?>',
																									type: 'post',
																									data: {id: project_id},
																									dataType: 'json',
																									success: function(response) {
																									if (response.status == 'success') {
																									window.location.href = "<?php echo site_url('project/archieve_projects'); ?>";
																									}
																									}
																								      });
																								  } else {
																								      return false;
																								  }
																							      }

																							      function externalForm() {

																								  $('#link_err_msg').text('');
																								  var external_link = $('#external_com').val();

																								  if (external_link == '') {
																								      $('#link_err_msg').text('please enter External link');
																								      $("#external_com").focus();
																								      return false;
																								  }
																								  var data = new FormData($("#project_external_form")[0]);
																								  $('#response_msg').html('');
																								  $.ajax({
																								      url: '<?php echo site_url('quality/quality_add_links'); ?>',
																								      processData: false,
																								      type: 'post',
																								      dataType: 'json',
																								      data: data,
																								      contentType: false,
																								      success: function(response) {

																									if (response.status == 'success') {

																									$('#myexternalModal').modal('hide');
																									//$("#external_links").append($("<li style=list-style-type:none;>").text(response.link_name));
																									$('#external_links').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_external_link value=' + response.link_id + '><a data-desc="' + response.link_desc + '" class="external_link_data" id="' + response.link_id + '" href="javascript::void(0)">' + response.link_name + '</a><span style=margin-left:60px>' + response.dates1 + '</span></li>');
																									$('#project_external_form')[0].reset();
																									$("#expand_external_form").css("display", "none");
																									$('#external_link_div').show();
																									//location.reload();

																									} else {

																									}
																								      }
																								  });

																								  return false;
																							      }
																							      function noteForm() {

																								  $('#notes_err_msg').text('');
																								  var notes_title = $('#notes_title').val();


																								  if (notes_title == '') {
																								      $('#notes_err_msg').text('please enter notes title');
																								      $("#notes_name").focus();
																								      return false;
																								  }

																								  var data = new FormData($("#project_notes_form")[0]);
																								  $('#response_msg').html('');
																								  $.ajax({
																								      url: '<?php echo site_url('quality/quality_add_notes'); ?>',
																								      processData: false,
																								      type: 'post',
																								      dataType: 'json',
																								      data: data,
																								      contentType: false,
																								      success: function(response) {

																									if (response.status == 'success') {
																									$('#project_notes_form')[0].reset();
																									$('#mynoteModal').modal('hide');
																									//$("#notes").append($("<li style=list-style-type:none;>").text(response.notes_name));
																									//$('#notes').append('<li style=list-style-type:none;></li>');
																									$('#notes').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_notes value=' + response.id + '><a data-desc="' + response.desc + '" class="notes_link" id="' + response.id + '" href="javascript::void(0)">' + response.notes_name + '</a><span style=margin-left:60px>' + response.dates1 + '</span></li>');
																									$("#expand_notes_form").css("display", "none");
																									$("#notes_div_form").css("display", "block");


																									//location.reload();

																									} else {

																									}
																								      }
																								  });

																								  return false;
																							      }
																							      function uploadForm() {

																								  $('#file_err_msg').text('');
																								  var file = $('#file').val();
																								  if (file == '') {
																								      $('#file_err_msg').text('please upload some attachment');
																								      $("#file").focus();
																								      return false;
																								  }
																								  var data = new FormData($("#project_upload_form")[0]);
																								  $('#response_msg').html('');
																								  $.ajax({
																								      url: '<?php echo site_url('quality/quality_upload_form'); ?>',
																								      processData: false,
																								      type: 'post',
																								      dataType: 'json',
																								      data: data,
																								      contentType: false,
																								      success: function(response) {

																									if (response.status == 'success') {

																									$('#myuploadModal').modal('hide');
																									$('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
																									//location.reload();
																									var filename = response.file_name;
																									var ext1 = filename.split('.').pop();
																									var ext = ext1.toLowerCase();

																									if (ext == 'pdf' || ext == 'jpg' || ext == 'png' || ext == 'gif') {

																									var classname = 'fancybox';
																									} else {
																									var classname = 'no_preview';
																									}

																									$('#attachment').append('<li style=list-style-type:none;><input type=checkbox name=chk[] id="chk_attachment" class=chk_attachment value=' + response.id + '><a  class=' + classname + '  href=uploads/' + response.file_name + '>' + response.file_name + '</a></li>');

																									//$("#attachment").append($("<input type=checkbox name=checkbox[] value='1'><li style=list-style-type:none;>").text(response.file_name));
																									} else {
																									$('#response_msg').append('<span style=color:red; id=msgs>' + response.msg + '</span>');
																									}
																								      }
																								  });

																								  return false;
																							      }
																							      function submitForm() {

																								  var project_name = $('#name').val();
																								  $('#response_msg').html('');
																								  $('#type_err_msg').text('');
																								  $('#name_err_msg').text('');
																								  var project_type = $('#project_type_id').val();
																								  if (project_name == '') {
																								      $('#name_err_msg').text('please enter project name');
																								      $("#name").focus();
																								      return false;
																								  }
																								  if (project_type == '') {

																								      $('#type_err_msg').text('please enter project type');
																								      $("#project_type_id").focus();
																								      return false;
																								  }
																								  var data = new FormData($("#project_add_form")[0]);
																								  $.ajax({
																								      url: '<?php echo site_url('project/add'); ?>',
																								      processData: false,
																								      type: 'post',
																								      dataType: 'json',
																								      data: data,
																								      contentType: false,
																								      success: function(response) {

																									if (response.status == 'success') {

																									$('#response_msg').append('<span style=color:green; id=msgs>' + response.msg + '</span>');
																									} else {
																									$('#response_msg').append('<span style=color:red; id=msgs>' + response.msg + '</span>');
																									}
																								      }
																								  });

																								  return false;
																							      }

																					</script>