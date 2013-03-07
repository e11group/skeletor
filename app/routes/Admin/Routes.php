<?php
//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * Admin Routes
     *
     *
    */

    
    // template



    Flight::route('GET /api/templates',  array('\Weather\Skeletor\Controllers\API\Templates','getAll'));
    Flight::route('POST /api/templates/template',  array('\Weather\Skeletor\AdminTemplateController','create'));

?>