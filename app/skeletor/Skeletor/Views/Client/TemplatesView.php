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


    public static function load_page($page_name, $page_variables) 
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
      $form = $formFactory->build();


try { 

   \Flight::view_form()->display("admin/layout/layout.html",array(
    'form' => $form->createView(),
    'title' => 'title',
    'www' => WWW
        )
      );


} catch (\Twig_Error $e) { 

  echo 'error';
   }


    }



    public static function loadAddTemplate($page_name, $page_variables) 
    {
      
    
    }

    
    public static function loadEditTemplate($page_name, $page_variables) 
    {


    }

    
    public static function loadDeleteTemplate($page_name, $page_variables) 
    {

            // main view body
    

    }




}