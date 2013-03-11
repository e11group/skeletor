<?php
namespace Skeletor\Controllers\API;


//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin All Page Controller
     *
     *
    */


class Templates
{
       
    public static function retreiveAll() {


      //caching
      \Flight::etag('skeletor-admin-view-template');

      // do business logic and load into model, fetch model
      // build transaction
      $em = \Flight::get('em');
      $mapper = new \Skeletor\Mappers\API\TemplateMapper($em);
      $select = $mapper->findAll();

      // run transaction
      $template = $mapper->run();
      // json encode
      $templates = json_encode($template);
      // send json
      // TODO replace this with aura response system
      \Flight::json(array($templates));
    }


    public static function create($id) {

      //caching
      \Flight::etag('skeletor-admin-view-template');

      // fetch model data
      $templateOne = new Template('title', 'content');

      $templates = array($templateOne);
  
      return \Skeletor\Views\Admin\Layout\AllItems::load('Page', $templates);
   
    }


    public static function retreive($id) {

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

}

?>
