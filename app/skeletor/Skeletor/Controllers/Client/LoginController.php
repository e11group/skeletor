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
      $request = \Flight::request();
      $referrer = $request->referrer;
      if (empty($referrer)) {
      Print \Skeletor\Views\Client\LoginView::login('Login', array());
      } else {
      Print \Skeletor\Views\Client\LoginView::login('Login', array('message' => 'Login Attempt Failed'));
      }

    }

    public static function process_login()
    {
          
      $mapper = new \Skeletor\Mappers\API\LoginMapper();
      $email = $mapper->setEmail($_POST['email']);
      $pw = $mapper->setPW($_POST['password']);
      $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';
      $response = $http->newResponse();
      if($mapper->login()) {
        $response->headers->set('Location', 'admin/dashboard');
      } else {
        $response->headers->set('Location', 'login');
      }
     $http->send($response);
    }

 }
