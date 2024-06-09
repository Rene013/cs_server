<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2><? $title ?></h2>
	</div>
</div>
<?php echo '<pre>';

echo (validation_errors());

 echo '</pre>'; ?>

<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Firstname</label>
				<input type="text" class="form-control" name="first_name" placeholder="Firstname">
			</div>
			<div class="form-group">
				<label>Lastname</label>
				<input type="text" class="form-control" name="last_name" placeholder="Lastname">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="passwd" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="passwd2" placeholder="Confirm Password">
			</div>
			<input type="hidden" name="auth_level" value = 1 >
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>

