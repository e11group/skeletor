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

  public function request($api_client_key = null) 
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
    if ($method = 'METHOD_GET') {
    	$request->setMethod(\Aura\Http\Message\Request::METHOD_GET);
      } elseif ($method = 'METHOD_POST') {
        $request->setMethod(\Aura\Http\Message\Request::METHOD_POST);
      }

      $query = \Flight::get('api-phrase');
    // hash the query
    $query = \Skeletor\Methods\AppService::hashHMAC($query); 

    $request->setAuth(\Aura\Http\Message\Request::AUTH_BASIC);
    $request->setUsername($api_key);
    $request->setPassword($query);

    $request->headers->set('Accept', $accept);  
    $request->headers->set('Content-Type', 'application/json');

    /*
    $request->setContent(json_encode([
        'key' => $api_key,
        'phrase' => $query
    ]));    
	*/

    $stack = $this->http->send($request);
    return $stack[0]->content;
    /*
    $repos = json_decode($stack[0]->content);
    foreach ($repos as $repo) {
        echo $repo->name . PHP_EOL;
    }
    */
  }
}