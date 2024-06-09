
<?php defined('_SECURE_') or die('Trying to access secured file, SORRY');?>
<div class = "panel panel-primary" role="dialog">
	<div class = "panel-heading">
	<h4 class="text-center">Forgot your Password</h4>
	</div>
	<div class="panel-body">
		<div class="formSection twitter-typeahead">
			<form class = "form" action="<?php echo Config::get('uri_parts/base');?>/recover.php?mode=password" method="post" accept-charset="UTF-8">
				<div class = "form-inline">
					<div><p>We'll send you an email with a link to reset your password</p></div>
					<div class= "field form-group">
						<label>Enter your email address:</label>
						<input class="form-control" type="email" name="email" placeholder="Enter Email">
						<span class="help-block small"><?php // if(!empty($error_recover)){echo print_r($error_recover);} ?></span>
					</div>
					<br>
					<br>
					<div class= "field form-group">
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