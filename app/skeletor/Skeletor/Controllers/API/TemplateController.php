<?php
namespace Skeletor\Controllers\API;


class TemplateController
{

    public function __construct()
    {

    }
       
    public static function find_all() {

    $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';

// make this into an authentication controller
// figure out if we need to challenge the user  

if(empty($_SERVER['PHP_AUTH_USER']) || (empty($_SERVER['PHP_AUTH_PW'])))  
{  
    


    // show the error if they hit cancel  

    // TODO add these request calls to di

    $response = $http->newResponse();
    $response->setStatusCode(401);
    $http->send($response);
   
    exit;
}

$client_key = $_SERVER['PHP_AUTH_USER'];
$client_phrase = $_SERVER['PHP_AUTH_PW'];

// TODO replace with di
$em = \Flight::get('em');

$query = $em->createQuery("SELECT u FROM Skeletor\Entities\Client\Clients u WHERE u.public_key = '$client_key'");
    $users = $query->getResult();

foreach($users as $row) {

  $private = $row->private_key;
}
if(!empty($private)) {

      $query = \Flight::get('api-phrase');

      $query = \Skeletor\Methods\AppService::hashHMAC($query, $private);

      if ($query == $client_phrase){

      } 

      else {
         $response = $http->newResponse();
         $response->setStatusCode(401);
         $http->send($response);
         exit;
      }


} else {

    $response = $http->newResponse();
         $response->setStatusCode(401);
         $http->send($response);
         exit;

}
      //caching
      \Flight::etag('skeletor-admin-view-template');

      // do business logic and load into model, fetch model
      // build transaction
      // TODO inject entity manager with dic
      $mapper = new \Skeletor\Mappers\API\TemplateMapper();
      $select = $mapper->findAll();


      // make this into a responsecontroller

$request_method = strtolower($_SERVER['REQUEST_METHOD']);
switch ($request_method)
    {
      // gets are easy...
      case 'get':
        $data = $_GET;
        break;
      // so are posts
      case 'post':
        $data = $_POST;
        break;

    }
foreach($data as $n => $d) {
  echo $n;
}





      $http_headers = \Flight::request();
    // $client_public_key = $http_headers->authorization;
     // $client_query = $http->getContent();
     // echo $client_query;
      //echo $client_public_key; 
      $isHtml = strpos($http_headers->accept, 'text/html');
      $isJson = strpos($http_headers->accept, 'application/json');
      if ($isHtml !== false) {
          // load our server side client
          Print \Skeletor\Views\API\TemplatesView::load_page('Template', $select);
      } elseif ($isJson !== false) {
          // json encode
          $templates = json_encode($select);
          // TODO replace this with aura response system
          \Flight::json(array($templates));
      }
    }


    public static function find_by_id($id) {

      //caching
      \Flight::etag('skeletor-admin-template-' . $id);
       // do business logic and load into model, fetch model
      // build transaction
      $em = \Flight::get('em');
      $mapper = new \Skeletor\Mappers\API\TemplateMapper($em);
      $select = $mapper->findById($id);

      // json encode
      $templates = json_encode($select);
      // send json
      // TODO replace this with aura response system
      \Flight::json(array($templates));
    }


    public static function create($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }


    public static function update($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }

        public static function delete($id) {

      //caching
      Flight::etag('skeletor-admin-edit-template');

      /* begin business logic

      */

      // grab view

      echo AdminEditView::load('Page', array());
   
    }


}

?>
