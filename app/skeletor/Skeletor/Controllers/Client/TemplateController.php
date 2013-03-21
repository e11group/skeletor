<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class TemplateController
{
       
    public static function view_all() 
    {
      // caching
      \Flight::etag('skeletor-client-view-templates');

      $validated = \Skeletor\Methods\UserService::authenticate_login();
      if ($validated == null) {
         $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';
         $response = $http->newResponse();
         $response->headers->set('Location', 'http://google.com');
         $http->send($response);
      }
      // let the real work go to building requests
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'templates');
      // set properties
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      // send request
      $request = $request_controller->request();
      // print it
      // TODO probably a better way to do this
      Print $request;
    }


    public static function add_view() {
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'template');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }


    public static function add() {
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'template');
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);
      Print $request;
    } 


    public static function edit($id) {
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'templates/' . $id);
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);

      Print $request;
    }

    public static function edit_view($id) {
      \Flight::etag('skeletor-client-edit-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'templates/' . $id);
      if (isset($_GET['method']) && ($_GET['method'] == 'delete')) {
          $set_method = $request_controller->setMethodHeader('METHOD_DELETE');
          $set_method = $request_controller->setAcceptHeader('text/html');
          $request = $request_controller->request('delete');


      }
      else {
          $set_method = $request_controller->setMethodHeader('METHOD_GET');
          $set_method = $request_controller->setAcceptHeader('text/html');
          $request = $request_controller->request();

      }
      Print $request;
    }


}

?>
