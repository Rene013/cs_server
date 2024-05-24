<?php
$user = new User();

/* if(!$user->isActive()) {
    Redirect::to('includes/errors/55293.php');
} */
?>
<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:10px"></div>
<div class="container content"><!-- Container content begin -->
	<!--about us -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="sectionHeader">
				<img id="aImg" class="img-responsive img-rounded" src="images/betop.jpg">
				<h1 id="aCaption"><?php echo $page->_data->header; ?></h1>
				<h3 class="hidden-xs" id="missionTitle">Build the future</h3>
				<h4 class="hidden-xs" id="missionStatement">Our fate doesn't have to be the end of the world</h4>
				<div class="credit">
					<p id="aCredit">© BetopCorporation</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row"><!--breadcrumb-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<nav class="breadcrumb" style="margin-top: 20px; margin-bottom: 3px;">
				<ul itemscope itemtype="http://scheme.org/Breadcrumb" class="breadcrumb">
					<li class="first"><a itemprop="url" href="?page=home"><span itemprop="title">Home</span></a></li><li class="last"><a itemprop="url" href="?page=<?php echo $page->_data->header; ?>"><span itemprop="title"><?php echo $page->_data->title; ?></span></a></li>
				</ul>
			</nav>
		</div>
	</div><!--breadcrumb-->
	<div class="row">
		<section class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="thumbnail fundingThHeight"><img alt="" src="images/aboutus.jpg">
				<div class="caption">
					<h4 style="margin-top:20px"><a  href="?page=<?php echo $page->_data->label; ?>"><?php echo $page->_data->header; ?></a></h4>
					
					<?php echo $page->_data->body_formatted; ?>
					
					
				</div>
			</div>
		</section>
		<aside class="col-sm-12 col-md-4" style="margin-top: 20px; margin-bottom: 3px;">
			<div class="art-str news-art" id="sysFundingNews">
				<h2>Our News</h2>
				<?php include '<?php echo Config::get('uri_parts/base');?>/newsandarticles/posts/index.php';?>
				<div>
					<dl class="first hasImage" style="min-height:100px;padding-left:100px;">
						<dd class="image">
							<a href="" title="Take care of my bills-TCoMB"><img src="images/B7_small.png" alt="Starting a new project TCoMB"></a>
						</dd>
						<dt class="date releaseDate">
							29 June 2016
						</dt>
						<dt class="title">
							<a href="?page=TCoMB.php">Starting a new project TCoMB</a>
						</dt>
						<dd class="news-summary">
							<p>Betop Corporation is starting a new project of building an app Take care of my bills(TCoMB) that will trigger a higher competion in local businesses</p>
							<p></p>
						</dd>
					</dl>
					<dl class="hasImage" style="min-height:100px;padding-left:100px;">
						<dd class="image">
							<a href="" title="Betop corporation is getting in internet advisement business"><img src="images/B7_small.png" alt="Betop Corporation is getting in business advisement to generate money for reaserch"></a>
						</dd>
						<dt class="date releaseDate">
							17 June 2016
						</dt>
						<dt class="title">
							<a href="">BetopCorporation is getting in digital marketing business</a>
						</dt>
						<dd class="news-summary">
							<p>Betop Corporation has adopted a new to start new projects of developing applications that will do internet advesement.</p>
							<p>This is coming as mean of generating more money for investing in research while contributing to the growth local businesses competitiveness</p>
						</dd>
					</dl>
					<dl class="last hasImage" style="min-height:100px;padding-left:100px;">
						<dd class="image">
							<a href="" title="BetopCorporation has voted a new president of the board"><img src="images/B7_small.png" alt="BetopCorporation president"></a>
						</dd>
						<dt class="date releaseDate">
							25 May 2015
						</dt>
						<dt class="title">
							<a href="">BetopCorporation has voted the new president of the board</a>
						</dt>
							<dd class="news-summary">
							<p>Betop corporation has voted a presidents and new members of the board</p>
						</dd>
					</dl>
				</div>
				<a class="more" href="<?php echo Config::get('uri_parts/base');?>/newsandarticles">Read All News</a>
				<div class="clearfix" style="height:15px"></div>
				
			</div>
		</aside>
	</div>
</div>