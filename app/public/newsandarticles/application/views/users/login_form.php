<?php

if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		echo '
		<div class = "row">
			<div class = "col-md-4 col-md-offset-4">
				<div class="alert alert-warning">
					<p>
						Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
					</p>
					<p>
						Username, email address and password are all case sensitive.
					</p>
				</div>
			</div>
		</div>
		';
	}

	if( $this->input->get('logout') )
	{
		echo '
		<div class = "row">
			<div class = "col-md-4 col-md-offset-4">
				<div class="alert alert-success">
					<p>
						You have successfully logged out.
					</p>
				</div>
			</div>
		</div>
		';
	}

	echo form_open($login_url, ['class' => 'std-form'] ); 
?>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<label for="login_string" class="form_label">Username or Email</label>
				<input type="text" name="login_string" id="login_string" class="form_input form-control" autocomplete="off" maxlength="255" />

			</div>
			<div class="form-group">
				<label for="login_pass" class="form_label">Password</label>
				<input type="password" name="login_pass" id="login_pass" class="form_input form-control password" <?php 
					if( config_item('max_chars_for_password') > 0 )
						echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
				?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');" />

			</div>
			<div class ="form-group">
				<?php
					if( config_item('allow_remember_me') )
					{
				?>

					<br />

					<label for="remember_me" class="form_label">Remember Me</label>
					<input type="checkbox" id="remember_me" name="remember_me" value="yes" />

				<?php
					}
				?>
			</div>
			<p>
				<?php
					$link_protocol = USE_SSL ? 'https' : NULL;
				?>
				<a href="<?php echo site_url('users/recover', $link_protocol); ?>">
					Can't access your account?
				</a>
			</p>


		<button type="submit" name="submit" class="btn btn-primary btn-block" value="Login" id="submit_button">Login</button>
		</div>
	</div>
</form>

<?php

	}
	else
	{
		// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
		echo '
		<div class = "row">
			<div class = "col-md-4 col-md-offset-4">
				<div class = "alert alert-danger" style="border:1px solid red;">
					<p>
						Excessive Login Attempts
					</p>
					<p>
						You have exceeded the maximum number of failed login<br />
						attempts that this website will allow.
					<p>
					<p>
						Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
					</p>
					<p>
						Please use the <a href="'.base_url().'/users/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
						or contact us if you require assistance gaining access to your account.
					</p>
				</div>
			</div>
		</div>
		';
	}
