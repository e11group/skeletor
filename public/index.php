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

    // all hail WingCommander
	WingCommander::init();


        Flight::route('/items',  array('\Skeletor\Controllers\Items\Items','get_items_page'));
        Flight::route('/api/templates',  array('\Skeletor\Controllers\API\Templates','retreiveAll'));


    // lift off
	Flight::start();
