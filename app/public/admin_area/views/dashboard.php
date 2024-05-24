<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}
	if($user->hasPermission('admin')) {
		if($user->isLoggedIn()) {
			?>
			<div class="row">
				<div class="col-md-10">
					<h3>Content Manager</h3>
				</div>
				<div class="col-md-2">
					<div class="dropdown create">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Create Content
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
							<li><a href="#">Add Post</a></li>
							<li><a href="#">Add User</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row"><!--breadcrumb-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav class="breadcrumb" style="margin-top: 20px;">
						<ul itemscope="" itemtype="http://scheme.org/Breadcrumb" class="breadcrumb">
							<li class="first"><a itemprop="url" href="?page=dashboard"><span itemprop="title">Dashboard</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="clearfix" style="height:10px"></div>
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="<?php echo Config::get('uri_parts/base');?>/admin_area" class="list-group-item active main-color-bg">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
						</a>
						<a href="?page=pages" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge"><?php echo $view->count_pages();?></span></a>
						<a href="?page=posts" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">33</span></a>
						<a href="?page=users" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo $user->count_users();?></span></a>
					</div>

					<div class="well">
						<h4>Disk Space Used</h4>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								  60%
							</div>
						</div>
						<h4>Bandwidth Used </h4>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
								40%
							</div>
						</div>
					</div>
					<div class="well asideUser">
						<ul>
							<li><a href="profile?user=<?php echo escape($user->data()->username);?>"> Administrator <?php echo escape($user->data()->firstname);?></a></li>
							<li><a href="update">Update Profile</a></li>
							<li><a href="changepassword">Change Password</a></li>
							<li><a href="logout">Log out</a></li>
						</ul>  
					</div>
				</div>
				<div class="col-md-9">
					<!-- Website Overview -->
					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Overview</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-3">
							  <div class="well dash-box">
								<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $user->count_users();?></h2>
								<h4>Users</h4>
							  </div>
							</div>
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $view->count_pages();?></h2>
									<h4>Pages</h4>
								</div>
							</div>
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 458</h2>
									<h4>Posts</h4>
								</div>
							</div>
							<div class="col-md-3">
								<div class="well dash-box">
									<h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
									<h4>Visitors</h4>
								</div>
							</div>
						</div>
					</div>

					<!-- Latest Users -->
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h3 class="panel-title">Latest Users</h3>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-hover">
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Joined</th>
								</tr>
								<tr>
									<td><?php echo escape($user->data()->username); ?></td>
									<td><?php echo escape($user->data()->email); ?></td>
									<td><?php echo escape($user->data()->joined); ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>  
			<!-- Modals -->

			<!-- Add Page -->
			<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1101;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form>
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Add Page</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label>Page Title</label>
									<input type="text" class="form-control" placeholder="Page Title">
								</div>
								<div class="form-group">
									<label>Page Body</label>
									<textarea id="body_edit" rows="20" name="editor1" class="form-control" placeholder="Page Body"></textarea>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox"> Published
									</label>
								</div>
								<div class="form-group">
									<label>Meta Tags</label>
									<input type="text" class="form-control" placeholder="Add Some Tags...">
								</div>
								<div class="form-group">
									<label>Meta Description</label>
									<input type="text" class="form-control" placeholder="Add Meta Description...">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php 
	}
 } else {
	 Redirect::to('/home');
	 echo '<p>You need to <a href="' . Config::get('uri_parts/base') . '/login">login</a> or <a href="' . Config::get('uri_parts/base').'/register">register.</a></p>';
 }
	?>  