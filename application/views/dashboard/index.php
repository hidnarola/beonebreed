<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>

		<div class='page-header page-header-with-buttons'>
		    <h1 class='col-sm-12 pull-left'>
			<i class='icon-dashboard'></i>
			<span>Dashboard</span>
		    </h1>
		</div>
		
		<div class="row">
		    <div class="col-xs-6">
				<div class="progressBlockOuter">
					<div class='box'>
                        <div class='box-header orange-background'>
                          <div class='title'>
                           	Design
                          </div>
                        </div>
                        <div class='box-content '>
	                       	<div class='scrollable' data-scrollable-height='300' data-scrollable-start='top'>
	                          <ul class='list-unstyled tasks'>
	                          	<?php
	                          		$total_action = 0;
	                          		if(!empty($projects)) {
	                          			foreach($projects as $project) {
	                          				$total_action = 0;
	                          				$all_action_plan = $this->products_model->getfrom('project_actionplan',false,array('where'=>array('project_id'=>$project['id'])));
	                          				if(!empty($all_action_plan)){
                                                                    $total_action_count = count($all_action_plan);
                                                                    $multi = 100 / $total_action_count;
	                          					foreach($all_action_plan as $action_plan){
                                                                            $sum = ($multi * $action_plan['complete_level']) / 100;
	                          						$total_action += round($sum);
	                          					}
	                          				}
	                          	?>
	                            <li>
	                              <div class='task'>
	                                <span class='pull-left'>
	                                  <a href="<?php echo base_url().'project/edit/'.$project['id']; ?>">
	                                  	<?php echo $project['name']; ?>
	                                  </a>
	                                </span>
	                                <small class='pull-right'><?php echo $total_action; ?>%</small>
	                              </div>
	                              <div class='progress progress-small'>
	                                <div class='progress-bar' style='width: <?php echo $total_action; ?>%'></div>
	                              </div>
	                            </li>
	                            <?php } } ?>
	                          </ul>
                        	</div>
                        </div>
                    </div>

					<div class='box'>
                        <div class='box-header orange-background'>
                          <div class='title'>
                            	Product in Progress
                          </div>
                        </div>
                        <div class='box-content '>
	                       	<div class='scrollable' data-scrollable-height='300' data-scrollable-start='bottom'>
	                          <ul class='list-unstyled tasks'>
	                          	<?php
	                          		if(!empty($products)) {
	                          			
	                          			foreach($products as $product) {

	                          			$admin_comp_sum = 0;
	                          			$marketing_comp_sum = 0;
										$production_comp_sum = 0;		

										$admin_comp_prod_sum = 0;
										$marketing_comp_prod_sum = 0;
										$production_comp_prod_sum = 0;

	                          			if(!empty($product['admin_tab_complete'])){
	                          				$admin_comp_exp = json_decode($product['admin_tab_complete'],true);
	                          				$admin_comp_sum = array_sum(array($admin_comp_exp['part_1'],$admin_comp_exp['part_2'],$admin_comp_exp['part_3']));
	                          				($admin_comp_exp['part_1']!=0) ? $admin_comp_prod_sum += 10 : $admin_comp_prod_sum;
	                          				($admin_comp_exp['part_2']!=0) ? $admin_comp_prod_sum += 10 : $admin_comp_prod_sum;
	                          				($admin_comp_exp['part_3']!=0) ? $admin_comp_prod_sum += 10 : $admin_comp_prod_sum;
	                          			}

	                          			if(!empty($product['marketing_complete'])){
	                          				$marketing_comp_exp = json_decode($product['marketing_complete'],true);
	                          				$marketing_comp_sum = array_sum(array($marketing_comp_exp['part_1'],
	                          													  $marketing_comp_exp['part_2'],
	                          												      $marketing_comp_exp['part_3'],
	                          												      $marketing_comp_exp['part_4'],
	                          												      $marketing_comp_exp['part_5']));
	                          				($marketing_comp_exp['part_1']!=0) ? $marketing_comp_prod_sum += 8 : $marketing_comp_prod_sum;
	                          				($marketing_comp_exp['part_2']!=0) ? $marketing_comp_prod_sum += 8 : $marketing_comp_prod_sum;
	                          				($marketing_comp_exp['part_3']!=0) ? $marketing_comp_prod_sum += 8 : $marketing_comp_prod_sum;
	                          				($marketing_comp_exp['part_4']!=0) ? $marketing_comp_prod_sum += 8 : $marketing_comp_prod_sum;
	                          				($marketing_comp_exp['part_5']!=0) ? $marketing_comp_prod_sum += 8 : $marketing_comp_prod_sum;
	                          			}

	                          			if(!empty($product['production_complete'])){
	                          				$production_comp_exp = json_decode($product['production_complete'],true);
	                          				$production_comp_sum = array_sum(array($production_comp_exp['part_1'],
	                          													  $production_comp_exp['part_2'],
	                          												      $production_comp_exp['part_3'],
	                          												      $production_comp_exp['part_4'],
	                          												      $production_comp_exp['part_5']));

	                          				($production_comp_exp['part_1']!=0) ? $production_comp_prod_sum += 6 : $marketing_comp_prod_sum;
	                          				($production_comp_exp['part_2']!=0) ? $production_comp_prod_sum += 6 : $marketing_comp_prod_sum;
	                          				($production_comp_exp['part_3']!=0) ? $production_comp_prod_sum += 6 : $marketing_comp_prod_sum;
	                          				($production_comp_exp['part_4']!=0) ? $production_comp_prod_sum += 6 : $marketing_comp_prod_sum;
	                          				($production_comp_exp['part_5']!=0) ? $production_comp_prod_sum += 6 : $marketing_comp_prod_sum;
	                          			}
	         							//echo "--------------------------------<br/>";
	         							//echo $admin_comp_sum; echo "<br/>";
	         							//echo $marketing_comp_sum; echo "<br/>";
										// echo $production_comp_sum;echo "<br/>";
										// echo "--------------------------------";
	                          		if($admin_comp_sum != 100 || $marketing_comp_sum != 100 || $production_comp_sum != 100){

			                          	?>
			                            
			                            <li>
			                              <div class='task'>
			                                <span class='pull-left'>
			                                  <a href='<?php echo base_url()."products/edit/".$product['id'];?>'><?php echo $product['product_name']; ?></a>
			                                </span>
			                                <small class='pull-right'><?php echo array_sum(array($admin_comp_prod_sum,$marketing_comp_prod_sum,$production_comp_prod_sum)); ?>%</small>
			                              </div>
			                              <div class='progress'>
			                                <div class='progress-bar progress-bar-success' style='width: <?php echo $admin_comp_prod_sum; ?>%'>Admin (<?php echo $admin_comp_sum.'%'; ?>)</div>
			                                <div class='progress-bar progress-bar-warning' style='width: <?php echo $marketing_comp_prod_sum; ?>%'>Marketing (<?php echo $marketing_comp_sum.'%'; ?>)</div>
			                                <div class='progress-bar progress-bar-danger' style='width: <?php echo $production_comp_prod_sum; ?>%'>Production (<?php echo $production_comp_sum.'%'; ?>)</div>
			                              </div>
			                            </li>

			                        <?php } } } ?>
	                          </ul>
                        	</div>
                        </div>
                      </div>                    
				</div>
		    </div>
		    <div class="col-xs-6">
		
				<div class="box">
					<div class='box bordered-box orange-border' style='margin-bottom:0;'>
					    <div class='box-header orange-background'>
						<div class='title'>News</div>
						<div class='actions'>
						    <!--<a href="<?php //echo site_url('news/add') ?>" class="btn btn-primary pull-right">Add News</a>  -->   
						    <a class="btn box-collapse btn-xs btn-link" href="#">
						    </a>
						</div>           
					    </div>
					</div>
					<div class='box-content'>

					    <div class='row'>
							<div class='col-sm-12'>
							    <div class='box'>
									<div class='row'>
									    <div class='chat'>
											<div class='col-sm-12'>
											    <div class='box'>
												<div class='box-content box-no-padding'>
												    <div class='scrollable' data-scrollable-height='600' data-scrollable-start='bottom'>
													<ul class='list-unstyled list-hover list-striped commnet-list'>
													    <?php foreach ($news_list as $u_key) { ?>
						    							    <li class='message'>
						    								<div class='avatar'>
						    								    <img alt='Avatar'  src='<?php
															if (!empty($u_key['name'])) {
															    echo site_url('uploads/' . $u_key['name']);
															} else {
															    echo site_url('uploads/no_image_available.jpg');
															}
															?>' >
						    								</div>
						    								<div class='name-and-time'>
						    								    <div class='name pull-left'>
						    									<small>
						    									    <a class="text-contrast" href="javascript:void(0);"><h4><?php echo $u_key['title']; ?></h4></a>
						    									</small>
						    									<small><em>
																    <?php
																    echo $u_key['time_ago'];
																    ?> 
						    									    </em>
						    									</small>
						    								    </div>

						    								</div>
						    								<div class='body'>
															<?php echo $u_key['description']; ?> 
						    								</div>
						    								<div class="clearfix"></div>
						    								<div class="commnet-wrapper item-b">
															<?php
															if (!empty($u_key['id'])) {
															    $CI = & get_instance();
															    $CI->load->model('news_model');
															    $result = $CI->news_model->get_comments($u_key['id']);
															    foreach ($result as $key => $val) {
																$result[$key]['time_ago'] = time_elapsed_string(strtotime($val['created_date']));
															    }
															    foreach ($result as $key) {
																?>

							    								    <!-- comment start -->

							    								    <div class='message' style=''>
							    									<div class=''>
							    									    <div class=''>
							    										<small>
							    										    <a class="text-contrast" href="javascript:void(0);"><h4><?php echo $key['username']; ?></h4></a>
							    										</small>
							    										<small>
							    										    <em>
																		    <?php
																		    echo $key['time_ago'];
																		    ?> 
							    										    </em>
							    										</small>
							    									    </div>
							    									</div>
							    									<div class=''>
																	<?php echo $key['comment']; ?> 
							    									</div>		
							    								    </div>

							    								    <!-- comment section ends -->

																<?php
															    }
															}
															?>
						    								    <span id="append_comment_<?php echo $u_key['id']; ?>">
						    								    </span>
						    								</div>

						    								<form>
						    								    <div class='form-group'>
						    									<input class='form-control' id="comment_<?php echo $u_key['id']; ?>" placeholder='Comment' type='text' name="comment_<?php echo $u_key['id']; ?>">
						    									<input type="hidden" name="news_id" id="news_id" value="<?php echo $u_key['id']; ?>">
						    									<button class='btn btn-success save_post' type='button' data-id="<?php echo $u_key['id']; ?>"  id="upload_comment_<?php echo $u_key['id']; ?>">
						    									    <i class='icon-save'></i>
						    									    Post
						    									</button>
						    								    </div>
						    								</form>	
														<?php } ?>	
													    </li>	

													</ul>
												    </div>
												</div>
											    </div>
											</div>
									    </div>
									</div>
							    </div>
							</div>
					   </div>
					</div>
			    </div>
			</div>
		</div>	

	</div>
</div>
<script type="text/javascript">

    $(document).on("click", ".save_post", function() {
		var id = $(this).attr('data-id');
		var comment = $("#comment_" + id).val();
		if (comment == '') {
			return false;
		}
		$.ajax({
			url: '<?php echo site_url('comment/add'); ?>',
			type: 'post',
			dataType: 'json',
			data: {news_id: id, news_comment: comment},
			success: function(response) {
			if (response.status == 'success') {

				$("#comment_" + id).val('');
				$("#append_comment_" + id).before('<div class=message><div ><div class=><small><a class=text-contrast href=javascript:void(0);><h4>' + response.username + '</h4></a></small><small><em>Just Now</em></small></div></div><div class="">' + response.comment + '</div></div>');
			}
			}
		});
    });
</script>
