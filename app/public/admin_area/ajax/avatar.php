<?php
require_once('../config/connection.php');

//DB::getInstance()->update("users",$id,["avatar"=>]);

$id = $_GET['id'];

$q = "SELECT avatar FROM users WHERE id = $id";

$r = mysqli_query($dbc, $q);

$data = mysqli_fetch_assoc($r);

?>
