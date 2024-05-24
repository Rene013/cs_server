<?php


if (Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'firstname' => array(
                'name' => 'Firstname',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'lastname' => array(
                'name' => 'Lastname',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'name' => 'Username',
                'required' => true,
                'min' => 4,
                'max' => 20,
                'unique' => 'users'
            ),
			'email' => array(
                'email' => 'email',
                'required' => true,
                'valid' => true,
				'unique'=> 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 8
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
        ));

        if ($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);

            try {

                $user->create(array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
					'email'	=> Input::get('email'),
					'email_code'=> md5(Input::get('username') + microtime()),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
				email(Input::get('email'),'Activate your account'," Hello" . Input::get('firstname') . ",\n\n click on the following link to activate your account:\n\n	http://www.betopcorporation.com/activate?email=" . Input::get('email'). "&email_code=" . $user->create()->email_code."\n\n-BeTopCorporation");
                Session::flash('home', 'Welcome ' . Input::get('username') . '! Your account has been registered. You may now log in.');
                Redirect::to('index.php');
            } catch(Exception $e) {
                echo $e,' <br>';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo '<p class="alert alert-danger">'. $error . "<br></p>"; // NEED CSS for errors echo!
            }
        }
    }
}
?>

<div class = "panel-heading">
<h4 class="text">Register</h4>
</div>
<div class="row">
	<section class="col-md-12">
		<div class="panel-body formSection twitter-typeahead">

			<form class="form" action="" method="post">
				<div class="field form-group">
					<label for="firstname">First Name</label>
					<input type="text" class="form-control" name="firstname" value="<?php echo escape(Input::get('firstname')); ?>" id="firstname">
				</div>
				<div class="field form-group">
					<label for="lastname">Last Name</label>
					<input type="text" class="form-control" name="lastname" value="<?php echo escape(Input::get('lastname')); ?>" id="lastname">
				</div>

				<div class="field form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>">
				</div>
				
				<div class="field form-group">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>">
				</div>

				<div class="field form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password">
				</div>

				<div class="field form-group">
					<label for="password_again">Password Again</label>
					<input type="password" class="form-control" name="password_again" id="password_again" value="">
				</div>

				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				<button type="submit" class="btn btn-primary btn-sm" value="Register">Register</button>
			</form>
		</div>
	</section>
</div>
<?php ob_end_clean(); ?>