<?php
	defined('_SECURE_') or die('Trying to access secured file, SORRY');
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
	<title><?php echo $page->_data->title.' | '. $site_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="HandheldFriendly" content="True" >
	<meta name="description" content="Betop is a research and consulting company providing Software and Analysis Engineering innovative solutions in many industries around the globe. We believe that the world is a better place thanks to scientists hard work and curiosity.">
	<meta name="google-site-verification" content="y8mShRL7DXUv3KrWyJkOAYacMWGGs5uWY-1XNJQfCpA" />
	<meta name="keywords" content="Business, Intelligence, Mobile, Software, Design, ISystem, Cybersecurity">
	<link rel="shortcut icon" href="<?php echo Config::get('uri_parts/base');?>/images/fevicone.png" type="x-icon" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo Config::get('uri_parts/base');?>/images/fevicone.png" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<?php include('assets/css.php'); ?>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>	
<body>
	<div id="wrap">	<!-- Wrap page begin-->
		<div class="container-fluid headerFixed" role="banner"><!-- Header start -->
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-9"><!--bt logo start-->
						<a href="home" title="BetopCorporation"><img class="bt-Logo" alt="BETOP" src="<?php echo Config::get('uri_parts/base');?>/images/logo.png"></a>
					</div><!--/bt logo End-->
					<div class="hidden-xs col-sm-5 col-md-3"><!--Social buttons-->
						<div class="soc-med">
							<a href="https://www.facebook.com/betopcorporation/" target="_blank" class="fa fa-facebook fa-2x soc-med-but"></a>
							<a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin fa-2x soc-med-but"></a>
							<a href="https://twitter.com/betopcorp" target="_blank" class="fa fa-twitter fa-2x soc-med-but"></a>
							<a href=" " target="_blank" class="fa fa-rss fa-2x soc-med-but"></a>
							<a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube fa-2x soc-med-but"></a>
						</div>
						<div class="top-links">
							<a class="button" <?php if($user->isLoggedIn()){?> href = "<?php echo Config::get('uri_parts/base');?>/logout" > <span class="fa fa-sign-out top-link-but"></span> User logout <?php } else {?> href = "<?php echo Config::get('uri_parts/base');?>/signin" ><span class="fa fa-sign-in top-link-but"></span> User Sign In<?php }?></a>
							<a href="<?php echo Config::get('uri_parts/base');?>/careers"><span class="fa fa-briefcase top-link-but"></span> Careers</a>
						</div>
					</div><!--/Social buttons-->
				</div><!--/row-->
			</div><!--/container-->
		</div>
		<div class="clearfix"></div><!--/container-fluid-->