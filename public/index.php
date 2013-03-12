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

   

    // all hail WingCommander
	WingCommander::init();


        Flight::route('/items',  array('\Skeletor\Controllers\Items\Items','get_items_page'));

        Flight::route('GET /api/templates',  array('\Skeletor\Controllers\API\TemplateController','find_all'));
        Flight::route('POST /api/templates',  array('\Skeletor\Controllers\API\TemplateController','create'));
        Flight::route('GET /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','find_by_id'));
        Flight::route('POST /api/templates/@id',  array('\Skeletor\Controllers\API\TemplateController','update'));




        Flight::route('GET /admin/templates',  array('\Skeletor\Controllers\Client\ClientController','find_all'));


    Flight::set('api-service','http://localhost/skeletor/public/api/');
    Flight::set('api-private-key', 'P4p79B9N369w48z9Qrcf8sRk29gVJUKX');
    Flight::set('api-public-key', 'uH9UVCSJ5yV3jo7VZi7jPXyfLzxmga54');
      $query = \Flight::set('api-phrase', 'Skeletor');




    // lift off
	Flight::start();
