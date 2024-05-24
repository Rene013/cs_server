<?php
	//defined('_SECURE_') or die('Trying to access secured file, SORRY');
	error_reporting(E_ERROR | E_PARSE);
	DEFINE('_SECURE_', 2);
	$admin = "betop";
	$admin_pw = "Fe3clbriAt0!#";
	
	session_start();
	
if (isset($_POST['user']) && isset($_POST['pass'])) {

	$username = $_POST['user'];
	$password = $_POST['pass'];
	if (($username == $admin) && ($password ==$admin_pw)) {
		$_SESSION['admin'] = $username;
		$_SESSION['admin_pw'] = $password;
	}
	header("Location: admin.php");
	exit();
} elseif ((isset($_SESSION['admin']) && isset($_SESSION['admin_pw']) &&$_SESSION['admin'] == $admin && $_SESSION['admin_pw'] == $admin_pw ) || (getenv("REMOTE_ADDR")=="")) {

} else {
	
	?>
	<html>
	<head>
	<title>Betop Web Crowler</title>
		<LINK REL=STYLESHEET HREF="bootstrap.min.css" TYPE="text/css">
		<LINK REL=STYLESHEET HREF="admin.css" TYPE="text/css">
	</head>

	<body>
	<center>
	<br><br>
	
	<fieldset style="width:30%;"><legend><b>Betop Web crowler</b></legend>
	<form action="auth.php" method="post">
	
	<table>
	<tr><td>Username</td><td><input type="text" name="user"></td></tr>
	<tr><td>Password</td><td><input type="password" name="pass"></td></tr>
	<tr><td></td><td><input type="submit" value="Log in" id="submit"></td>
	</tr></table>
	</form>
	</fieldset>
	</center>
	<script src="bootstrap.min.js"></script>
	</body>
	</html>
	<?php 
	exit();
}


$settings_dir = "../settings";
include "$settings_dir/database.php";

?>