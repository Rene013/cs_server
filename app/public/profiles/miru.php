<?php
include'../core/init.php';
include'../includes/overall/header.php';
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="sectionHeader">
			<img id="aImg" class="img-responsive img-rounded" src="images/landing/Research.jpg">
			<h1 id="aCaption">Miru</h1>
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
			<li class="first"><a itemprop="url" href="index.php"><span itemprop="title">Home</span></a></li><li><a itemprop="url" href="AboutUS.php"><span itemprop="title">About Us</span></a></li><li class="last"><a itemprop="url" href="companyorganization.php"><span itemprop="title">Company Organization</span></a></li>
			</ul>
			</nav>
		</div>
		<h1 class="pageTitle">Miru profile</h1>
		<br><br>
		<h1><?php echo $profile_data['first_name']; ?>'s Profile</h1>
		<p><?php echo $profile_data['email'];?></p>
		<p>UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA<br>
		UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA<br>UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA
		UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA<br>UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA
		UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA<br>UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA
		<br><br>UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA 
		UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA
		<br>UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA UPSUM PUSM SUM IN SUM SAMUSA UPSI SAMPUSIMU SAMUSA BUMUSIMSA<br>
		In our company we have 4 departments. The department of Administration, Engineering, Research, cooperation. The administration department 
		controls the internal organization of our company, recruitments of staffs, ethic and marketing. The department of Engineering encompass computer
		engineering, software engineering, Material science engineering and industrial design and engineering corps. The department of research has 
		computational, simulation and devices design corps. The department of cooperation is always in touch with our industrial clients to follow up and 
		answer their questions as well as scheduling meetings and connect customers with the exact concerned department or corps of our company. The
		department of Administration and cooperation are also in a joint coordination to keep the interest of our company safe and attract our investors. 
		</p>
	</section>
	<?php include'../includes/asidenews.php';?>
</div>