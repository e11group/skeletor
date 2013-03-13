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

          // sidebar title
      $pages_active = 'true';  
      // menu type
      $menu_no = $page_name['lower_name_ess'];
         
       // subheader
      $template_subheader = 'View All '. $page_name['upper_name_ess'];




$formFactory = \Flight::get('form-factory');
// Create our first form!
$form = $formFactory->createBuilder()
    ->add('firstName', 'text', array(
        'constraints' => array(
            new NotBlank(),
            new MinLength(4),
        ),
    ))
    ->add('lastName', 'text', array(
        'constraints' => array(
            new NotBlank(),
            new MinLength(4),
        ),
    ))
    ->add('gender', 'choice', array(
        'choices' => array('m' => 'Male', 'f' => 'Female'),
    ))
    ->add('newsletter', 'checkbox', array(
        'required' => false,
    ))
    ->getForm();

if (isset($_POST[$form->getName()])) {
    $form->bind($_POST[$form->getName()]);

    if ($form->isValid()) {
        var_dump('VALID', $form->getData());
        die;
    }
}

//var_dump($form);

var_dump($form->createView());


      // set any last minute variables
      // main view body
      \Flight::view()->display("admin/layout/layout.html", array(
    'form' => $form->createView()), 'body_content');
      // required admin header nav 
     // \Flight::view()->display('admin/layout/header.html', array('style' => STYLE_DIR), 'header_content');
      // optional subheader template component
     // \Flight::view()->display('admin/layout/subheader.html', array('heading' => 'Hello'), 'subheader_content');
      // required admin sidebar
    //  \Flight::render('layout/admin_sidebar.html', array('heading' => 'Hello'), 'sidebar_content');
      // required admin footer
     // \Flight::view()->display('admin/layout/footer.html', array('footer' => 'World'), 'footer_content');
      /* add any additional template components here

      

      */
      // main admin layout
    //  \Flight::render('admin/layout/layout.html', array('title' => 'Home Page'));
    }



    public static function loadAddTemplate($page_name, $page_variables) 
    {
      
      // main view body
      \Flight::render("templates/view_page_body.html", $page_variables, 'body_content');

      // required admin header nav 
      \Flight::render('layout/admin_header.html', array('heading' => 'Hello'), 'header_content');

      // optional subheader template component
      \Flight::render('layout/admin_subheader.html', array('heading' => 'Hello'), 'subheader_content');
      
      // required admin sidebar
    //  \Flight::render('layout/admin_sidebar.html', array('heading' => 'Hello'), 'sidebar_content');

      // required admin footer
      \Flight::render('layout/admin_footer.html', array('footer' => 'World'), 'footer_content');

      /* add any additional template components here

      

      */

      // main admin layout
      \Flight::render('layout/admin_layout.html', array('title' => 'Home Page'));
    }

    
    public static function loadEditTemplate($page_name, $page_variables) 
    {

            // main view body
      \Flight::render("templates/view_page_body.html", $page_variables, 'body_content');

      // required admin header nav 
      \Flight::render('layout/admin_header.html', array('heading' => 'Hello'), 'header_content');

      // optional subheader template component
      \Flight::render('layout/admin_subheader.html', array('heading' => 'Hello'), 'subheader_content');
      
      // required admin sidebar
    //  \Flight::render('layout/admin_sidebar.html', array('heading' => 'Hello'), 'sidebar_content');

      // required admin footer
      \Flight::render('layout/admin_footer.html', array('footer' => 'World'), 'footer_content');

      /* add any additional template components here

      

      */

      // main admin layout
      \Flight::render('layout/admin_layout.html', array('title' => 'Home Page'));

    }

    
    public static function loadDeleteTemplate($page_name, $page_variables) 
    {

            // main view body
      \Flight::render("templates/view_page_body.html", $page_variables, 'body_content');

      // required admin header nav 
      \Flight::render('layout/admin_header.html', array('heading' => 'Hello'), 'header_content');

      // optional subheader template component
      \Flight::render('layout/admin_subheader.html', array('heading' => 'Hello'), 'subheader_content');
      
      // required admin sidebar
    //  \Flight::render('layout/admin_sidebar.html', array('heading' => 'Hello'), 'sidebar_content');

      // required admin footer
      \Flight::render('layout/admin_footer.html', array('footer' => 'World'), 'footer_content');

      /* add any additional template components here

      

      */

      // main admin layout
      \Flight::render('layout/admin_layout.html', array('title' => 'Home Page'));

    }




}