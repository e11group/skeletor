<?php

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Load up
     *
     *
    */

    // definitions
    require_once '../app/config/definitions.php';

    // autoloader
    require_once '../bootstrap.php';

	// helper functions
	require_once INC_DIR . 'helper.php';

    // sessions
    use mjohnson\resession\Resession;
 
	$session = new Resession(array(
		'security' => Resession::SECURITY_HIGH,
		'cookies' => true,
		'name' => 'Skeletor'
	));

    $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';
   

$request = $http->newRequest();

$request->setUrl('https://api.github.com/orgs/auraphp/repos');
$stack = $http->send($request);
$repos = json_decode($stack[0]->content);
foreach ($repos as $repo) {
    echo $repo->name . PHP_EOL;
}

    /**
     *
     * and Launch
     *
     *
    */


    // all hail WingCommander
	WingCommander::init();

    // ready ...
    Weather\Skeletor\appService::loadRoutes();

    // lift off
	Flight::start();

    //new Weather\Skeletor\Models\Test::get();
