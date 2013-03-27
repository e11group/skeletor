<?php
namespace Skeletor\Views\Client;

use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\NotBlank;


class CustomersView

{


    public static function view_all($page_name, $page_variables) 
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
          'resource_name' => 'Customer',
          'encoded_name' => 'customer',
          'template_name' => 'admin/views/Customer.html',
          'addable' => false,
          'user' => \Flight::get('client-email'),
          'store_active' => 'active',
          'message' => isset($message) ? $message : ''
        );
      //$data =  array_merge($data, $page_variables);
      try {       
         \Flight::view()->display("admin/layout/view_layout.html",$data);
      } catch (\Twig_Error $e) {       
        throw $e;
      }

    }

    public static function view_item($page_name, $page_variables) 
    {

     $page_name = \Skeletor\Methods\AppService::createNameVariety($page_name);


      // TODO partition this shit out to the various builders 
      /*********
      /* CONFIG STUFF
      /*
      */
    
      // Set up Twig
      $formFactory = new \Skeletor\Forms\Factories\TemplateFactory();
      $form = $formFactory->build($page_variables);
      $data = array(
          'form' => $form->createView(),
          'page_name' => \Flight::get('formal-name'),
          'url' => \Flight::get('url'),
          'data' => $page_variables,
          'resource_name' => 'Template',
          'encoded_name' => 'template',
          'user_name' => \Flight::get('user_name'),
          'message' => isset($message) ? $message : ''

        );
      //$data =  array_merge($data, $page_variables);
      try {       
         \Flight::view_form()->display("admin/layout/form_layout.html",$data);
      } catch (\Twig_Error $e) {       
        throw $e;
      }

    }




}