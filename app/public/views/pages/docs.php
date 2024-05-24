<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="container content"><!-- Container content begin -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="sectionHeader">
				<img id="aImg" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/betop.jpg">
				
				<h3 class="hidden-xs" id="missionTitle"></h3>
				<h4 class="hidden-xs" id="missionStatement"></h4>
					<div class="credit">
					<p id="aCredit">© Betop Corporation</p>
					</div>
			</div>
		</div>
	</div>
	<div class="row">
		<section class="col-md-12">
			<div class="hidden-xs">
				<nav class="breadcrumb" style="margin-top: 20px; margin-bottom: 3px;"><ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
				<li class="first"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo $page->_data->parent_data->slug;?>"><span itemprop="title"><?php echo $page->_data->parent_data->title;?></span></a></li><li class="last"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo $page->_data->parent_data->slug;?>/<?php echo $page->_data->slug;?>"><span itemprop="title"><?php echo $page->_data->header; ?></span></a></li>
				</ul>
				</nav>
			</div>
			<h2 class="pageTitle"><?php echo $page->_data->title; ?></h2>
			<iframe width="100%" height="100%" scrolling="no" style="height:100%; overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"
			src="<?php echo Config::get("uri_parts/base") . $page->_data->body;?>">
			</iframe>
		</section>
	</div>
</div>