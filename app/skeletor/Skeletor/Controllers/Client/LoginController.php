<?php
namespace Skeletor\Controllers\Client;

class LoginController
{

	public function __construct()
	{

	}

	public static function login() 
    {

      \Flight::etag('skeletor-client-view-login');
              var_dump(\Flight::request());
var_dump(getallheaders());
      Print \Skeletor\Views\Client\LoginView::login('Login', array());

    }

    public static function process_login()
    {

      
      $mapper = new \Skeletor\Mappers\API\LoginMapper();
      $e = $mapper->setEmail($_POST['email']);
      $p = $mapper->setPW($_POST['password']);
      $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';
      $response = $http->newResponse();
      if($mapper->login()) {
        $response->headers->set('Location', 'admin/dashboard');
      } else {
        $response->headers->set('Warning', 'login fail');
        $response->headers->set('Location', 'login');
      }
     $http->send($response);
    }

 }
