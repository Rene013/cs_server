<div data-offset-top="100" data-spy="affix" class="affix-top">
	<nav class="navbar navbar-default" role="navigation">
		<div class ="container">
			<div class="navbar-header">
				<button type="button" class= "navbar-toggle" data-toggle = "collapse" data-target = "#primary-navbar">
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>
				<div class="visible-xs"><!-- class="hidden-md hidden-lg">-->
					<a class="navbar-brand" <?php if($user->isLoggedIn()){?> href = "/logout.php" > <span class="fa fa-user"></span> <?php } else {?> href = "/login.php" ><span class="fa fa-user"></span><?php }?></a>
				</div>
			</div>			
			<div class="collapse navbar-collapse" id="primary-navbar"><!--Navigation Head start-->	
				<div class="row">
					<div class="col-xs-12 col-md-9">
						<ul id="navPrimary" class="main-nav">
						
						<?php nav_main();?>
								
						</ul>
					</div>
					<div class="col-xs-12 col-md-3">
						<form role="search" class="header-search navbar-form navbar-right" id="headerSearchForm" action="<?php echo Config::get('uri_parts/base');?>/search.php" method="get">
							<div class="input-group">
								<input type="text" name="query" id="searchKeywordsHeader" placeholder="search" value="" class="form-control searchKeywords" action="include/js_suggest/suggest.php" columns="2" autocomplete="off" delay="1500">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default btn-header-search" value="Search">
										<i class="fa fa-search"></i>
									</button>
								</span>
								<input type="hidden" name="search" id="siteidHeader" value="1">
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div><!-- end .container --> 
		
	</nav><!-- END nav -->
</div>