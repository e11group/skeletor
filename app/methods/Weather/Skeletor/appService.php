<?php

namespace Weather\Skeletor;

class appService

{

    public static function loadRoutes() {

  

        $controllers_dir = '../app/controllers/';

        $controllers = directoryToArray($controllers_dir, true);

        foreach ($controllers as $controller) {

         $is_php = substr($controller, -3);  

            if($is_php == 'php') {
        
                include($controller);

         }

      }


        $models_dir = '../app/models/';

        $models = directoryToArray($models_dir, true);

        foreach ($models as $model) {

         $is_php = substr($model, -3);  

            if($is_php == 'php') {
        
                include($model);

         }

      }

      // and now the routes

         // and now the routes

        $routes_dir = '../app/routes/';

        $routes = directoryToArray($routes_dir, true);

        foreach ($routes as $route) {

         $is_php = substr($route, -3);  

            if($is_php == 'php') {
        
                include($route);

         }

      }


      // views

      $views_dir = '../app/views/';

        $views = directoryToArray($views_dir, true);

        foreach ($views as $view) {

         $is_php = substr($view, -3);  

            if($is_php == 'php') {
        
                include($view);

         }

      }

    }

 static function createNameVariety($page_name) 
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


  static function getGlobals()
  {

          \Flight::view()->set("style", STYLE_DIR);
          \Flight::view()->set("components", COMPONENTS_DIR);
          \Flight::view()->set("scripts", SCRIPTS_DIR);

  }




}