<?php
namespace Skeletor\Controllers\API;
use \Skeletor\API;
use \Skeletor\Package;

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
//      \Flight::etag('skeletor-admin-view-template');
      // fetch model data

      include '../app/skeletor/Skeletor/Abstract/AbstractEntity.php';
      include '../app/skeletor/Skeletor/Interfaces/API/TemplateInterface.php';
      include '../app/skeletor/Skeletor/Models/API/TemplateModel.php';
        include '../app/skeletor/Skeletor/Methods/Container/Container.php';

      //include '../app/skeletor/Skeletor/Methods/jsonService.php';

      $templateOne = new \Skeletor\API\TemplateModel('title', 'content');
      $templateTwo = new \Skeletor\API\TemplateModel('title2', 'content2');

      $templates = array($templateOne, $templateTwo);


      $templates = json_encode($templates);

      //echo $templates;
  
      \Flight::json($templates);
   
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
