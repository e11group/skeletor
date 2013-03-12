<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class ClientController
{
       
    public static function find_all() 
    {

      //caching
      \Flight::etag('skeletor-client-view-template');

       // sessions
      // TODO yea yea di that shit
 /*
  $session = new \mjohnson\resession\Resession(array(
    'security' => \mjohnson\resession\Resession::SECURITY_HIGH,
    'cookies' => false,
    'name' => 'Skeletor'
  ));

*/
      $api_service = \Flight::get('api-service');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( $api_service . 'templates');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('application/json');
      $request = $request_controller->request();
      Print $request;
 
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
