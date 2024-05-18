<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:4px"></div>
<div class="container content"><!-- Container content begin -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="sectionHeader">
			<img id="aImg" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/betop.jpg">
			<h1 id="aCaption">Current Opening</h1>
			<h3 class="hidden-xs" id="missionTitle"></h3>
			<h4 class="hidden-xs" id="missionStatement"></h4>
				<div class="credit">
				<p id="aCredit">© CERN</p>
				</div>
		</div>
	</div>
</div>
<div class="row">
	<section class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<div class="hidden-xs">
			<nav class="breadcrumb" style="margin-top: 20px;"><ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
			<li class="first"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/careers"><span itemprop="title">Careers</span></a></li><li class="last"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/careers/currentopening"><span itemprop="title">Current Opening</span></a></li><li class="last"><a itemprop="url" href="#"><span itemprop="title"><?php echo $page->_data->title; ?></span></a></li>
			</ul>
			</nav>
		</div>
		<h5 class="pageTitle"><a href="<?php echo Config::get('uri_parts/base');?>/careers/currentopening">Current Opening</a></h5>
		<p>
		<?php echo $page->_data->body_formatted;?>
		</p>
	</section>
	<?php include'template/asidenews.php';?>
</div>