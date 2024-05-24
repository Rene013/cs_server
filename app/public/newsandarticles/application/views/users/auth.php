<div class = "container">
	<div class="row login-wrapper">
		<div class="col-md-4 col-md-offset-4">
			<div class = "panel panel-default">
				<div class = "panel-heading">
				<h4 class="text-center">User Login</h4>
				</div>
				<div class = "panel-body">
					<?php $error = $this->session->flashdata('error');?>
					<div class = "alert alert info alert-<?php echo $error ? 'warning' : 'info' ?>dismissible" role="">
					<button type="button" class="close" data-dismiss="alert alert-success"></button>
					<?php echo $error ? $error : 'Enter Username and Password'?>
					<!--<h4 class="text-center">Enter your Username and Password</h4>-->
					</div>
					<?php echo form_open('users/login', ['class' => 'std-form']); ?>
						<?php $error = form_error('username', '<p class = "text-danger">','</p>');?>
						<div class="form-group <?php echo $error ? 'has-error' : '' ?>">
							<label for "username">Username</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class ="glyphicon glyphicon-user"></i>
								</span>
								<input type="text" name="login_string" class="form-control" placeholder="Enter Username" required autofocus>
							</div>
							<?php echo $error; ?>
						</div>
						<?php $error = form_error('password', '<p class = "text-danger">','</p>');?>
						<div class="form-group <?php echo $error ? 'has-error' : '' ?>">
							<label for "password">Password</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class ="glyphicon glyphicon-lock"></i>
								</span>
								<input type="password" name="login_pass" class="form-control" placeholder="Enter Password" required autofocus>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
					
<?php //echo form_close(); ?>