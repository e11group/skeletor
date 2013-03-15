<?php
namespace Skeletor\Controllers\API;


class TemplateController
{

    public function __construct()
    {

    }
       
    public static function find_all() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-template');
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->findAll();
      \Skeletor\Controllers\API\ResponseController::respond($select, 'view_all');
    }

    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-template-' . $id);
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->findById($id);
      \Skeletor\Controllers\API\ResponseController::respond($select, 'view_item');

    }


    public static function create() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-view-template');
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->findAll();
      \Skeletor\Controllers\API\ResponseController::respond($select, 'view_all');
   
    }


    public static function create_view() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
     \Flight::etag('skeletor-admin-view-template');

      \Skeletor\Controllers\API\ResponseController::respond(array(), 'view_item');

      // grab view

   
    }



    public static function edit($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->update($id);
      \Skeletor\Controllers\API\ResponseController::respond($select, 204);


      // grab view

   
    }

  


}

?>
