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
    require_once VENDOR_DIR . 'autoload.php';

    // configuration
	require_once CONFIG_DIR . 'config.php';

	// helper functions
	require_once INC_DIR . 'helper.php';

    // sessions
    use mjohnson\resession\Resession;
 
	$session = new Resession(array(
		'security' => Resession::SECURITY_HIGH,
		'cookies' => true,
		'name' => 'Skeletor'
	));

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
