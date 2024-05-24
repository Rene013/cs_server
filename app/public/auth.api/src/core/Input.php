<?php

namespace src\core;

class Input {
    
    public static function exists($type = 'POST') {
        switch($type) {
            case 'POST':
                return (!empty($_POST)) ? true : false;
                break;
            case 'GET':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($item) {
        if(isset($_POST[$item])) {
            return self::xssClean($_POST[$item]);
        } else if(isset($_GET[$item])) {
            return  self::xssClean($_GET[$item]);
        }

        return '';
    }

    /**
	 * Clean data for XSS
	 *
	 * @param   string|array    $str
	 * @return  mixed
	 */
	static public function xssClean($str = '') {
		// No data? We're done here
		if (is_string($str) && trim($str) === '') {
			return $str;
		}

		// Recursive sanitize if this is an array
		if (is_array($str)) {
			foreach ($str as $key => $value) {
				$str[$key] = self::xssClean($value);
			}

			return $str;
		}

		$str = str_replace(array(
			'&amp;',
			'&lt;',
			'&gt;'
		), array(
			'&amp;amp;',
			'&amp;lt;',
			'&amp;gt;'
		), $str);

		// Fix &entitiy\n;
		$str = preg_replace('#(&\#*\w+)[\x00-\x20]+;#u', '$1;', $str);
		$str = preg_replace('#(&\#x*)([0-9A-F]+);*#iu', '$1$2;', $str);
		$str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');

		// remove any attribute starting with "on" or xmlns
		$str = preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', '$1>', $str);

		// remove javascript: and vbscript: protocol
		$str = preg_replace('#([a-z]*)[\x00-\x20\/]*=[\x00-\x20\/]*([\`\'\"]*)[\x00-\x20\/]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iUu', '$1=$2nojavascript...', $str);
		$str = preg_replace('#([a-z]*)[\x00-\x20\/]*=[\x00-\x20\/]*([\`\'\"]*)[\x00-\x20\/]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iUu', '$1=$2novbscript...', $str);
		$str = preg_replace('#([a-z]*)[\x00-\x20\/]*=[\x00-\x20\/]*([\`\'\"]*)[\x00-\x20\/]*-moz-binding[\x00-\x20]*:#Uu', '$1=$2nomozbinding...', $str);
		$str = preg_replace('#([a-z]*)[\x00-\x20\/]*=[\x00-\x20\/]*([\`\'\"]*)[\x00-\x20\/]*data[\x00-\x20]*:#Uu', '$1=$2nodata...', $str);

		// Remove any style attributes, IE allows too much stupid things in them, eg.
		// <span style="width: expression( alert( 'Ping!' ));"></span>
		// and in general you really don't want style declarations in your UGC
		$str = preg_replace('#(<[^>]+[\x00-\x20\"\'\/])style[^>]*>#iUu', '$1>', $str);

		// Remove namespaced elements (we do not need them...)
		$str = preg_replace('#</*\w+:\w[^>]*>#i', '', $str);

		// Remove really unwanted tags
		do {
			$oldstring = $str;
			$str = preg_replace('#</*(applet|meta|xml|blink|link|style|script|embed|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base)[^>]*>#i', '', $str);
		}
		while ($oldstring != $str);

		return $str;
	}
}