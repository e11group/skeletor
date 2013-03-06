<?php
//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Admin Routes
     *
     *
    */

    
    // template
	Flight::route('/templates/models',  array('\Weather\Skeletor\Controllers\Admin\Items','retreiveAll'));
	Flight::route('/templates/model',  array('\Weather\Skeletor\AdminTemplateController','create'));
	Flight::route('/templates/model/@id',  array('\Weather\Skeletor\AdminTemplateController','retreive'));
	Flight::route('POST /templates/model/@id',  array('\Weather\Skeletor\AdminTemplateController','update'));


    Flight::route('GET /api/templates',  array('\Weather\Skeletor\Controllers\API\Templates','getAll'));
    Flight::route('POST /api/templates/template',  array('\Weather\Skeletor\AdminTemplateController','create'));

?>