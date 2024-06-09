<?php

defined('_SECURE_') or die('Trying to access secured file, SORRY');

class Config {
    public static function get($path = null) {
        if ($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach($path as $bit) {
                if(isset($config[$bit])) {
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}
?>