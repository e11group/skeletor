<?php
//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Admin Routes
     *
     *
    */

    
    // template

    // header types

    $texthtml = 'text/html';
    $textjson = 'text/json';

	$request = Flight::request();

	var_dump($request);
	foreach ($request as $n => $row) {

		if ($n == 'accept') {

			$accept_header = $row;
		}
	     //$accept_header = $n == 'accept' ? $row : null;
	}

	$accept_header = empty($accept_header) ? 'text' : $accept_header;
	
	if (strlen(strstr($accept_header,$texthtml)) > 0) {

    Flight::route('GET /api/templates',  array('\Skeletor\Controllers\API\Templates','getAll'));

	}
    Flight::route('POST /api/templates/template',  array('\Skeletor\AdminTemplateController','create'));

?>