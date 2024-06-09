<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
ob_start();

$user = new User();
$user->logout();

Redirect::to('home');

ob_clean;
?>