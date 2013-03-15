<?php
namespace Skeletor\Views\Client;

use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\NotBlank;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin View Page Model
     *
     *
    */


class TemplatesView

{


    public static function view_all($page_name, $page_variables) 
    {

     $page_name = \Skeletor\Methods\AppService::createNameVariety($page_name);


      // TODO partition this shit out to the various builders 
      /*********
      /* CONFIG STUFF
      /*
      */
      // sidebar title
      $pages_active = 'true';  
      // menu type
      $menu_no = $page_name['lower_name_ess'];
       // subheader
      $template_subheader = 'View All '. $page_name['upper_name_ess'];
     // Call your custom method
      $data = array(
          'title' => 'title',
          'uri' => 'http://localhost/skeletor/public/admin/templates',
          'www' => WWW,
          'subtext' => 'subtext',
          'table_pager' => \Flight::skeletor_view_table_pager(),
          'subheader' => \Flight::skeletor_view_subheader(),
          'data' => $page_variables
        );
      //$data =  array_merge($data, $page_variables);
      try {       
         \Flight::view()->display("admin/layout/view_layout.html",$data);
      } catch (\Twig_Error $e) {       
        echo 'error';
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
      // sidebar title
      $pages_active = 'true';  
      // menu type
      $menu_no = $page_name['lower_name_ess'];
       // subheader
      $template_subheader = 'View All '. $page_name['upper_name_ess'];
      // Set up Twig
       $formFactory = new \Skeletor\Forms\Factories\TemplateFactory();
      $form = $formFactory->build($page_variables);

      $data = array(
          'form' => $form->createView(),
          'title' => 'title',
          'uri' => 'templates',
          'www' => WWW,
          'subtext' => 'subtext',
          'table_pager' => \Flight::skeletor_view_table_pager(),
          'data' => $page_variables
        );
      //$data =  array_merge($data, $page_variables);
      try {       
         \Flight::view_form()->display("admin/layout/form_layout.html",$data);
      } catch (\Twig_Error $e) {       
        echo 'error';
      }

    }




}