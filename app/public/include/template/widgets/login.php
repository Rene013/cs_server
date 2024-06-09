<div class="container">
<!-- Modal -->
	<div class="modal fade" id="btloginmd" role="dialog">
		<div class="modal-dialog modal-sm">
    
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Account Login</h4>
				</div>
				<div class="modal-body">		
					<div class="row">
						<div class="col-md-12">
							<!--<div class="text-center">
							Login via
							</div>
							<div class="social-buttons">
								<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
								<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
							</div>
							<div class="text-center">
							or
							</div>-->
							<form class="form" role="form" action="login.php" method="post" accept-charset="UTF-8" id="login-nav">
								<div class="form-group">
									<label class="sr-only" for="exampleInputUsername">User Name</label>
									<input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Username" required>
								</div>				
								<div class="form-group">
									<label class="sr-only" for="exampleInputPassword2">Password</label>
									<input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
									<div class="help-block text-center"><a href="recover.php?mode=username">Forgot the Username</a> or <a href="recover.php?mode=password">Password ? </a></div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block" value= "Log in" >Sign in</button>
								</div>
								<div class="checkbox">
									<label>
									<input type="checkbox"> keep me logged-in
									</label>
								</div>
							</form>
						</div>
						
					</div>
				
				<div class="modal-footer">
					<div class="bottom text-center">
							New here ? <a href="#"><b>Join Us</b></a>
						</div>
				</div>
			</div>
		   </div>
		</div>
		
	</div>
</div>