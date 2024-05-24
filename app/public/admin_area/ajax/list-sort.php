<?php

//require_once('../config/connection.php');

$list = $_GET['list'];

//print_r($list);


foreach ($list as $position => $id) {
	
	$q = "UPDATE navigation SET position = $position WHERE parent_position = 0 AND id = $id";
	$r = mysqli_query($dbc,$q);
	
	echo mysqli_error($dbc);
	
}

$row = $_GET['row'];

foreach ($row as $position => $rid) {
	
	$q = "UPDATE navigation SET parent_position = $id WHERE parent_position != 0";
	$r = mysqli_query($dbc, $q);
	
	echo mysqli_error($dbc);
	
	
}



?>