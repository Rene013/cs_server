		<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
		<!--<div class="clearfix" style="height:4px"></div>-->
		<div class="container content"><!-- Container content begin -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="sectionHeader">
						<img id="aImg" class="img-responsive img-rounded" src="images/<?php echo escape($page->_data->slug);?>-header.jpg">
						<h1 id="aCaption"><?php echo $page->_data->title;?></h1>
						<h3 class="hidden-xs" id="missionTitle"></h3>
						<h4 class="hidden-xs" id="missionStatement"></h4>
						<div class="credit">
							<p id="aCredit"> © BetopCorporation</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav class="breadcrumb" style="margin-top: 10px;margin-bottom: 3px;">
						<ul itemscope itemtype="http://schema.org/Breadcrumb" class="breadcrumb">
							<li class="first">
								<a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/home">
									<span itemprop="title">Home</span>
								</a>
							</li>
							<li class="last">
								<a itemprop="url" href="<?php echo Config::get('uri_parts/base');?>/<?php echo escape($page->_data->slug);?>">
									<span itemprop="title"><?php echo $page->_data->header; ?></span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="row">
				<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<?php echo $page->_data->body_formatted ; ?>
				</section>
					<?php include'template/aside.php';?>
			</div>
		</div><!-- end of container content -->