<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix"></div>
<div class="container content"><!-- Container content begin -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="sectionHeader">
				<img id="aImg" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/betop.jpg">
				<h1 id="aCaption">Contact Us</h1>
				<!--<h3 class="hidden-xs" id="missionTitle">Our mission:</h3>
				<h4 class="hidden-xs" id="missionStatement">'Put effort to contribute to the growth of scientific knowledge'</h4>
				-->
				<div class="credit">
					<p id="aCredit">© BetopCorporation</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<section class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="hidden-xs">
				<nav class="breadcrumb" style="margin-top: 20px;"><ul itemscope="" itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
					<li class="first"><a itemprop="url" href="home"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/aboutus"><span itemprop="title">About Us</span></a></li><li class="last"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/contact"><span itemprop="title">Contact Us</span></a></li>
					</ul>
				</nav>
			</div>
			<h4 class="pageTitle"><?php echo $page->_data->header; ?></h4>
			<?php echo $page->_data->body_formatted; ?>
		</section>
		<?php include'template/asidenews.php';?>
	</div>
</div><!-- end of container content -->