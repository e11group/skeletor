<?php
namespace Skeletor\Controllers\API;


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin All Page Controller
     *
     *
    */


class TemplateController
{
       
    public static function find_all() {

      //caching
      \Flight::etag('skeletor-admin-view-template');

      // do business logic and load into model, fetch model
      // build transaction
      // TODO inject entity manager with dic
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->findAll();


      // make this into a helper method

      $accept_header = \Flight::request();
      $isHtml = strpos($accept_header->accept, 'text/html');
      $isJson = strpos($accept_header->accept, 'application/json');
      if ($isHtml !== false) {
          // load our server side client
          Print \Skeletor\Views\API\TemplatesView::load_page('Template', $select);
      } elseif ($isJson !== false) {
          // json encode
          $templates = json_encode($select);
          // TODO replace this with aura response system
          \Flight::json(array($templates));
      }
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
