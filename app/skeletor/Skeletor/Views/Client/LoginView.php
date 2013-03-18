<?php
namespace Skeletor\Views\Client;

class LoginView

{

    public static function login($page_name, $page_variables) 
    {

     $page_name = \Skeletor\Methods\AppService::createNameVariety($page_name);


      // TODO partition this shit out to the various builders 
      /*********
      /* CONFIG STUFF
      /*
      */


     // Call your custom method
      $data = array(
          'page_name' => \Flight::get('formal-name'),
          'url' => \Flight::get('url'),
          'data' => $page_variables,
          'resource_name' => 'Template',
          'encoded_name' => 'template',
          'message' => isset($message) ? $message : ''
        );
      //$data =  array_merge($data, $page_variables);
      try {       
         \Flight::view()->display("client/login.html",$data);
      } catch (\Twig_Error $e) {       
        throw $e;
      }

    }

}