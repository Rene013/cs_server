<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
include'core/init.php';
//protect_page();
include'includes/overall/header.php';
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="sectionHeader">
			<img id="aImg" class="img-responsive img-rounded" src="images/landing/Research.jpg">
			<h1 id="aCaption">Data mining and Machine Learning</h1>
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
			<li class="first"><a itemprop="url" href="index.php"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="services.php"><span itemprop="title">Services</span></a></li><li class="last"><a itemprop="url" href="datamining.php"><span itemprop="title">Data mining and Machine learning</span></a></li>
			</ul>
			</nav>
		</div>
		<h1 class="pageTitle">Data mining and Machine learning</h1>
		<p>
		Data analysis is a key to a successiful business. Betop Corporation has a team of expert in data mining technics. We  
		set up methods of collecting and analysing data particularly adapted to your business and help you to operate efficiently at optimum cost.
		We use advanced technics such as big data mining, optimization, statistical analysis and mathematical modeling, to tackle ineffective 
		operational problems into the design of your business system. For instance, you will figure out how to allocate scarce human resources,
		money, equipment, or facilities in order to maximize the work effciency only by looking at charts of your information data. 
		</p>
		<p>
		We help you to build an intelligent tool that gother the most valuable information from your data and platforms investment
		for you to make the well informed decisions on your business resource allocations.
		</p>
		<p>
		Machine learning is one of the main domain of research in betop Corporation. We design and develop machine that have feature recognition..
		artificial intelligence and decision tree learning approaches are applied to ...
		</p>
	</section>
	<?php include'includes/asidenews.php';?>
</div>
<?php include'includes/overall/footer.php';?>