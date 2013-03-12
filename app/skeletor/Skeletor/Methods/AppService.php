<?php

namespace Skeletor\Methods;

class AppService

{

   
 public static function createNameVariety($page_name) 
    {


      $page_name_arr = array(

        'lower_name_ess' => strtolower($page_name) . 's',
        'upper_name_ess' => strtoupper($page_name) . 's',
        'ucName_ess' => ucwords($page_name) . 's',
        'lower_name' => strtolower($page_name),
        'upperName' => strtoupper($page_name),
        'ucName' => ucwords($page_name)

      );
      
      return $page_name_arr;

    }


  public static function getGlobals()
  {

          \Flight::view()->set("style", STYLE_DIR);
          \Flight::view()->set("components", COMPONENTS_DIR);
          \Flight::view()->set("scripts", SCRIPTS_DIR);

  }

  public static function hashHMAC($data, $api_client_key = null) 
  {

    $api_key = $api_client_key; 
    if (empty($api_key)) { $api_key = \Flight::get('api-private-key'); }
    if (empty($api_key)) {
    
      $response = $this->http->newResponse();
      $response->headers->set('Content-Type', 'application/json');
    $response->setStatusCode(400);
      $this->http->send($response);
      exit;

    }
    return hash_hmac("sha256", $data, $api_key, $raw_output = false);

  }

}