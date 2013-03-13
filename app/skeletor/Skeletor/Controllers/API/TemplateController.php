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

      // do business logic and load into model, fetch model
      // build transaction
      // TODO inject entity manager with di
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->findAll();
      
      \Skeletor\Controllers\API\ResponseController::respond($select);

  
    }


    public static function find_by_id($id) {

      //caching
      \Flight::etag('skeletor-admin-template-' . $id);
       // do business logic and load into model, fetch model
      // build transaction
      $em = \Flight::get('em');
      $mapper = new \Skeletor\Mappers\API\TemplateMapper($em);
      $select = $mapper->findById($id);

      // json encode
      $templates = json_encode($select);
      // send json
      // TODO replace this with aura response system
      \Flight::json(array($templates));
    }


    public static function create($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }


    public static function update($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }

        public static function delete($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }


}

?>
