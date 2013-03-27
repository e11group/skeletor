<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class AccountController
{
       
  

    public static function find_by_id($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/accounts/'  . $id);
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }

    public static function view_dashboard() {

      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'dashboard');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }

        

    public static function view_store() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/account');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }


    

    public static function view_cms() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/account');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }



    public static function update($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/accounts/' . $id);
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);

      Print $request;
    }





}

?>
