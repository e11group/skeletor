<?php

namespace Skeletor\Methods;

class AppService

{

   
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