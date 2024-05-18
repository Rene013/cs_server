<?php

session_start();
# Override the header
ob_start();
# Set error reporting
error_reporting(E_ALL);
# Require Autoload of all classes:

require_once __DIR__ . '/../vendor/autoload.php';

# Global Constants:
DEFINE('_SECURE_', 2);
DEFINE('D_TEMPLATE','template');
DEFINE('D_VIEW','views');
DEFINE('D_CONFIG','config');


# Global variables:

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'db',
        'username' => 'root',
        'password' => 'HenearkrxeRn0!#',
        'db' => 'regixtdb'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
	'uri_parts'=>array(
        'request'=>$_SERVER['REQUEST_URI'],
        'base'=> rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'),
        'all_parts'=> explode('/', iconv('ISO-8859-1', 'UTF-8', (substr(urldecode(explode('?', $_SERVER['REQUEST_URI'])[0]), strlen('base'))))),
        'last'=>explode('/', iconv('ISO-8859-1', 'UTF-8', (substr(urldecode(explode('?', $_SERVER['REQUEST_URI'])[0]), strlen('base')))))[count(explode('/', iconv('ISO-8859-1', 'UTF-8', (substr(urldecode(explode('?', $_SERVER['REQUEST_URI'])[0]), strlen('base'))))))-1]
    ),
    'locate_file'=> array(
        'direct_file' =>$_SERVER['QUERY_STRING'],
    )
);

require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}

$webSettings = new Websettings();
$debug = $webSettings->getDebugger();
$site_title = $webSettings->getSite_title(); 

$user = new User();
$data_user = $user->data();
?>