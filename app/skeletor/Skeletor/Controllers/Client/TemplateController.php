<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class TemplateController
{
       
    public static function view_all() 
    {
      // validate login
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('customer', 'admin'));
      // caching
      \Flight::etag('skeletor-client-view-templates');
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
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'template');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }


    public static function add() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'template');
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);
      Print $request;
    } 


    public static function edit($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'templates/' . $id);
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);

      Print $request;
    }

    public static function edit_view($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
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
