
<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
	<div class='row'>
	    <div class='col-sm-12'>
		<div class='page-header'>
		    <h1 class='pull-left'>
			<i class='icon-trello'></i>
			<span>Manage News</span>
		    </h1>
		    <div class='pull-right'>

		    </div>
		</div>
	    </div>
	</div>
	<?php if ($this->session->flashdata('msg') != '') { ?>
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
	    <div class="box">
		<div class='box bordered-box orange-border' style='margin-bottom:0;'>
		    <div class='box-header orange-background'>
			<div class='title'>News</div>
			<div class='actions'>
			    <a href="<?php echo site_url('news/add') ?>" class="btn btn-primary pull-right">Add News</a>     
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
							<ul class='list-unstyled list-hover list-striped'>
							    <?php foreach ($news_list as $u_key) { ?>
    							    <li class='message'>
    								<div class='avatar'>
    								    <img alt='Avatar' height='23' src='<?php
									if (!empty($u_key['name'])) {
									    echo site_url('uploads/' . $u_key['name']);
									} else {
									    echo site_url('uploads/no_image_available.jpg');
									}
									?>' width='23'>
    								</div>
    								<div class='name-and-time'>
    								    <div class='name pull-left'>
    									<small>
    									    <a class="text-contrast" href="javascript:void(0);"><h4><?php echo $u_key['title']; ?></h4></a>
    									</small>
    									<small>
										<?php
										echo $u_key['time_ago'];
										?> 
    									</small>
    								    </div>

    								    <div class='time pull-right'>
    									<small class='date pull-right text-muted'>									
    									    <a class="inline-block text-warning" href='<?php echo site_url('news/edit/' . $u_key['id']); ?>' ><i class="icon-edit"></i></a>
    									    <a class="inline-block remove_item text-error" href='<?php echo site_url('news/delete/' . $u_key['id']); ?>' onclick="if (!confirm('Are you sure want to delete')) {
    											return false;
    										    }"><i class="icon-remove-circle"></i></a>
    									</small>
    								    </div>
    								</div>
    								<div class='body'>
									<?php echo $u_key['description']; ?> 
    								</div>
    							    </li>	
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
	    							    <li class='message' style='margin-left:5%'>
	    								<div class='name-and-time'>
	    								    <div class='name pull-left'>
	    									<small>
	    									    <a class="text-contrast" href="javascript:void(0);"><h4><?php echo $key['username']; ?></h4></a>
	    									</small>
	    									<small>
											<?php
											echo $key['time_ago'];
											?> 
	    									</small>
	    								    </div>
	    								</div>
	    								<div class='body'>
	    <?php echo $key['comment']; ?> 
	    								</div>		
	    							    </li>

	    							    <!-- comment section ends -->

								    <?php
								    }
								}
								?>
    							    <span id="append_comment_<?php echo $u_key['id']; ?>">
    							    </span>
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
<script type="text/javascript">

$(document).on("click", ".save_post", function() {
    var id = $(this).attr('data-id');
    var comment = $("#comment_" + id).val();
    if(comment==''){
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
		$("#append_comment_" + id).before('<li class=message style=margin-left:5%><div class=name-and-time><div class=name pull-left><small><a class=text-contrast href=javascript:void(0);><h4>' + response.username + '</h4></a></small><small>Just Now</small></div></div><div class="body">' + response.comment + '</div></li>');
	    }
	}
    });
});



</script>
