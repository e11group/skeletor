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
      $request = \Flight::request();
      $body = $request->body;
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      if ($select = $mapper->insert($body)) {   
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
      
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
      $request = \Flight::request();
      $body = $request->body;
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      if ($select = $mapper->update($id, $body)) {
          //commit
          $mapper->commit();
          // grab view    
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
      
    }

  

    public static function delete($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
       $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }

}

?>
