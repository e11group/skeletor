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

      
      $mapper = new \Skeletor\Mappers\API\LoginMapper($_POST['email'], $_POST['password']);
      $select = $mapper->login();
      $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';
      $response = $http->newResponse();
      if($select) {
        $response->headers->set('Location', 'admin/dashboard');
      } else {
        $response->headers->set('Location', 'login');
      }
     $http->send($response);
    }

 }
