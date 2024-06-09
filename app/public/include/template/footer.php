	<footer id="footer">
		<div id="gradientbg" class="container footerMargin"><!--Footer container-fluid-->
			<div class="row" style="margin-bottom: 0px;"><!--Switchboard-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="blockquote" style="display: block; margin: 5px auto; text-align: center; font-size:9px; bottom:45px;">
						<p class="light"><strong> Test ideas by experiment and observation, build on those ideas that passe the test, reject those that fail, follow the evidence wherever it leads and Question everything.</strong> By <span class="blockquote-footer">Niel DeGlass Tyson in <cite title="Source Title">Cosmos a Spacetime Odyssey</cite></p>
						
					</div>
				</div>
			</div><!--/Switchboard-->
			<div class="row"><!--Social buttons-->
				<div class="col-xs-12 hidden-sm hidden-md hidden-lg">
					<div class="footScl">
						<a href="https://www.facebook.com" target="_blank" class="fa fa-facebook fa-3x smBut"></a>
						<a href="https://www.linkedin.com" target="_blank" class="fa fa-linkedin fa-3x smBut"></a>
						<a href="https://twitter.com/betopcorp" target="_blank" class="fa fa-twitter fa-3x smBut"></a>
						<a href="#" target="_blank" class="fa fa-rss fa-3x smBut"></a>
						<a href="https://www.youtube.com" target="_blank" class="fa fa-youtube fa-3x smBut"></a>
					</div>
				</div>
			</div><!--/Social buttons-->
		</div>
		<!--Footer container-fluid ends-->
		<!--Footer links-->
		<nav class="navbar-footer footerFixed" role="navigation" id="links">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--<div class="hidden-md hidden-lg">
						<a class="navbar-brand" data-toggle="collapse" data-target="#footer-navbar">Menu</a>
					</div>-->
				</div>
				<div class="footLinks">
					<div class="collapse navbar-collapse" id="footer-navbar">
						<ul class="nav navbar-nav dropup">
							<li><a title="Contact Us" href="<?php echo Config::get('uri_parts/base');?>/contact"><i class="fa fa-phone"></i> Contact us</a></li>
							<li><a title=" Betop Corporation around" href="<?php echo Config::get('uri_parts/base');?>/aboutus/aroundus"><i class="fa fa-flag"></i> Around Us</a></li>
							<li><a title="Privacy" href="<?php echo Config::get('uri_parts/base');?>/aboutus/privacy"><i class="fa fa-lock"></i> Privacy</a></li>
							<li><a title="Copyright" href="<?php echo Config::get('uri_parts/base');?>/aboutus/copyright">© Copyright</a></li>
							<li><a title="Terms of website use disclaimer" href="<?php echo Config::get('uri_parts/base');?>/aboutus/termsofuse"><i class="fa fa-file-text"></i> Terms &amp; Conditions</a></li>
							<li><a title="Sci-Fi" href="<?php echo Config::get('uri_parts/base');?>/aboutus/sci-fi"><i class="fa fa-keyboard-o"></i> Sci-fi Actus Actual</a></li>
							<!--<li><a title="Freedom of Information" href="freedomofinformation.php"><i class="fa fa-info"></i> FOI</a></li>-->
							<li><a title="Site Map" href="<?php echo Config::get('uri_parts/base');?>/aboutus/sitemap.xml"><i class="fa fa-sitemap"></i> Sitemap</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</footer><!-- END footer -->
	</div><!-- END wrap -->	
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5772c2a666253ee2"></script>-->
	<?php include('assets/js.php'); ?>
	</body>

</html>