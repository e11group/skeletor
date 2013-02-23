<?php

	error_reporting(E_ALL);
	
	ini_set('display_errors', '1');
	
	date_default_timezone_set('America/Los_Angeles');

define('ROOT', 'http://localhost/leadertech/');
define('WWW', '/leadertech/public/');
define('BASE', '/');
define('CONFIG_DIR', '../app/config/');
define('SCRIPTS_DIR', ROOT . 'javascripts/');
define('COMPONENTS_DIR', ROOT . 'components/');
define('STYLE_DIR', ROOT . 'stylesheets/');
define('INC_DIR', '../app/inc/');
define('VIEW_DIR', '../app/views/');
define('VIEW_INC_DIR', '../app/views/inc/');
define('MODELS_DIR', '../app/models/');
define('CONTROLLERS_DIR', '../app/controllers/');
define('METHODS_DIR', '../app/methods/');
define('VENDOR_DIR', '../vendor/');

define('BASE_URL', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$routes = explode('/', str_replace($_SERVER['HTTP_HOST'], '', BASE_URL));

if (isset($routes[3])) {
define('PAGE_TITLE', ucwords($routes[3])); 
} else {
define('PAGE_TITLE', 'LeaderTech'); 
}



?>
