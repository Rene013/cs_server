<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
ob_start();	
if ($user->isLoggedIn()) {
	Redirect::to('index.php');
}
?>
<div class="container content"><!-- Container content begin -->
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class = "panel-heading" style="margin:1px -15px">	
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
			<div class="row"><!--breadcrumb-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav class="breadcrumb">
						<ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
							<li class="first">
								<a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home">
									<span itemprop="title">Home</span>
								</a>
							</li>
							<li class="last">
								<a itemprop="url" href="<?php echo Config::get('uri_parts/base');?><?php echo $page->_data->parent_data->slug;?>/<?php echo $page->_data->slug;?>">
									<span itemprop="title"><?php echo $page->_data->header; ?></span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div><!--breadcrumb-->
				<div class = "panel panel-primary" role="dialog">
					<div class = "panel-heading">
					<h4 class="text-center">Account</h4>
					</div>
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
					<div class="panel-footer">
						<div class="bottom text-center">
							New here ? <a href="<?php echo Config::get('uri_parts/base');?>/new-user"><b>Join Us</b></a>
						</div>
					</div>
				</div>
				<div>
					<p class="text-center">Remember to Logout</p>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
