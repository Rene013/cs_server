<?php defined('_SECURE_') or die('Trying to access secured file, SORRY');?>
<div class = "panel panel-primary" role="dialog">
	<div class = "panel-heading">
	<h4 class="text-center">Forgot your Username</h4>
	</div>
	<div class="panel-body">
		<div class="formSection twitter-typeahead">
			<form class = "form" action="<?php echo Config::get('uri_parts/base');?>/recover.php?mode=username" method="post" role="form" accept-charset="UTF-8">
				<div class = "form-inline">
					<div><p>We'll send you an email with your Username</p></div>
					<div class= "field form-group">
						<label>Email address:</label>
						<input class="form-control" type="email" name="email" placeholder="Enter Email">
					</div>
					<br>
					<br>
					<div class= "form-group">
						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
						<button type="submit" class="btn btn-primary" value="Recover">Recover</button>
					</div>
					<br>
					<br>
				</div>
			</form>
		</div>
	</div>
	<div class="panel-footer">
		<div class="bottom text-center">
			New here ? <a href="register.php"><b>Join Us</b></a>
		</div>
	</div>
</div>
		