<?php
	$database="registrationbetop";
	$mysql_user = "root";
	$mysql_password = ""; 
	$mysql_host = "localhost";
	$mysql_table_prefix = "";

	$connection = null;
 
	function __construct($mysql_host, $mysql_user, $mysql_password, $database) {
		if (!$connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password)) {
			exit('Error: Could not make a database connection using ' . $mysql_user . '@' . $mysql_host);
		}

		if (!mysqli_select_db($connection, $database)) {
			exit('Error: Could not connect to database with user ' . $mysql_user .' password '.$mysql_password);
			//exit('Error: Could not connect to database ' . $database);
		}
		return $connection;
	}
	print_r($connection); 
/* 	echo "\nDONE";
	die();
	$success = mysqli_connect($mysql_host, $mysql_user, $mysql_password);
	if (!$success)
		die ("<b>Cannot connect to database, check if username, password and host are correct.</b>");
        //echo $database;
		$success = mysqli_select_db ($database,$success);
	if (!$success) {
		print "<b>Cannot choose database, check if database name is correct.";
		die();
	} */
?>

