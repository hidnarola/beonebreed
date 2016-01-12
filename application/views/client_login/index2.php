<div class='login-container'>
	<div class='container'>
	  <div class='row'>
		<div class='col-sm-4 col-sm-offset-4'>
		  <h1 class='text-center title'>Sign in</h1>
		  <form action='' class='validate-form' method='post' >
			<div class='form-group'>
			  <div class='controls with-icon-over-input'>
				<input value="" placeholder="Username" class="form-control" data-rule-required="true" name="username" type="text" />
				<i class='icon-user text-muted'></i>
			  </div>
			</div>
			<div class='form-group'>
			  <div class='controls with-icon-over-input'>
				<input value="" placeholder="Password" class="form-control" data-rule-required="true" name="password" type="password" />
				<i class='icon-lock text-muted'></i>
			  </div>
			</div>
			<!--
			<div class='checkbox'>
			  <label for='remember_me'>
				<input id='remember_me' name='remember_me' type='checkbox' value='1'>
				Remember me
			  </label>
			</div>-->
			<div class='form-group'>
				<?php if(!empty($msg)){?>
					<span class="help-block has-error" style="color:red"><?php echo $msg; ?><span>
				<?php }?>
			  </label>
			</div>
			<button class='btn btn-block'>Sign in</button>
		  </form>
		  <div class='text-center'>
			<hr class='hr-normal'>
			<a href='forgot_password.html'>Forgot your password?</a>
		  </div>
		</div>
	  </div>
	</div>
	</div>