
<div class = "container">
	<div class="row">
		<div class="col-md-10">
			<h3>Navigation Manager</h3>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!--breadcrumb-->
			<nav class="breadcrumb" style="margin-top: 20px; margin-bottom:10px">
				<ul itemscope="" itemtype="http://scheme.org/Breadcrumb" class="breadcrumb">
					<li class="first"><a itemprop="url" href="?page=dashboard"><span itemprop="title">Dashboard</span></a></li><li class="second"><a itemprop="url" href="?page=pages"><span itemprop="title">Pages</span></a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<?php if(isset($message)) { echo $message; } ?>

			<div id="sort-nav-a" class="list-group">
	
			<?php
	
			$q = "SELECT * FROM navigation WHERE parent_position = 0 ORDER BY position ASC";
			$r = mysqli_query($dbc, $q);
			
			while ($list = mysqli_fetch_assoc($r)) { ?>
		
			<div id="list_<?php echo $list['id']; ?>" >
			
				<a id="label_<?php echo $list['id']; ?>" class="list-group-item ui-state-default" data-toggle="collapse" data-target="#form_<?php echo $list['id']; ?>">
				<?php echo $list['label']; ?>  <i class="fa fa-chevron-down"></i></a>
				
				<div id="form_<?php echo $list['id']; ?>" class="collapse" style="margin-top:5px;margin-bottom:5px">

					<form class="form-horizontal nav-form" action="index.php?page=navigation&id=<?php echo $list['id']; ?>" method="post" role="form">
	
						<div class="form-group">
							
							<label class="col-sm-2 control-label" for="id">ID:</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" type="text" name="id" id="id" value="<?php echo $list['id']; ?>" placeholder="id-name" autocomplete="off">
							</div>
							
						</div>
						
						<div class="form-group">
							
							<label class="col-sm-2 control-label" for="label">Label:</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" type="text" name="label" id="label" value="<?php echo $list['label']; ?>" placeholder="Label" autocomplete="off">
							</div>
							
						</div>
						
						<div class="form-group">
							
							<label class="col-sm-2 control-label" for="value">Url:</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" type="text" name="url" id="url" value="<?php echo $list['url']; ?>" placeholder="Url" autocomplete="off">
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label" for="position">Position:</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" type="text" name="position" id="position" value="<?php echo $list['position']; ?>" placeholder="" autocomplete="off">
							</div>
							
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label" for="parent_position">Parent Position:</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" type="text" name="parent_position" id="parent_position" value="<?php echo $list['parent_position']; ?>" placeholder="" autocomplete="off">
							</div>
							
						</div>
						
						<div class="form-group">
							
							<label class="col-sm-2 control-label" for="status">Status:</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" type="text" name="status" id="status" value="<?php echo $list['status']; ?>" placeholder="" autocomplete="off">
							</div>
							
						</div>																
			
						<button type="submit" class="btn btn-default">Save</button>
						<input type="hidden" name="submitted" value="1">
						
						<input type="hidden" name="openedid" value="<?php echo $list['id']; ?>">
						
					</form>					
					
				</div>
				<div id="sort-nav-b" class="list-group">
				  
				  <?php	
						$tp = $list['id'];
						$qm = "SELECT * FROM navigation WHERE parent_position != 0 AND parent_position = $tp";
						$res= mysqli_query($dbc, $qm);
						while ($row = mysqli_fetch_assoc($res)) {
							

							?>
								<div id="list_<?php echo $row['id'];?>"class="list-group-item ui-state-highlight">
								
									<a title="<?php echo  $row['label'];?>" class="dropdown-toggle" data-toggle="collapse" data-target="#form_<?php echo $row['id']; ?>"><?php echo $row['label'];?>  <i class="fa fa-chevron-down"></i></a>
							
										<div id="form_<?php echo $row['id']; ?>" class="collapse">

											<form class="form-horizontal nav-form" action="index.php?page=navigation&id=<?php echo $row['id']; ?>" method="post" role="form">
							
												<div class="form-group">
													
													<label class="col-sm-2 control-label" for="id">ID:</label>
													<div class="col-sm-10">
														<input class="form-control input-sm" type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="id-name" autocomplete="off">
													</div>
													
												</div>
												
												<div class="form-group">
													
													<label class="col-sm-2 control-label" for="label">Label:</label>
													<div class="col-sm-10">
														<input class="form-control input-sm" type="text" name="label" id="label" value="<?php echo $row['label']; ?>" placeholder="Label" autocomplete="off">
													</div>
													
												</div>
												
												<div class="form-group">
													
													<label class="col-sm-2 control-label" for="value">Url:</label>
													<div class="col-sm-10">
														<input class="form-control input-sm" type="text" name="url" id="url" value="<?php echo $row['url']; ?>" placeholder="Url" autocomplete="off">
													</div>
													
												</div>	
												<div class="form-group">
												
													<label class="col-sm-2 control-label" for="position">Position:</label>
													<div class="col-sm-10">
														<input class="form-control input-sm" type="text" name="position" id="position" value="<?php echo $row['position']; ?>" placeholder="" autocomplete="off">
													</div>
													
												</div>
												<div class="form-group">
													
													<label class="col-sm-2 control-label" for="parent_position">Parent Position:</label>
													<div class="col-sm-10">
														<input class="form-control input-sm" type="text" name="parent_position" id="parent_position" value="<?php echo $row['parent_position']; ?>" placeholder="" autocomplete="off">
													</div>
													
												</div>
												<div class="form-group">
													
													<label class="col-sm-2 control-label" for="status">Status:</label>
													<div class="col-sm-10">
														<input class="form-control input-sm" type="text" name="status" id="status" value="<?php echo $row['status']; ?>" placeholder="" autocomplete="off">
													</div>
													
												</div>																
									
												<button type="submit" class="btn btn-default">Save</button>
												<input type="hidden" name="submitted" value="1">
												
												<input type="hidden" name="openedid" value="<?php echo $list['id']; ?>">
												
											</form>					
											
										</div>
							
								</div>
							<?php
						}
						
					?>	 
				</div>
			</div>
			<?php } ?>
			
		</div>
		</div>
	</div>
			
</div><!-- ****** end of container *** -->