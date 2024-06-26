<h1>Account Recovery</h1>

<?php
if( isset( $disabled ) )
{
	echo '
		<div style="border:1px solid red;">
			<p>
				Account Recovery is Disabled.
			</p>
			<p>
				If you have exceeded the maximum login attempts, or exceeded
				the allowed number of password recovery attempts, account recovery 
				will be disabled for a short period of time. 
				Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
				minutes, or contact us if you require assistance gaining access to your account.
			</p>
		</div>
	';
}
else if( isset( $banned ) )
{
	echo '
		<div style="border:1px solid red;">
			<p>
				Account Locked.
			</p>
			<p>
				You have attempted to use the password recovery system using 
				an email address that belongs to an account that has been 
				purposely denied access to the authenticated areas of this website. 
				If you feel this is an error, you may contact us  
				to make an inquiry regarding the status of the account.
			</p>
		</div>
	';
}
else if( isset( $confirmation ) )
{
	echo '
		<div style="border:1px solid green;">
			<p>
				Congratulations, you have created an account recovery link.
			</p>
			<p>
				<b>Please note</b>: The account recovery link would normally be placed in an email, 
				and you would not see it here on the screen. This is to limit the code in the 
				Examples controller, and keep your focus on learning Community Auth, but give you 
				an idea of how to implement account recovery. <b>When you do end up writing code to send 
				the recovery link to an email address, you will want to delete it from this view, 
				delete these instructions, and instead have a simple message similar to the following</b>:
			</p>
			<p>
				"We have sent you an email with instructions on how 
				to recover your account."
			</p>
			<p>
				This is the account recovery link:
			</p>
			<p>' . $special_link . '</p>
		</div>
	';
}
else if( isset( $no_match ) )
{
	echo '
		<div  style="border:1px solid red;">
			<p class="feedback_header">
				Supplied email did not match any record.
			</p>
		</div>
	';

	$show_form = 1;
}
else
{
	echo '
		<p>
			If you\'ve forgotten your password and/or username, 
			enter the email address used for your account, 
			and we will send you an e-mail 
			with instructions on how to access your account.
		</p>
	';

	$show_form = 1;
}
if( isset( $show_form ) )
{
	?>

		 <?php echo form_open(); ?>
			<div>
				<fieldset>
					<legend>Enter your account's email address:</legend>
					<div>

						<?php
							// EMAIL ADDRESS *************************************************
							echo form_label('Email Address','email', ['class'=>'form_label'] );

							$input_data = [
								'name'		=> 'email',
								'id'		=> 'email',
								'class'		=> 'form_input',
								'maxlength' => 255
							];
							echo form_input($input_data);
						?>

					</div>
				</fieldset>
				<div>
					<div>

						<?php
							// SUBMIT BUTTON **************************************************************
							$input_data = [
								'name'  => 'submit',
								'id'    => 'submit_button',
								'value' => 'Send Email'
							];
							echo form_submit($input_data);
						?>

					</div>
				</div>
			</div>
		</form>

	<?php
}