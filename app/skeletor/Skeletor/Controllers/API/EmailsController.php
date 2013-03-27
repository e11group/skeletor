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
      \Flight::etag('skeletor-admin-view-Email');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Email', $data);

    }

    public static function find_all_templates() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-Email');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Email', $data);

    }


    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Email-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Email = new \Skeletor\Entities\API\Emails();
          $setTitle = $Email->setTitle($row->title);
          $setId = $Email->setId($row->id);
          $Emails[] = $Email;
        }
        $data = isset($Emails) ? $Emails : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Email', $data);

    }

        public static function find_template_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Email-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Email = new \Skeletor\Entities\API\Emails();
          $setTitle = $Email->setTitle($row->title);
          $setId = $Email->setId($row->id);
          $Emails[] = $Email;
        }
        $data = isset($Emails) ? $Emails : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Email', $data);

    }

     public static function find_settings($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Email-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Email = new \Skeletor\Entities\API\Emails();
          $setTitle = $Email->setTitle($row->title);
          $setId = $Email->setId($row->id);
          $Emails[] = $Email;
        }
        $data = isset($Emails) ? $Emails : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Email', $data);

    }


    public static function create() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();


      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Emails;    
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

          $entity = new \Skeletor\Entities\API\Emails;    
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
      Print \Skeletor\Views\Client\AdminView::view_item('Email', $data);

    }


    public static function create_template_view() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\AdminView::view_item('Email', $data);

    }





    public static function update($id) {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Email = new \Skeletor\Entities\API\Emails();

      $Email->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Emails', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Email);

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

      $Email = new \Skeletor\Entities\API\Emails();

      $Email->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Emails', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Email);

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
  

    public static function update_settings() {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Email = new \Skeletor\Entities\API\Emails();

      $Email->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Emails', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Email);

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
       $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }


    public static function delete_template($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
       $mapper = new \Skeletor\Mappers\API\DbMapper('Emails');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }


}

?>
