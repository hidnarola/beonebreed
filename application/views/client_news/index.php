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
	  <?php  if(!empty($this->session->flashdata('msg'))){ ?>
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
                        
		  </div>
		</div>
		<div class='box-content'>
			
			<!-- media list -->
			<div class="media_list">
				<?php foreach ($news_list as $u_key){ ?>
							<div class="media">
								<div class="media-left media-middle">
										<a href="javascript:void(0);">
												<img src="<?php if(!empty($u_key->name)) { echo site_url('uploads/'.$u_key->name); }else{ echo site_url('uploads/no_image_available.jpg');}?>" />
										</a>
								</div>
								<div class="media-body">
										<h4 class="media-heading"><?php echo $u_key->title; ?> </h4>
										<p>
											<?php echo $u_key->description; ?> 
										</p>
								</div>
								<!--
								<div class="media-right">
									<a class="inline-block remove_item text-error" href='<?php echo site_url('client_news/delete/'.$u_key->id); ?>' onclick="if(!confirm('Are you sure want to delete')){return false;}"><i class="icon-remove-circle"></i></a>
									<a class="inline-block text-warning"><i class="icon-edit"></i></a>
									
								</div> -->
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

 

</script>
 