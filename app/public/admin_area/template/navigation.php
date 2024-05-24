<nav class="navbar navbar-default" role="navigation">
	<div class ="container">
		<div class="navbar-header">
			<button type="button" class= "navbar-toggle" data-toggle = "collapse" data-target = "#primary-navbar" ><!--data-parent=".bt-header"-->
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
				<span class = "icon-bar"></span>
			</button>
		</div>			
		<div class="collapse navbar-collapse" id="primary-navbar"><!--Navigation Head start-->		
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					
					<ul class="nav navbar-nav">
					
						<li><a href="?page=dashboard">Dashboard</a></li>
						<li><a href="?page=pages">Pages</a></li>
						<li><a href="?page=users">Users</a></li>
						<li><a href="?page=navigation">Navigation</a></li>
						<li><a href="?page=settings">Settings</a></li>
						<li><a href="?page=pagese">Page block</a></li>		
					</ul>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<ul class="nav navbar-nav">
						
						
						<li>
							<a href="#"><?php echo escape($user->data()->firstname). ' ' . escape($user->data()->lastname); ?></b></a>
						</li>
						
						<li>
							<?php if($debug == 1) { ?>
								<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
							<?php } ?>				
						</li>	
						
					</ul>
				</div>
			</div>
		</div>
	</div><!-- end .container --> 
</nav><!-- END nav -->


