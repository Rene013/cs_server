<?php	
defined('_SECURE_') or die('Trying to access secured file, SORRY');
ob_start();
include 'template/header.php';

if ($user->isLoggedIn()) {
	Redirect::to('index.php');
}
?>
	<div class="clearfix" style="height:10px"></div>
	<div class="container content"><!-- Container content begin -->
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<?php
					if(Input::exists()) {
						if(Token::check(Input::get('token'))) {

							$validate = new Validate();
							$validation = $validate->check($_POST, array(
								'username' => array('required' => true),
								'password' => array('required' => true)
							));

							if($validation->passed()) {
								$user = new User();

								$remember = (Input::get('remember') === 'on') ? true : false;
								$login = $user->login(Input::get('username'), Input::get('password'), $remember);

								if($login) {
									Redirect::to('home');
								} else {
									echo '<p class="alert alert-danger">Incorrect username or password</p>';
								}
							} else {
								foreach($validation->errors() as $error) {
									echo '<p class="alert alert-danger">'.$error.'<br></p>';
								}
							}
						}
					}
				?>
			</div>

		</div>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class = "panel panel-primary" role="dialog">
					<div class = "panel-heading">
					<h4 class="text-center">User Login</h4>
					</div>
						<!--<div class="text-center">
						Login via
						</div>
						<div class="social-buttons">
							<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
							<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
						</div>
						<div class="text-center">
						or
						</div>-->
					<div class="panel-body">
						<form class="form" role="form" action="" method="post" accept-charset="UTF-8" id="">
							<div class="field form-group">
								<label for='username'>Username</label>
								<input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
							</div>

							<div class="field form-group">
								<label for='password'>Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
								<div class="help-block text-center">Forgot your <a href="recover.php?mode=username" class="button">Username</a> or <a href="recover.php?mode=password" class="button">Password </a>?</div>
							</div>

							<div class="field form-group">
								<label for="remember">
									<input type="checkbox" name="remember" id="remember">Remember me
								</label>
							</div>

							<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
							<button type="submit" class="btn btn-primary btn-block" value="Login">Sign in</button>
						</form>
					</div>
				</div>
				<div>
					<p class="text-center">Remember to Logout</p>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

<?php include'template/footer.php';?>