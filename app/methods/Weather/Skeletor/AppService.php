<?php

namespace Weather\Skeletor;

class AppService

{

    public static function loadRoutes() {



        $models_dir = '../app/models/';

        $models = directoryToArray($models_dir, true);

        foreach ($models as $model) {

         $is_php = substr($model, -3);  

            if($is_php == 'php') {
        
                //include($model);

         }

      }

      // and now the controllers

        $controllers_dir = '../app/controllers/';

        $controllers = directoryToArray($controllers_dir, true);

        foreach ($controllers as $c0ntroller) {

         $is_php = substr($controller, -3);  

            if($is_php == 'php') {
        
                //include($model);

         }

      }

    }

    public static function bootstrapDBAL() {
    
      $config = new \Doctrine\DBAL\Configuration();

      $connectionParams = array(
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => 'Xrxa5J2vCqCS',
        'dbname' => 'skeletor'
      );
    
      $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
  
      return $conn;

    }

 
    public static function loadView($retreive = '') {

          // sidebar title
      $pages_active = 'true';
  
      // menu type
      $menu_no = 'pages';

       // subheader
      $template_subheader = 'View All Pages';

      // page variables array
      $page_variables = array( 

      'alert' => $alert,
      //'employees' => $template_data['employees'],
      'tablesorter_pager' => $tablesorter_pager,
      'www' => WWW,
      'sidebar' => $admin_sidebar,
      'subheader' => $template_subheader,
      'table_head' => $template_data['table_head'],
      'table_body' => $template_data['table_body']

     )

        include_once VIEW_INC_DIR . 'head.php';

  include_once VIEW_INC_DIR . 'header.php';

  include_once INC_DIR . 'tablesorter_pager.php';

  include_once INC_DIR . 'page.php';

  include_once INC_DIR . 'subheader.php';

  include_once INC_DIR . 'admin_sidebar.php';

    include_once VIEW_INC_DIR . 'footer.php';

      Flight::view()->set("someVar", "Hello, World!");
      Flight::render("templates/add_page", $page_variables);




    }


}