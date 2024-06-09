
	<div class="row">
		<div class="col-md-10">
			<h3>Edit content</h3>
		</div>
	</div>
	<div class="row"><!--breadcrumb-->
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<nav class="breadcrumb" style="margin-top: 20px;">
				<ul itemscope="" itemtype="http://scheme.org/Breadcrumb" class="breadcrumb">
					<li class="first"><a itemprop="url" href="?page=dashboard"><span itemprop="title">Dashboard</span></a></li><li class="second"><a itemprop="url" href="#"><span itemprop="title">Editing page</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="clearfix" style="height:10px"></div>
	<div class="row">
		<div class="col-md-3">
			<div class="list-group">
				<a href="#" class="list-group-item active main-color-bg">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
				</a>
				<a href="?page=pages" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge"><?php echo $view->count_pages();?></span></a>
				<a href="?page=posts" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">33</span></a>
				<a href="?page=users" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">203</span></a>
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
			<?php if(isset($message)) { echo $message; } ?>
            <div class="panel panel-default">
				<div class="panel-heading main-color-bg">
					<h3 class="panel-title">Editing page : </h3>
				</div>

				<div class="panel-body">
				<?php 
					if(isset($_GET['id'])) { $opened = data_post($dbc, $_GET['id']); }
					
					//print_r($user->data());
					print_r($opened);
					?>		
						
					<form action="index.php?page=edit&id=<?php echo $opened['id']; ?>" method="post" role="form">
						<div class="form-group">
							<label>Page Title</label>
							<input type="text" name="title" class="form-control" value = "<?php echo $opened['title'] != $_POST['title'] ? $opened['title'] : $_POST['title']; ?>">
						</div>
						<div class="form-group">
							<label>Page Header</label>
							<input type="text" name="header" class="form-control" value = "<?php echo $opened['header'] != $_POST['header'] ? $opened['header'] : $_POST['header']; ?>">
						</div>
						<div class="form-group">
							<label>Page Label</label>
							<input type="text" name="label" class="form-control" value = "<?php echo $opened['label'] != $_POST['lebel'] ? $opened['label'] : $_POST['label']; ?>">
						</div>
						<div class="form-group">
							<label>Page Body</label>
							<textarea id="body_edit" rows="20" cols="30" name="body" class="form-control" value="<?php echo $opened['body']!= $_POST['body'] ? $opened['body'] : $_POST['body']; ?>"></textarea>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="published" <?php echo $opened['published']== true ? "checked" : ""; ?>> Published
							</label>
						</div>
						<div class="form-group">
							<label>Meta Tags</label>
							<input type="text" name="slug" value = "<?php echo $opened['slug']!= $_POST['slug'] ? $opened['slug'] : $_POST['slug']; ?> " class="form-control" placeholder="Add Tags...">
						</div>
						<div class="form-group">
							<label>Meta Description</label>
							<input type="text" name="description" value= "<?php echo $opened['description']!= $_POST['description'] ? $opened['description'] : $_POST['description']; ?>" class="form-control" placeholder="Add Description...">
						</div>
						<a href="index.php?page=pages" type="button" class="btn btn-default">Disregard</a>
						<button type="submit" class="btn btn-primary" id="update_<?php echo $opened['id']; ?>"><i class="fa fa-save"></i></button>
						<input type="hidden" name="submitted" value="1">
						<?php if(isset($opened['id'])) { ?>
							<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
						<?php } ?>
						<input type="hidden" name="user" value="<?php echo $user->data()->id;?>">
						<input type="hidden" name="parent_id" value="<?php echo $user->data()->id;?>">
						<input type="hidden" name="type" value="<?php echo $user->data()->id;?>">
					</form>
				</div>
            </div>
         </div>
	</div>  