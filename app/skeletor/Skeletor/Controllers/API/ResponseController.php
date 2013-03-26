<?php
namespace Skeletor\Controllers\API;

class ResponseController
{

  public static function beginTransaction()
  {
      $request = \Flight::request();
      $body = $request->body;
      $service = new \Skeletor\Services\Bootstrap;
      $em = $service->getEM();
      $em->getConnection()->beginTransaction();
  }
  public static function authenticate()
  {    

    // yea yea un static and make into di
    $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';

    if(empty($_SERVER['PHP_AUTH_USER']) || (empty($_SERVER['PHP_AUTH_PW'])))  
    {  
               
      // TODO add these request calls to di    

        $response = $http->newResponse();
        $response->setStatusCode(401);
        $http->send($response);
       
        exit;
    } else {

       $client_key = $_SERVER['PHP_AUTH_USER'];
       $client_phrase = $_SERVER['PHP_AUTH_PW'];       

       // TODO replace with di
       $em = \Flight::get('em');
       $query = $em->createQuery("SELECT u FROM Skeletor\Entities\Client\Clients u WHERE u.public_key = '$client_key'");
           $users = $query->getResult();       
       foreach($users as $row) {       
         $private = $row->private_key;
       }
       if(!empty($private)) {       

             $query = \Flight::get('api-phrase');       
             $query = \Skeletor\Methods\AppService::hashHMAC($query, $private);       
             if ($query == $client_phrase){       
             }        
             else {
                $response = $http->newResponse();
                $response->setStatusCode(401);
                $http->send($response);
                exit;
             }    

        } else {       
                $response = $http->newResponse();
                $response->setStatusCode(401);
                $http->send($response);
                exit;       
          }    
        }    
      }    

      public static function respond($data, $view = null) 
      {
        $http_headers = \Flight::request();
        $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';

          // shitty little switcher

          $isHtml = strpos($http_headers->accept, 'text/html');
          $isJson = strpos($http_headers->accept, 'application/json');
          if ($isHtml !== false) {
              // load our server side client
            switch ($view) {
                case 'dump':
                    Print $data;
                    break;
                case 200:
                      $response = $http->newResponse();
                      $response->setStatusCode(200);
                      $response->headers->set('Content-Type', 'text/plain');
                      $http->send($response);
                    break;
                case 204:
                      $response = $http->newResponse();
                      $response->setStatusCode(204);
                      $http->send($response);
                    break;
                case 400:
                      $response = $http->newResponse();
                      $response->setStatusCode(400);
                      $http->send($response);
                    break;
            }
          } elseif ($isJson !== false) {
              // json encode
              $templates = json_encode($data);
              \Flight::json(array($templates));
          }
      }
    }