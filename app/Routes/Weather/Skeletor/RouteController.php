<?php
namespace Skeletor;

class RouteController implements RouteControllerInterface
{
    protected $route = '';
    protected $headers  = '';
    
    public function __construct() {

    }
    
    protected function parseHeaders($key = null) {

        $headers = \Flight::request();

        if ($key == null) {
            $parsed_headers = $headers;
         } else {
              foreach ($headers as $n => $row) {
                 if($n == $key) { $parsed_headers = $row; }
            }
         }
         return $parsed_headers;

    }

    protected function parseRoutes() {
        // TODO separate this to its own class

        $route_metadata[] = array(

            'method' => '',
            'accept' => '',
            'name' => ''

            );

        return $route_metadata;
        
    }
    
    public function getRequestHeaders($key = null) {

         if ($key == null) {
            $headers = $this->parseHeaders();
         } else {
            $headers = $this->parseHeaders($key);
         }
        if (empty($headers)) {
            throw new \InvalidArgumentException(
                "The action controller '$controller' has not been defined.");
        }
         $headers = $this->parseHeaders();
         return $headers;


    }

    public function getRouteData() {

        $routes = $this->parseRoutes();
         return $routes;

    }
    
    
    public function run() {

        $headers = $this->getRequestHeaders();

        call_user_func_array(array(new $this->controller, $this->action), $this->params);

        $routes = $this->getRouteData();
        foreach ($routes as $n => $row) {
             Flight::route( $method . ' ' . $uri,  array('\Skeletor\Controllers' . $namespace, $action));
        }



    }
}