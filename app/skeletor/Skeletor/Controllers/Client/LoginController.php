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
      Print \Skeletor\Views\Client\LoginView::login('Login', array());

    }

    public static function process_login()
    {

      
      $mapper = new \Skeletor\Mappers\API\LoginMapper();
      $select = $mapper->login();
      $e = $select->setEmail($_POST['email']);
      $p = $select->setPW($_POST['password']);
      $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';
      $response = $http->newResponse();
      if($select->login()) {
        $response->headers->set('Location', 'admin/dashboard');
      } else {
        $response->headers->set('Location', 'login');
      }
     $http->send($response);
    }

 }
