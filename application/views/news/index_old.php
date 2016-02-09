<div class='row' id='content-wrapper'>
	<div class='col-xs-12'>
	  <div class='row'>
		<div class='col-sm-12'>
		  <div class='page-header'>
			<h1 class='pull-left'>
			  <i class='icon-user'></i>
			  <span>Manage News</span>
			</h1>
			<div class='pull-right'>
			 
			</div>
		  </div>
		</div>
	  </div>
	  <?php  if($this->session->flashdata('msg') != '' ){ ?>
            <div class='alert alert-success alert-dismissable'>
                       <a class="close" data-dismiss="alert" href="#">&times;</a>
           <i class='icon-ok-sign'></i>
            <?php if($this->session->flashdata('msg')):echo $this->session->flashdata('msg');endif; ?>  
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
			
			<!-- media list -->
			<div class="media_list">
				<?php foreach ($news_list as $u_key){ ?>
							<div class="media">
								<div class="media-left media-middle">
										<a href="javascript:void(0);">
												<img src="<?php if(!empty($u_key->name)) { echo site_url('uploads/'.$u_key->name); }else{ echo site_url('uploads/no_image_available.jpg'); } ?>" />
										</a>
										
								</div>
								<div class="media-body">
										<h4 class="media-heading"><?php echo $u_key->title; ?> </h4>
										<p>
											<?php echo $u_key->description; ?> 
										</p>
								<form class="form" style="margin-bottom: 0;" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data" id="comment_frm">		
										<div class='form-group'>
											<input class='form-control' id='inputText' placeholder='Comment' type='text' name='comment' >
											<input type="hidden" name="news_id" id="news_id" value="<?php echo $u_key->id; ?>">
										</div>
										
										<button class='btn btn-success' type='button' id="upload_comment">
											<i class='icon-save'></i>
											Post
										</button>
								</form>		
										
										
								</div>
								
								<div class="media-right">
										<a class="inline-block text-warning" href='<?php echo site_url('news/edit/'.$u_key->id); ?>' ><i class="icon-edit"></i></a>
										<a class="inline-block remove_item text-error" href='<?php echo site_url('news/delete/'.$u_key->id); ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}"><i class="icon-remove-circle"></i></a>
								</div>
								<a href="javascript:void(0);"><h6>Comment</h6></a>
								<ul class='list-unstyled list-hover list-striped' id="comment_list">
                                  
                                 
								  
                                  
                                </ul>
						</div>
			 <?php }?> 
		
				</div>
		</div>
	  </div>
		 </div>
	</div>
  </div>
		
</div>
<script type="text/javascript">

$(document).on("click", "#upload_comment", function() {
        comment();
});
function comment() {

        /*
		$('#file_err_msg').text('');
        var file = $('#file').val();
        if (file == '') {
            $('#file_err_msg').text('please upload some attachment');
            $("#file").focus();
            return false;
        } */
        var data = new FormData($("#comment_frm")[0]);
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('comment/add'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

            }
        });

        return false;
    }
</script>
 