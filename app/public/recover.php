<?php ob_start();
 require_once'config/init.php';
 include'template/header.php';
?>
<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:10px"></div>
<div class="container"><!-- Container content begin -->
					
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="sectionHeader">
			<img id="aImg" class="img-responsive img-rounded" src="images/betop.jpg">
			
			<h3 class="hidden-xs" id="missionTitle"></h3>
			<h4 class="hidden-xs" id="missionStatement"></h4>
				<div class="credit">
				<p id="aCredit">© Betop Corporation</p>
				</div>
		</div>
	</div>
</div>
<div class="row">
	<section class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<div class="hidden-xs">
			<nav class="breadcrumb" style="margin-top: 20px;"><ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
			<li class="first"><a itemprop="url" href="index.php"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="profile.php"><span itemprop="title">Profiles</span></a></li><li class="last"><a itemprop="url" href="recover"><span itemprop="title">Recover</span></a></li>
			</ul>
			</nav>
		</div>
		<h1 class="pageTitle">Recover</h1>
<?php

if ($user->isLoggedIn()) {
    Redirect::to('index.php');
}

if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
    <p>We've sent you an email. Please check your mail box for instructions. </p>
<?php
} else {
    $mode_allowed = array('username', 'password');
	$mode = escape($_GET['mode']);
    if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
		switch ($mode){
			case "username":
				include 'recovermdu.php';
				break;
			case "password":
				include 'recovermdp.php';
				break;
		}		
        if (isset($_POST['email']) === true && empty($_POST['email']) === false) {           
			$email = escape(Input::get('email'));
			if ($user->emailExists($email) === true) {	
				if($mode =='username'){
					email($email, 'Your username', "Hello " . $user->data()->firstname. ",\n\nYour username is :	" . $user->data()->username. "\n\n-BeTop C. Webmaster");
					Redirect::to('recover.php?success');
					} else if ($mode == 'password') {
						$generated_password = substr(md5(rand(999,999999)), 0, 10);// recover password
						//die($generated_password .'<br>'. $user->data()->id);
						$salt = Hash::salt(32);
						//$id = $user->data()->id;
						$user->update(array(
							'password' => Hash::make($generated_password, $salt),
							'salt' => $salt,
							'password_recover'=> 1
						),$user->data()->id);
						email($email, 'Your password', "Hello " . $user->data()->firstname . ",\n\nYour new password is:" . $generated_password . "\n\n Please login and update your password.\n\n-BTC Webmaster");//recover username
						Redirect::to('recover.php?success');
					}						
			} else {
				echo 'Your email does not exist in our database !'; 
			}
		}
    } else {
        Redirect::to('index.php');
    }
}
?>
</section>
	<?php include'template/asidenews.php';?>
</div>
<?php include'template/footer.php';?>