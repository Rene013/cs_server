
<div class="row">
	<div class="col-md-10">
		<h3>User Manager</h3>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--breadcrumb-->
		<nav class="breadcrumb" style="margin-top: 20px; margin-bottom:10px">
			<ul itemscope="" itemtype="http://scheme.org/Breadcrumb" class="breadcrumb">
				<li class="first"><a itemprop="url" href="?page=dashboard"><span itemprop="title">Dashboard</span></a></li><li class="second"><a itemprop="url" href="?page=users"><span itemprop="title">Users</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="row">
	
	<div class="col-md-3">

		<div class="list-group">
			
		<a class="list-group-item" href="?page=users">
			<i class="fa fa-plus"></i> New User
		</a>
						
		<?php 
			//$user_list = DB::getInstance()->state("users");
			//var_dump($user_list);
			$q = "SELECT * FROM users ORDER BY lastname ASC";
			$r = mysqli_query($dbc, $q);
		
			while($list = mysqli_fetch_assoc($r)) {
			
				$list = data_user($dbc, $list['id']);
					
			?>

			<a class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>" href="index.php?page=users&id=<?php echo $list['id']; ?>">
				<h4 class="list-group-item-heading"><?php echo $list['fullname_reverse']; ?></h4>
			</a>
				
				
		<?php } ?>
		
		</div>
		
	</div>
	
	<div class="col-md-9">

		<?php if(isset($message)) { echo $message; } ?>
		<?php if(isset($opened['id'])) { ?>
		<div class = "row">
			<div class = "col-md-6">
				<div id="avatar">
					<?php if($opened['avatar'] != ''){ ?>
						<div class="avatar-container" style="background-image: url('../uploads/<?php echo $opened['avatar']; ?>')"></div>
					<?php } ?>
				</div>
			</div>
			<div class = "col-md-6">
				<div class="avatar-container" style="">
				
					<div action="uploads.php?id=<?php echo $opened['id']; ?>" class="dropzone" id="avatar-dropzone">
						<!--<input type="file" name="file">-->
					</div>
				
				</div>
			</div>
		</div>
		<?php } ?>
		<div style="margin-top:10px"></div>
		<form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="post" role="form">
			<div class="form-group">
				
				<label for="firstname">First Name:</label>
				<input class="form-control" type="text" name="firstname" id="firstnmae" value="<?php echo $opened['firstname']; ?>" placeholder="First Name" autocomplete="off">
				
			</div>
			
			<div class="form-group">
				
				<label for="lastname">Last Name:</label>
				<input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $opened['lastname']; ?>" placeholder="Last Name" autocomplete="off">
				
			</div>
			
			<div class="form-group">
				
				<label for="email">Email Address:</label>
				<input class="form-control" type="text" name="email" id="email" value="<?php echo $opened['email']; ?>" placeholder="Email Address" autocomplete="off">
				
			</div>						

			<div class="form-group">
				
				<label for="status">Status:</label>
				<select class="form-control" name="status" id="status">
					
					<option value="0" <?php if(isset($_GET['id'])){ selected('0', $opened['status'], 'selected'); } ?>>Inactive</option>
					<option value="1" <?php if(isset($_GET['id'])){ selected('1', $opened['status'], 'selected'); } ?>>Active</option>
										
				</select>
				
			</div>

			<div class="form-group">
				
				<label for="password">Password:</label>
				<input class="form-control" type="password" name="password" id="password" value="" placeholder="Password" autocomplete="off">
				
			</div>
			
			<div class="form-group">
				
				<label for="passwordv">Verify Password:</label>
				<input class="form-control" type="password" name="passwordv" id="passwordv" value="" placeholder="Type Password Again" autocomplete="off">
				
			</div>			
			
			<button type="submit" class="btn btn-default">Save</button>
			<input type="hidden" name="submitted" value="1">
			<?php if(isset($opened['id'])) { ?>
				<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
			<?php } ?>
		</form>
	</div>
		
</div>