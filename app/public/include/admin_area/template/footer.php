		</div> <!-- end of container content -->
		<div style="margin-bottom:43px">
				<!-- *****************  Footer links  ****************** -->
		<footer id="footer">
			<nav class="navbar-footer footerFixed" role="navigation" id="links">
				<div class="container">
					<div class="footLinks">
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<li><a title="Contact Us" href="../bottompages/Contact.php"><i class="fa fa-phone"></i> Contact us</a></li>
								<li><a title=" Betop Corporation around" href="../bottompages/aroundus.php"><i class="fa fa-flag"></i> Around Us</a></li>
								<li><a title="Privacy" href="../bottompages/privacy.php"><i class="fa fa-lock"></i> Privacy</a></li>
								<li><a title="Copyright" href="../bottompages/copyright.php">© Copyright</a></li>
								<li><a title="Terms of website use disclaimer" href="../bottompages/termsofuse.php"><i class="fa fa-file-text"></i> Terms &amp; Conditions</a></li>
								<li><a title="Sci-Fi" href="../bottompages/sci-fi.php"><i class="fa fa-keyboard-o"></i> Sci-fi Actus Actual</a></li>
								<!--<li><a title="Freedom of Information" href="freedomofinformation.php"><i class="fa fa-info"></i> FOI</a></li>-->
								<li><a title="Site Map" href="../bottompages/site-map.php"><i class="fa fa-sitemap"></i> Sitemap</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>	
		</footer><!-- END footer -->

		<?php if($debug == 1) { include('widgets/debug.php'); } ?>
		
		<?php include('config/js.php'); ?>
</body>

</html>

<?php //ob_clean();