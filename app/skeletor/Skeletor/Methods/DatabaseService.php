<?php
namespace Skeletor\Methods;

class DatabaseService
{

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
    
}

?>