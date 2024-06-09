<?php
ob_start();

include'template/header.php';
defined('_SECURE_') or die('Trying to access secured file, SORRY');
if ($user->isLoggedIn()) {
    Redirect::to('index.php');
}

?>
<div class="clearfix"></div>
<div class="container content"><!-- Container content begin -->
<?php


$messages = [];
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
			$email_code = md5(Input::get('username') + microtime());
            try {

                $user->create(array(
                    'firstname' => Input::get('firstname'),
                    'lastname' => Input::get('lastname'),
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
					'email'	=> Input::get('email'),
					'email_code'=> $email_code,
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
				email(Input::get('email'),'Activate your account'," Hello " . Input::get('firstname') . ",\n\n click on the following link to activate your account:\n\n	https://www.betopcorporation.com/activate.php?email=" . Input::get('email'). "&email_code=" . $email_code."\n\n-BeTopCorporation");
                Session::flash('username', Input::get('username'));
                Redirect::to('register.php?success');
            } catch(Exception $e) {
                echo $e,' <br>';
            }
        } else {/*
           foreach ($validation->errors() as $error) {
                echo '<p class="alert alert-danger">'. $error . "<br></p>"; // NEED CSS for errors echo!
            }
			echo '<pre>';
			print_r($validation->errors()['firstname']);
			echo '</pre>';*/
			$messages = $validation->errors();
        }
    }
}
?>

<div class = "panel-heading">
<h4 class="text">Register</h4>
<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
    echo '<p> Welcome ' . Session::get('username') . "!<br><br> Your account with Betop Corporation has been registered successfully. You are being redirected to the home page.</p>";
	header('refresh:8; url = index.php');
} else {?>
</div>
<div class="row">
	<section class="col-md-12">
		<div class="panel-body formSection twitter-typeahead">

			<form class="form" action="" method="post">
				<div class="field form-group <?php if(!empty($messages['firstname'])){echo 'has-error';} else { echo 'has-success';}?> has-feedback">
					<label class ="control-label" for="firstname">First Name </label>
					<input type="text" class="form-control" id = "firstname" name="firstname" value="<?php echo escape(Input::get('firstname')); ?>" aria-describedby="helpFirstname">
					<span class="glyphicon <?php if(!empty($messages['firstname'])){echo 'glyphicon-remove';} else { echo 'glyphicon-ok';}?> form-control-feedback" aria-hidden="true"></span>
					<span id="helpFirstname" class="help-block small"><?php if(!empty($messages['firstname'])){echo ucfirst(($messages['firstname']));}?></span>
				</div>
				<div class="field form-group <?php if(!empty($messages['lastname'])){echo 'has-error';} else { echo 'has-success';}?> has-feedback">
					<label  class ="control-label" for="lastname">Last Name</label>
					<input type="text" class="form-control" name="lastname" value="<?php echo escape(Input::get('lastname')); ?>" id="lastname">
					<span class="glyphicon <?php if(!empty($messages['lastname'])){echo 'glyphicon-remove';} else { echo 'glyphicon-ok';}?> form-control-feedback" aria-hidden="true"></span>
					<span id="helpFirstname" class="help-block small"><?php if(!empty($messages['lastname'])){echo ucfirst(($messages['lastname']));}?></span>
				</div>

				<div class="field form-group <?php if(!empty($messages['username'])){echo 'has-error';} else { echo 'has-success';}?> has-feedback">
					<label  class ="control-label" for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>">
					<span class="glyphicon <?php if(!empty($messages['username'])){echo 'glyphicon-remove';} else { echo 'glyphicon-ok';}?> form-control-feedback" aria-hidden="true"></span>
					<span id="helpFirstname" class="help-block small"><?php if(!empty($messages['username'])){echo ucfirst(($messages['username']));}?></span>
				</div>
				
				<div class="field form-group <?php if(!empty($messages['email'])){echo 'has-error';} else { echo 'has-success';}?> has-feedback">
					<label  class ="control-label" for="email">E-mail</label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>">
					<span class="glyphicon <?php if(!empty($messages['email'])){echo 'glyphicon-remove';} else { echo 'glyphicon-ok';}?> form-control-feedback" aria-hidden="true"></span>
					<span id="helpFirstname" class="help-block small"><?php if(!empty($messages['email'])){echo ucfirst(($messages['email']));}?></span>
				</div>

				<div class="field form-group <?php if(!empty($messages['password'])){echo 'has-error';} else { echo 'has-success';}?> has-feedback">
					<label  class ="control-label" for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password">
					<span class="glyphicon <?php if(!empty($messages['password'])){echo 'glyphicon-remove';} else { echo 'glyphicon-ok';}?> form-control-feedback" aria-hidden="true"></span>
					<span id="helpFirstname" class="help-block small"><?php if(!empty($messages['password'])){echo ucfirst(($messages['password']));}?></span>
				</div>

				<div class="field form-group <?php if(!empty($messages['password_again'])){echo 'has-error';} else { echo 'has-success';}?> has-feedback">
					<label  class ="control-label" for="password_again">Password Again</label>
					<input type="password" class="form-control" name="password_again" id="password_again" value="">
					<span class="glyphicon <?php if(!empty($messages['password_again'])){echo 'glyphicon-remove';} else { echo 'glyphicon-ok';}?> form-control-feedback" aria-hidden="true"></span>
					<span id="helpFirstname" class="help-block small"><?php if(!empty($messages['password_again'])){echo ucfirst(($messages['password_again']));}?></span>
				</div>

				<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
				<button type="submit" class="btn btn-primary btn-sm" value="Register">Register</button>
			</form>
		</div>
	</section>
</div>
<?php 
}
include'template/footer.php';

//ob_end_flush();
?>