<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class OrdersController
{
       
    public static function find_all() 
    {
      // validate login
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));

      // caching
      \Flight::etag('skeletor-client-view-templates');
      // let the real work go to building requests
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'customers');
      // set properties
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      
      // send request
      $request = $request_controller->request();
      // print it
      // TODO probably a better way to do this
      Print $request;
    }


    public static function find_history_by_id() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'template');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }



    public static function find_by_id() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'template');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }



}

?>
