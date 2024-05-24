<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
<div class="clearfix" style="height:4px"></div>
<div class="container"><!-- Container content begin -->
	<div class="row">
		<div class="col-md-8">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="row-fluid item">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/betopCorp.jpg" alt="Partnership is important to success">
						<div class="carousel-caption">
							<h1>Betop Corporation</h1>
							<div class="tagline"><p>Take a look at our work and choose your next move</p></div>
							<!--<a href="">
								<button style="margin-top: 10px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>-->
							<div class="spotCredit"><p>Betop Corporation</p></div>
						</div>
					</div>
					<div class="row-fluid item">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/sci-fi.jpg" alt="Sci-fi week">
						<div class="carousel-caption">
							<h1>Sci-fi opens door to future</h1>
							<div class="tagline">
								<p>
									Business day – 5<sup>th</sup> July , schools – 6<sup>th</sup> and 7<sup>th</sup> July, public Day – 9<sup>th</sup> July&nbsp;
								</p>
							</div>
							<!--<a href="#">
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>-->
							<div class="spotCredit"></div>
						</div>
					</div>
					<div class="row-fluid item active">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/machine-learning.png" alt="Future of robotic and human">
						<div class="carousel-caption">
							<h1>Data mining and Machine learning</h1>
							<div class="tagline"><p>We develop AI features specificaly adapted for your services, work with us</p></div>
							<a href="/services/datamining">
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>
							<div class="spotCredit"></div>
						</div>
					</div>
					<div class="row-fluid item">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/RWD.png" alt="Responsive web design">
						<div class="carousel-caption">
							<h1>Web and Mobile application</h1>
							<div class="tagline"><p>It doesn't have to be particuraly a Mobile App, your website can be enhanced for mobile functionality</p></div>
							<a href="services/webdevelopment">
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>
							<div class="spotCredit"></div>
						</div>
					</div>
					<div class="row-fluid item">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/computation.jpg" alt="Computation physics">
						<div class="carousel-caption">
							<h1>Computation solutions</h1>
							<div class="tagline"><p>We can help you to optimize your Engineering services</p></div>
							<a href="#">
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>
							<div class="spotCredit"><p>Math solutions and Data analysis</p></div>
						</div>
					</div>
					<div class="row-fluid item">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/Engineeringdesign.jpg" alt="System Engineering and design">
						<div class="carousel-caption">
							<h1>System Engineering</h1>
							<div class="tagline"><p> Our solution are always results of a deep Engineering Analysis</p></div>
							<a href="services/systemengineering">
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px; margin-bottom: 3px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>
						<div class="spotCredit"><p>Betop Corporation</p></div>
						</div>
					</div>
					<div class="row-fluid item">
						<img src="<?php echo Config::get('uri_parts/base');?>/images/computation-crypt.jpg" alt="Quantum computing threatens to shatter existing cryptographic schemes that shield electronic information">
						<div class="carousel-caption">
							<h1>Tackling future Information Security Issues</h1>
							<div class="tagline">
								<p>High Computing capability is posing a threat to breach existing encryption methods</p>
							</div>
							<!--<a href="">
								<button style="margin-top: 10px;" class="btn btn-primary btn-sm hidden-xs">Find out more</button>
								<button style="margin-top: 10px;" class="btn btn-primary btn-xs hidden-sm hidden-md hidden-lg">Find out more</button>
							</a>-->
							<div class="spotCredit"><p>Betop Corporation</p></div>
						</div>
					</div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-circle-left icon-prev"></i></a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-circle-right icon-next"></i></a>
				<script>
				jQuery(document).ready(function($){
					$('#myCarousel').carousel({interval:6000});});
				</script>
			</div>
		</div>
		<div class="col-md-4">
			<div class="art-str news-art">
				<h2>Science News & Articles</h2>
				<div>
					<dl class="first inside-img">
						<dd class="image">
							<a href="http://www.trialphaenergy.com/company" title="TRI ALPHA Energy is developing Nuclear fusion technology, a clean source of energy"><img style="height:80px;width:80px" src="<?php echo Config::get('uri_parts/base');?>/images/webimg/trialpha.jpg" alt="TRI ALPHA Energy is developing Nuclear fusion technology, a clean source of energy"></a>
						</dd>
						<dt class="date releaseDate">
							27 january 2016
						</dt>
						<dt class="title">
							<a href="https://www.sciencenews.org/article/nuclear-fusion-gets-boost-private-sector-startups">Nuclear fusion gets boost from private-sector startups</a>
						</dt>
						<dd class="news-summary">
							<p>The fusion energy will change the world by helping us the keep our planet safe from pollution by reducing significantely the amount of greenhouse gas
							.&nbsp;</p>
						</dd>
					</dl>
					<dl class="inside-img">
						<dd class="image">
							<a href="http://press.ihs.com/press-release/automotive/ihs-enhances-its-mexico-automotive-aftermarket-insight-new-vehicle-and-oe-c" title="
							IHS Enhances its Mexico Automotive Aftermarket Insight with new Vehicle and OE Component Research from Integrate Data Facts (IDF)"><img style="height:80px;width:80px" src="<?php echo Config::get('uri_parts/base');?>/images/webimg/IHS.jpg" alt="IHS Enhances its Mexico Automotive Aftermarket Insight with new Vehicle and OE Component Research from Integrate Data Facts (IDF)"></a>
						</dd>
						<dt class="date releaseDate">
							25 May 2016
						</dt>
						<dt class="title">
							<a href="http://press.ihs.com/press-release/automotive/ihs-enhances-its-mexico-automotive-aftermarket-insight-new-vehicle-and-oe-c">
							IHS Enhances its Mexico Automotive Aftermarket Insight with new Vehicle and OE Component Research from Integrate Data Facts (IDF)</a>
						</dt>
						<dd class="news-summary">
							<p>..</p>
						</dd>
					</dl>
					<dl class="last inside-img">
						<dd class="image">
							<a href="http://www.esaim-cocv.org/articles/cocv/abs/2016/02/contents/contents.html" title="ESAIM: Control, Optimisation and Calculus of Variations"><img style="height:80px;width:80px" src="<?php echo Config::get('uri_parts/base');?>/images/webimg/cocv.jpg" alt="ESAIM: Control, Optimisation and Calculus of Variations"></a>
						</dd>
						<dt class="date releaseDate">
							(April-June 2016)
						</dt>
						<dt class="title">
							<a href="http://www.esaim-cocv.org/articles/cocv/abs/2016/02/contents/contents.html">ESAIM: Control, Optimisation and Calculus of Variations
Vol. 22, No. 2 </a>
						</dt>
						<dd class="news-summary">
							<p>Latest issues on control, Optimization and Caculus of variations</p>
						</dd>
					</dl>
				</div>
				<a class="more" href="<?php echo Config::get('uri_parts/base');?>/newsandarticles">News and Articles</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-12 col-sm-4"><!---Popular Content--->
					<div class="thumbnail common-content"><img alt="" src="<?php echo Config::get('uri_parts/base');?>/images/CMP.jpg">
						<h3>Featured services:</h3>
						<ul class="media-list">
							<li class="media">
								<div class="media-left">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/webdevelopment"><img alt="..." class="media-object" src="<?php echo Config::get('uri_parts/base');?>/images/web-small.jpg"></a>
								</div>
								<div class="media-body">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/webdevelopment">Web App & Software</a>
									<p>We provide sofware solutions for business innovation in many industry</p>
								</div>
							</li>
							<li class="media">
								<div class="media-left">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/systemengineering"><img alt="..." class="media-object" src="<?php echo Config::get('uri_parts/base');?>/images/Eng-small.jpg"> </a>
								</div>
								<div class="media-body">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/systemengineering">System Engineering</a>
									<p>Our solutions are results of advanced Engineering conceptions obtained using cutting edge technology</p>
								</div>
							</li>
							<li class="media">
								<div class="media-left">
								<a href="<?php echo Config::get('uri_parts/base');?>/services/qualityassurance"><img alt="..." class="media-object" src="<?php echo Config::get('uri_parts/base');?>/images/QA.jpg"> </a>
								</div>
								<div class="media-body">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/qualityassurance">Quality Assurance</a>
									<p>We will help you to achieve your goals by testing your products and services requirements.</p>
								</div>
							</li>
							<li class="media">
								<div class="media-left">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/analysisandmodeling"><img alt="..." class="media-object" src="<?php echo Config::get('uri_parts/base');?>/images/Analysis-small.jpg"> </a>
								</div>
								<div class="media-body">
									<a href="<?php echo Config::get('uri_parts/base');?>/services/analysisandmodeling">Analysis and Modeling</a>
									<p>Our expertise in engineering analysis and modeling covers a wide range of specialties and industries.</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!---/Popular Content--->
				<div class="col-xs-12 col-sm-4">
					<!---Recruitment--->
					<div class="row">
						<div class="col-xs-12">
							<div class="media-column"><img alt="" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/careers.jpg">
								<div class="caption">
									<h3>Betop Corporation Careers</h3>
									<p>Find out about a career with Betop Corporation.</p>
									<p><a class="btn btn-primary btn-sm" href="<?php echo Config::get('uri_parts/base');?>/careers" role="button" target="" title="Find out more about our latest vacancies">Find out more</a></p>
								</div>
							</div>
						</div>
					</div>
					<!---/---><!---/Events--->
					<div class="row">
						<div class="col-xs-12">
							<div class="media-column"><img alt="" class="img-responsive img-rounded" src="<?php echo Config::get('uri_parts/base');?>/images/go-mobile.jpg">
								<div class="caption">
									<h3>Mobile responsive websites</h3>
									<p>It doesn't have to be a Mobile App, your website can be Mobile responsive more like an app running in a web browser</p>
									<p><a class="btn btn-primary btn-sm" href="<?php echo Config::get('uri_parts/base');?>/services/webdevelopment/gomobile" role="button" target="" title="Find out more about our latest vacancies">Find out more</a></p>
								</div>
							</div>
						</div>
					</div><!---Events--->
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="twitterFeed">
						<div class="title">
							<h3>Tweets</h3>
							<p>@BetopCorporation</p>
						</div>
						<div class="twitterLogo">
							<img src="<?php echo Config::get('uri_parts/base');?>/images/Twitter_logo.png" alt="">
						</div>
						<div class="clearfix"></div>
						<div style="margin-top: 5px;">
							<a class="twitter-timeline" href="https://twitter.com/betopcorp" data-widget-id="735640526989328384">Tweets by @betopcorporation</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>