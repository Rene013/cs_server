<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');

function escape($string) {
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

function email($to, $subject, $body){
	mail($to, $subject, $body,'From: webmaster@betopcorporation.com');
}
function output_errors($errors){
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}

function get_slug($url) {
	
	$pos = strrpos($url, '/');
	$slug = substr($url, $pos + 1);
	
	return $slug;	
}

function selected($value1, $value2, $return) {
	
	if($value1 == $value2) {
		echo $return;
	}

}
?>