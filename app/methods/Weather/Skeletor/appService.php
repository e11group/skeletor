<?php

namespace Weather\Skeletor;

class appService

{

    public static function loadRoutes() {



        $models_dir = '../app/models/';

        $models = directoryToArray($models_dir, true);

        foreach ($models as $model) {

         $is_php = substr($model, -3);  

            if($is_php == 'php') {
        
                include($model);

         }

      }

      // and now the pseudo-controllers "routes"

        $controllers_dir = '../app/routes/';

        $controllers = directoryToArray($controllers_dir, true);

        foreach ($controllers as $controller) {

         $is_php = substr($controller, -3);  

            if($is_php == 'php') {
        
                include($controller);

         }

      }

    }

    private static function createNameVariety($page_name) 
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

    public static function loadViewTemplate($page_name, $page_variables) 
    {

     
     $page_name = AppService::createNameVariety($page_name);

          // sidebar title
      $pages_active = 'true';
  
      // menu type
      $menu_no = $page_name['lower_name_ess'];

       // subheader
      $template_subheader = 'View All '. $page_name['upper_name_ess'];


      // set any last minute variables
      // Flight::view()->set("someVar", "Hello, World!");
      
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