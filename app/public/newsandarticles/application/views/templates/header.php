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
		<title>Betop Corporation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="HandheldFriendly" content="True" >
		<meta name="description" content="The world is a better place thanks to scientists curiosity and hard work">
		<meta name="google-site-verification" content="" />
		<meta name="keywords" content="Business, Intelligence, Mobile, Software, Design, ISystem, Cybersecurity">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ino.png" type="image/x-icon" />
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/ino.png" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
		<meta name="apple-mobile-web-app-capable" content="yes">
		
		
		
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container-fluid headerFixed" role="banner"><!-- Header start -->
			<div class = "container">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-9"><!--bt logo start-->
						<a href="/home" title="BetoprCorporation"><img class="bt-Logo" alt="BT Logo" src="<?php echo base_url(); ?>assets/images/logo.png"></a>
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
							<!--<a class="button" <?php //if($user->isLoggedIn()){?> href = "<?php// echo base_url(); ?>/logout.php" > <span class="fa fa-user"></span> User logout <?php// } else {?> href = "<?php// echo base_url(); ?>login.php" ><span class="fa fa-user"></span>User login<?php// }?></a>-->
							<a href="http://www.betopcorporation.com/careers"><span class="fa fa-briefcase"></span> Careers</a>
						</div>
					</div><!--/Social buttons-->
				</div><!--/row-->
			</div><!--/container-->
		</div>
		<div data-offset-top="100" data-spy="affix" class="affix-top">
			<nav class="navbar navbar-default" role="navigation">
				<div class ="container">
					<div class="navbar-header">
						<button type="button" class= "navbar-toggle" data-toggle = "collapse" data-target = "#primary-navbar" ><!--data-parent=".bt-header"-->
							<span class = "icon-bar"></span>
							<span class = "icon-bar"></span>
							<span class = "icon-bar"></span>
						</button>
	
					</div>			
					<div class="collapse navbar-collapse" id="primary-navbar"><!--Navigation Head start-->	
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-9">
								<ul id="navPrimary" class="main-nav">
									<li><a href="/home">Home</a></li>
									<li><a href="<?php echo base_url(); ?>">About</a></li>
									<li><a href="<?php echo base_url(); ?>">News and articles</a></li>
									<li><a href="<?php echo base_url(); ?>">Categories</a></li>
									<li><a href="/contact">Contact Us</a></li>
								</ul>
								<ul id="navPrimary" class="main-nav navbar-right">
									<?php if(!$this->session->userdata('logged_in')){ ?>
									<li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
									<li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
									<?php }?>
									<?php if($this->session->userdata('logged_in')) { ?>
									<li><a href="<?php echo base_url(); ?>posts/create">Create Post</a></li>
									<li><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
									<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
									<?php } ?>
								</ul>
							</div>
							<div class="col-xs-12 col-sm- 12 col-md-3 col-lg-3">
								<form role="search" class="header-search navbar-form navbar-right" id="headerSearchForm" action="http://www.betopcorporation.com/search.php" method="get">
									<div class="input-group">
										<input type="text" name="query" id="searchKeywordsHeader" placeholder="search" value="" class="form-control searchKeywords" action="include/js_suggest/suggest.php" columns="2" autocomplete="off" delay="1500">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-default btn-header-search" value="Search">
												<i class="fa fa-search"></i>
											</button>
										</span>
										<input type="hidden" name="search" id="siteidHeader" value="1">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div><!-- end .container --> 
			</nav>
		</div>
		
		<div class="container">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>