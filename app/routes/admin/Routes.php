<?php
//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Admin Routes
     *
     *
    */

    
    // template
	Flight::route('/templates/models',  array('\Weather\Skeletor\AdminTemplateController','retreiveAll'));
	Flight::route('/templates/model',  array('\Weather\Skeletor\AdminTemplateController','create'));
	Flight::route('/templates/model/@id',  array('\Weather\Skeletor\AdminTemplateController','retreive'));
	Flight::route('POST /templates/model/@id',  array('\Weather\Skeletor\AdminTemplateController','update'));




?>