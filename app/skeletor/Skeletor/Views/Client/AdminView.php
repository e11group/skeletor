<?php
namespace Skeletor\Views\Client;

use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\NotBlank;



class AdminView

{


    public static function view_all($page_name, $page_variables, $addable = true) 
    {

     $page_name = \Skeletor\Methods\AppService::createNameVariety($page_name);
     
      $data = array(
          'page_name' => \Flight::get('formal-name'),
          'url' => \Flight::get('url'),
          'data' => $page_variables,
          'section' => 'store',
          'resource_name' => $page_name['resource'],
          'encoded_name' => $page_name['encoded'],
          'first' => $page_name['first'],
          'encoded_first' => $page_name['encoded_first'],
          'template_name' => 'admin/views/'.$page_name['template'].'.html',
          'addable' => $addable,
          'user' => \Flight::get('client-email'),
          'store_active' => 'active',
          'message' => isset($message) ? $message : ''
        );
     
      try {       
         \Flight::view()->display("admin/layout/view_layout.html",$data);
      } catch (\Twig_Error $e) {       
        throw $e;
      }

    }

    public static function view_form($page_name, $page_variables, $addable = true) 
    {

     $page_name = \Skeletor\Methods\AppService::createNameVariety($page_name);


      $factory = '\Skeletor\Forms\Factories\\' .$page_name['resource'];
      $formFactory = new $factory;
      $form = $formFactory->build($page_variables);
      $data = array(
          'form' => $form->createView(),
          'page_name' => \Flight::get('formal-name'),
          'url' => \Flight::get('url'),
          'data' => $page_variables,
          'resource_name' => $page_name['resource'],
          'encoded_name' => $page_name['encoded'],
          'first' => $page_name['first'],
          'encoded_first' => $page_name['encoded_first'],
          'template_name' => 'admin/forms/'.$page_name['template'].'.html',
          'addable' => $addable,
          'user' => \Flight::get('client-email'),
          'store_active' => 'active',
          'message' => isset($message) ? $message : ''

        );

      try {       
         \Flight::view_form()->display("admin/layout/form_layout.html",$data);
      } catch (\Twig_Error $e) {       
        throw $e;
      }

    }

    public static function view_data($page_name, $page_variables, $addable = true) 
    {
     $page_name = \Skeletor\Methods\AppService::createNameVariety($page_name);
var_dump($page_variables);
      $data = array(
          'page_name' => \Flight::get('formal-name'),
          'url' => \Flight::get('url'),
          'data' => $page_variables,
          'section' => 'store',
          'resource_name' => $page_name['resource'],
          'encoded_name' => $page_name['encoded'],
          'first' => $page_name['first'],

          'encoded_first' => $page_name['encoded_first'],
          'template_name' => 'admin/data/'.$page_name['template'].'.html',
          'addable' => $addable,
          'user' => \Flight::get('client-email'),
          'store_active' => 'active',
          'message' => isset($message) ? $message : ''

        );

      try {       
         \Flight::view()->display("admin/layout/data_layout.html",$data);
      } catch (\Twig_Error $e) {       
        throw $e;
      }

    }



}