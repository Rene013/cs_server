<?php 
ob_start();
include'template/header.php';
defined('_SECURE_') or die('Trying to access secured file, SORRY');
include'template/navigation.php';
if ($user->isLoggedIn()) {
    Redirect::to('index.php');
}
?>
<div class="container">
<?php
if ($user->isLoggedIn() === true && $user->isActive() === false) {
    echo '<h2> you must activate your account to be able to login else your access is invalid </h2>';
}

if(isset($_GET['success']) === true && empty($_GET['success']) === true) {

echo '<h2>Your account with Betop Corporation has been activated successfully, you can now <a href = "login.php">login!</a></h2>';

header('refresh:3; url = index.php');
} else if(isset($_GET['email'], $_GET['email_code']) === true){
		$email = escape($_GET['email']);
		$email_code = escape($_GET['email_code']);
		if ($user->emailExists($email) === false){
			$errors[]= 'Something went wrong, we couldn\'t find that email address!';
		} else if($user->activate($email, $email_code) === false){
			$errors[]= 'We had problems activating your account';
		}
		if (empty($errors) === false) {
			echo '<h2>Sorry !'; output_errors($errors); echo ' </h2>';
		} else {
			header('Location: activate.php?success');
			exit();
		}
	} else {
		header('Location: index.php');
		exit();
	}
?>
</div>
<?php 
include'template/footer.php';

//ob_end_flush();
?>