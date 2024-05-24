<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:4px"></div>
<div class="container content"><!-- Container content begin -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="sectionHeader">
				<img id="aImg" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/header.jpg">
				<h1 id="aCaption"><?php echo $page->_data->header; ?></h1>
				<h3 class="hidden-xs" id="missionTitle"></h3>
				<h4 class="hidden-xs" id="missionStatement"></h4>
					<div class="credit">
					<p id="aCredit">© BETOP</p>
					</div>
			</div>
		</div>
	</div>
	<div class="row">
		<section class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="hidden-xs">
				<nav class="breadcrumb" style="margin-top: 20px;"><ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
				<li class="first"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo $page->_data->parent_data->slug;?>"><span itemprop="title"><?php echo $page->_data->parent_data->header;?></span></a></li><li class="last"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo $page->_data->parent_data->slug;?>/<?php echo $page->_data->slug;?>"><span itemprop="title"><?php echo $page->_data->title;?></span></a></li>
				</ul>
				</nav>
			</div>
			<div class="thumbnail"><img alt="" src="<?php echo Config::get('uri_parts/base');?>/images/web-dev.jpg"></div>
			<div class="caption">
				<h1 class="pageTitle" style="margin-top:20px"><a  href="#"><?php echo $page->_data->header; ?></a></h1>
				
				<?php echo $page->_data->body_formatted; ?>
				
			</div>
			
		</section>
		<?php include'template/asidenews.php';?>
	</div>
</div>
