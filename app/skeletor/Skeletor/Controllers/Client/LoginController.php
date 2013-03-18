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

    public function processLogin()
    {

      $mapper = new \Skeletor\Mappers\API\LoginMapper();
      $select = $mapper->login();
      $response = $http->newResponse();
      if($select) {
        $response->headers->set('Location', 'dashboard');
      } else {
        $response->headers->set('Location', 'login');
      }

     $http->send($response);


    }

 }
