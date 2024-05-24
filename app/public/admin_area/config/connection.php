<?php
//defined('_SECURE_') or die('Trying to access secured file, SORRY');

# Database Connection Here...
//$dbc = mysqli_connect(Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/db')) OR die('Could not connect because: '.mysqli_connect_error());
$dbc = mysqli_connect('localhost', 'root', '', 'regixtdb') OR die('Could not connect because: '.mysqli_connect_error());

?>