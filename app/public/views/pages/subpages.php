<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:3px"></div>
<div class="container content"><!-- Container content begin -->
     <div class="row">
	<div class="col-md 12">
	    <div class="sectionHeader">
		<img id="aImg" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/betop.jpg">
		<h3 class="hidden-xs" id="missionTitle"></h3>
		<h4 class="hidden-xs" id="missionStatement"></h4>
		    <div class="credit">
		    <p id="acreadit">  Betopcorporation</p>
		    </div>
		</div>
	    </div>
	</div>
    <div class="row">
	<section class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	    <div class="hidden-xs">
		<nav class="breadcrumb" style="margin-top: 10px; margin-bottom: 3px;">
		    <ul itemscope itemtype="https://schema,org/Breadcrumb" class="breadcrumb">
			<li class="first"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo $page->_data->parent_data->slug;?>"><span itemprop="title"><?php echo $page->_data->parent_data->title;?></span></a></li><li class="last"><a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo $page->_data->parent_data->slug;?>/<?php echo $page->_data->slug;?><span itemprop="title"><?php echo $page->_data->header;?></span></a></li>
		    </ul>
		</nav>
	    </div>
	    <h2 class="pageTitle"><?php echo $page->_data->title;?></h2>
	    <?php echo $page->_data->body_formatted; ?>
	</section>
	<?php include 'template/asidenews.php';?>
    </div>
</div>
