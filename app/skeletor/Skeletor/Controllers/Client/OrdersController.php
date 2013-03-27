<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class CouponsController
{
       
    public static function find_all() 
    {
      // validate login
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));

      // caching
      \Flight::etag('skeletor-client-view-orderss');
      // let the real work go to building requests
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/orders');
      // set properties
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      
      // send request
      $request = $request_controller->request();
      // print it
      // TODO probably a better way to do this
      Print $request;
    }

    public static function find_by_id($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-orders');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/orders/'  . $id);
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }

    public static function create_view() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-view-orders');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/order');
      $set_method = $request_controller->setMethodHeader('METHOD_GET');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request();
      Print $request;
    }


    public static function create() {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/order');
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);
      Print $request;
    } 


    public static function update($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/orders/' . $id);
      $set_method = $request_controller->setMethodHeader('METHOD_POST');
      $set_method = $request_controller->setAcceptHeader('text/html');
      $request = $request_controller->request($_POST);

      Print $request;
    }


    public static function delete($id) {
      $validated = \Skeletor\Methods\UserService::authenticate_login(array('admin'));
      \Flight::etag('skeletor-client-edit-template');
      $request_controller = new \Skeletor\Controllers\Client\RequestController( API_LOC . 'store/orders/' . $id);
          $set_method = $request_controller->setMethodHeader('METHOD_DELETE');
          $set_method = $request_controller->setAcceptHeader('text/html');
          $request = $request_controller->request('delete');

      Print $request;
    }



}

?>
