<?php
namespace Skeletor\Controllers\API;

class ResponseController
{

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

      public static function respond($data) 
      {
        
        $http_headers = \Flight::request();    

          // shitty little switcher
          $isHtml = strpos($http_headers->accept, 'text/html');
          $isJson = strpos($http_headers->accept, 'application/json');
          if ($isHtml !== false) {
              // load our server side client
              Print \Skeletor\Views\Client\TemplatesView::load_page('Template', $data);
          } elseif ($isJson !== false) {
              // json encode
              $templates = json_encode($data);
              // TODO replace this with aura response system
              \Flight::json(array($templates));
          }
      }
    }