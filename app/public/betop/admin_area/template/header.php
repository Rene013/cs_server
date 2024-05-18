<?php
	require_once '../config/init.php';
	require_once 'config/init_admin.php';
	
	if(!$user->hasPermission('admin')&& !$user->isLoggedIn()) {
		Redirect::to('home');
	}
	$view = new Page();
?>

<!DOCTYPE html>
<html>
	
<head>
	<style id="antiClickjack">body{display:none !important;}</style>
	<script type="text/javascript">
		if (self === top) {
			   var antiClickjack = document.getElementById("antiClickjack");
			   antiClickjack.parentNode.removeChild(antiClickjack);
		   } else {
			   top.location = self.location;
		   }
	</script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo ucfirst($page).' | '. $site_title; ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="HandheldFriendly" content="True" >
	<meta name="description" content="Bewitched by Curiosity">
	<meta name="google-site-verification" content="" />
	<meta name="keywords" content="Betop Corporation, IT, System design, System Engineering, Engineering design, Cybersecurity, Electronics, Webdesign, Mobile Design, software Engineering, Innovation, Banking Systems, New graduate opportunities, Internship">
	<link rel="shortcut icon" href="../images/ino.png" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" href="../images/ino.png" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<?php include('config/css.php'); ?>
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- jQuery UI -->
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


</head>
	
<body>
		<div class="container-fluid headerFixed" role="banner"><!-- Header start -->
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><!--bt logo start-->
						<a href="<?php echo Config::get('uri_parts/base');?>/home" title="<?php echo $site_title; ?>"><img class="bt-Logo" alt="BT Logo" src="../images/logo.png"></a>
					</div><!--/bt logo End-->
					<div class="hidden-xs col-sm-5 col-md-4 col-lg-3"><!--Social buttons-->
						<div class="sclMda">
							<a href="https://www.facebook.com/betopcorporation/" target="_blank" class="fa fa-facebook fa-2x smBut"></a>
							<a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin fa-2x smBut"></a>
							<a href="https://twitter.com/betopcorp" target="_blank" class="fa fa-twitter fa-2x smBut"></a>
							<a href=" " target="_blank" class="fa fa-rss fa-2x smBut"></a>
							<a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube fa-2x smBut"></a>
						</div>
						<div class="clearfix"></div>
						<div class="tpLks">
							<a class="button" <?php if($user->isLoggedIn()){?> href = "<?php echo Config::get('uri_parts/base');?>/logout" > <span class="fa fa-user"></span> User logout <?php } else {?> href = "<?php echo Config::get('uri_parts/base');?>/login" ><span class="fa fa-user"></span>User login<?php }?></a>
							<a href="../careers"><span class="fa fa-briefcase"></span> Careers</a>
						</div>
					</div><!--/Social buttons-->
				</div><!--/row-->
			</div><!--/container-->
		</div><!--/container-fluid-->
		<div data-offset-top="100" data-spy="affix" class="affix-top">	
		
		<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
		
		</div>
		<div class="clearfix" style="height:10px"></div>
		<div class="container content"><!-- Container content begin -->
		