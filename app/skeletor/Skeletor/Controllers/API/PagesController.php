<?php
namespace Skeletor\Controllers\API;


class PagesController
{
   public function __construct()
    {

    }
       

     public static function find_all() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-Page');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Page', $data);

    }

    public static function find_all_templates() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-Page');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Page', $data);

    }


    public static function find_all_blocks() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-Page');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Page', $data);

    }


    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Page-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Page = new \Skeletor\Entities\API\Pages();
          $setTitle = $Page->setTitle($row->title);
          $setId = $Page->setId($row->id);
          $Pages[] = $Page;
        }
        $data = isset($Pages) ? $Pages : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Page', $data);

    }

        public static function find_template_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Page-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Page = new \Skeletor\Entities\API\Pages();
          $setTitle = $Page->setTitle($row->title);
          $setId = $Page->setId($row->id);
          $Pages[] = $Page;
        }
        $data = isset($Pages) ? $Pages : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Page', $data);

    }

     public static function find_template_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Page-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Page = new \Skeletor\Entities\API\Pages();
          $setTitle = $Page->setTitle($row->title);
          $setId = $Page->setId($row->id);
          $Pages[] = $Page;
        }
        $data = isset($Pages) ? $Pages : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Page', $data);

    }


    public static function create() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();


      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Pages;    
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



    public static function create_template() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();


      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Pages;    
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




    public static function create_block() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();


      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Pages;    
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
      Print \Skeletor\Views\Client\AdminView::view_item('Page', $data);

    }


  public static function create_template_view() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\AdminView::view_item('Page', $data);

    }


  public static function create_block_view() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\AdminView::view_item('Page', $data);

    }


    public static function update($id) {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Page = new \Skeletor\Entities\API\Pages();

      $Page->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Pages', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Page);

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
 public static function update_template($id) {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Page = new \Skeletor\Entities\API\Pages();

      $Page->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Pages', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Page);

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
  

    public static function update_block() {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Page = new \Skeletor\Entities\API\Pages();

      $Page->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Pages', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Page);

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
       $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }


    public static function delete_template($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
       $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }



    public static function delete_block($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
       $mapper = new \Skeletor\Mappers\API\DbMapper('Pages');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }


}

?>
