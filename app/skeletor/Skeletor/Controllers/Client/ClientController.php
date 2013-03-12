<?php
namespace Skeletor\Controllers\Client;
use Aura\Http\Message\Request;

//-------------------------------------------------------------------------------------------------------------

    /**
     *
     * The Admin All Page Controller
     *
     *
    */


class ClientController
{
       
    public static function find_all() {

      //caching
      \Flight::etag('skeletor-client-view-template');

       // sessions
      // TODO yea yea di that shit
 
  $session = new \mjohnson\resession\Resession(array(
    'security' => \mjohnson\resession\Resession::SECURITY_HIGH,
    'cookies' => false,
    'name' => 'Skeletor'
  ));


    // make this into a method
  
         $http = include VENDOR_DIR . 'aura/http/scripts/instance.php';

$request = $http->newRequest();


$request->setUrl('http://localhost/skeletor/public/api/templates');
$request->setMethod(\Aura\Http\Message\Request::METHOD_GET);
$request->headers->set('Accept', 'text/html');

$stack = $http->send($request);
Print $stack[0]->content;
/*
$repos = json_decode($stack[0]->content);
foreach ($repos as $repo) {
    echo $repo->name . PHP_EOL;
}
*/
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
