<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');

class View {
    public static function exists($slug) {
        return null != Config::get('uri_parts/last') ? true : false;
    }

    public static function get($slug) {
		if (empty(Config::get('uri_parts/last'))){
			return Input::get('page');
		}
        return Config::get('uri_parts/last');
    }
}

?>