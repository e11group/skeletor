<?php
namespace Weather\Skeletor;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin View Page Model
     *
     *
    */


class AdminAllView

{


    public static function load($page_name, $page_variables) 
    {

     
     $page_name = appService::createNameVariety($page_name);


          // sidebar title
      $pages_active = 'true';
  
      // menu type
      $menu_no = $page_name['lower_name_ess'];

       // subheader
      $template_subheader = 'View All '. $page_name['upper_name_ess'];

      echo appService::getGlobals();

      // set any last minute variables


      // main view body
      \Flight::render("admin/templates/view_page_body.html", $page_variables, 'body_content');

      // required admin header nav 
      \Flight::render('admin/layout/header.html', array('style' => STYLE_DIR), 'header_content');

      // optional subheader template component
      \Flight::render('admin/layout/subheader.html', array('heading' => 'Hello'), 'subheader_content');
      
      // required admin sidebar
    //  \Flight::render('layout/admin_sidebar.html', array('heading' => 'Hello'), 'sidebar_content');

      // required admin footer
      \Flight::render('admin/layout/footer.html', array('footer' => 'World'), 'footer_content');

      /* add any additional template components here

      

      */

      // main admin layout
      \Flight::render('admin/layout/layout.html', array('title' => 'Home Page'));

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