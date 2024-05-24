<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
class Redirect {
    public static function to($location = null) {
        if($location) {
            if(is_numeric($location)) {
                switch($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        exit();
                    break;
                }
            }
            header('Location: '. $location);
            exit();
        }
    }
}