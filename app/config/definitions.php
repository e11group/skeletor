<?php

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
define('ROUTE_DIR', '../app/routes/');
define('CLASS_DIR', '../app/classes/');
define('VENDOR_DIR', '../vendor/');

define('BASE_URL', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$routes = explode('/', str_replace($_SERVER['HTTP_HOST'], '', BASE_URL));

if (isset($routes[3])) {
define('PAGE_TITLE', ucwords($routes[3])); 
} else {
define('PAGE_TITLE', 'LeaderTech'); 
}

?>
