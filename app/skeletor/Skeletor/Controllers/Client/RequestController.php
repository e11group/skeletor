<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

class RequestController
{

  protected $http;
  protected $target;
  protected $method_header;
  protected $accept_header;


  public function __construct($target = null)
  {

  	// TODO add to DI
  	$this->http = include VENDOR_DIR . 'aura/http/scripts/instance.php';

  	if ($target == null) {
          throw new \InvalidArgumentException("The target is invalid.");
        } else {
          $this->target = $target;
        }
 

  }

  public function setMethodHeader($method)
  {

  	if (empty($method)) {
          throw new \InvalidArgumentException("The method is invalid.");
        } else {
  		  $this->method_header = $method;
        }


  }

  public function getMethodHeader()
  {

	if (empty($this->method_header)) {
          throw new \InvalidArgumentException("The method is invalid.");
        } else {
  	      return $this->method_header;
        }
  }

  public function setAcceptHeader($accept)
  {
	if (empty($accept)) {
          throw new \InvalidArgumentException("The accept header is invalid.");
        } else {
  		  $this->accept_header = $accept;
        }

  }

  public function getAcceptHeader()
  {
  	if (empty($this->accept_header)) {
          throw new \InvalidArgumentException("The accept header is invalid.");
        } else {
  	      return $this->accept_header;
        }
  }

  public function request($post = null, $get = null, $api_client_key = null) 
  {

    $request = $this->http->newRequest();
    $method = $this->getMethodHeader();
    $accept = $this->getAcceptHeader();
    $api_key = \Flight::get('api-public-key');
    if (empty($api_key)) { $api_key = $api_client_key; }

    if (empty($request)) {
          throw new \InvalidArgumentException("Request not constructed.");
        }

    if (empty($method)) {
      throw new \InvalidArgumentException("The method header is invalid.");
    }

    if (empty($accept)) {
      throw new \InvalidArgumentException("The accept header is invalid.");
    }

    if (empty($api_key)) {
    
      $response = $this->http->newResponse();
      $response->headers->set('Content-Type', 'application/json');
	  $response->setStatusCode(400);
      $this->http->send($response);
      exit;

    }
    $request->setUrl($this->target);
    
    switch ($method) {
    case 'METHOD_GET':
        $request->setMethod(\Aura\Http\Message\Request::METHOD_GET);
        break;
    case 'METHOD_POST':
        $request->setMethod(\Aura\Http\Message\Request::METHOD_POST);
        $request->setContent(json_encode($_POST));
        break;
    case 'METHOD_PUT':
        $request->setMethod(\Aura\Http\Message\Request::METHOD_PUT);
        $request->setContent(json_encode($_POST));
        break;
    case 'METHOD_DELETE':
        $request->setMethod(\Aura\Http\Message\Request::METHOD_DELETE);
        break;
     }
   

    $query = \Flight::get('api-phrase');
    $url = \Flight::get('url');
    $url .= '/admin/templates';

    // hash the query
    $query = \Skeletor\Methods\AppService::hashHMAC($query); 
    $user = \Flight::get('client-email');
    $request->setAuth(\Aura\Http\Message\Request::AUTH_BASIC);
    $request->setUsername($api_key);
    $request->setPassword($query);
    $request->headers->set('Accept', $accept);  
    $request->headers->set('Content-Type', 'application/json');
    $request->headers->set('From', $user);
    if ($post !== null) {
      $request->setContent(json_encode($post));
    }
    $stack = $this->http->send($request);
    if ($post !== null) {
      $status_code = $stack[0]->status_code;
      $status_code_type = substr($status_code, 0, 1);
      
    //  var_dump($stack[0]);
      $message = $stack[0]->content;
      switch ($status_code_type) {
          case 2:
              $response = $this->http->newResponse();
              $response->headers->set('Location', $url);
              $this->http->send($response);
              exit;
              break;
          case 3:
              break;
          case 4:
              $response = $this->http->newResponse();
              $response->headers->set('Content-Type', 'application/json');
              $response->setStatusCode($status_code);
              $this->http->send($response);
              exit;
              break;
      }    
    } else {
      return $stack[0]->content;
    }


 


    /*
    $repos = json_decode($stack[0]->content);
    foreach ($repos as $repo) {
        echo $repo->name . PHP_EOL;
    }
    */
  }
}