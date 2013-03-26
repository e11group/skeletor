<?php
namespace Skeletor\Controllers\API;


class EmailsController
{

    public function __construct()
    {

    }
       
    public static function find_all() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-template');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Templates');
      $data = $mapper->findAll();

      if (empty($data)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }

      foreach ($data as $n => $row) {
          $template = new \Skeletor\Models\API\Customers();
          $setEmail = $template->setEmail($row->email);
          $setId = $template->setId($row->id);
          $templates[] = $template;
        }
        $data = isset($templates) ? $templates : array();
        Print \Skeletor\Views\Client\TemplatesView::view_all('Template', $data);

    }

    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-template-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Templates');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $template = new \Skeletor\Models\API\Templates();
          $setTitle = $template->setTitle($row->title);
          $setId = $template->setId($row->id);
          $templates[] = $template;
        }
        $data = isset($templates) ? $templates : array();
        Print \Skeletor\Views\Client\TemplatesView::view_item('Template', $data);

    }


    public static function create() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      $request = \Flight::request();
      $body = $request->body;
      $service = new \Skeletor\Services\Bootstrap;
      $em = $service->getEM();
      $em->getConnection()->beginTransaction();

      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Templates;    
          $entity->setTitle($title);
          $em->persist($entity);
          $em->flush();
          $em->clear();
          $em->getConnection()->commit();

      } catch (Exception $e) {
          $em->getConnection()->rollback();
          $em->close();
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
         // throw $e;
      }
    
        \Skeletor\Controllers\API\ResponseController::respond(array(), 200);
     
      
    }


    public static function create_view() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\TemplatesView::view_item('Template', $data);

    }



    public static function edit($id) {

    

// set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      $request = \Flight::request();
      $body = $request->body;
      $body = json_decode($body);
       $em = \Flight::get('em');
      $em->getConnection()->beginTransaction(); // suspend auto-commit
   

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $template = new \Skeletor\Entities\API\Templates();

      $template->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Templates', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($template);

      } catch (Exception $e) {   
       $em->getConnection()->rollback();
       $em->close();
          \Skeletor\Controllers\API\ResponseController::respond(true, 400);
      } 

       try {  
        $em->getConnection()->commit();
      } catch (Exception $e) {
       $em->getConnection()->rollback();
       $em->close();
          \Skeletor\Controllers\API\ResponseController::respond(true, 400);
      }

          // grab view    
          \Skeletor\Controllers\API\ResponseController::respond(true, 200);
      
    }

  

    public static function delete($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
       $mapper = new \Skeletor\Mappers\API\DbMapper('Templates');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }

}

?>
