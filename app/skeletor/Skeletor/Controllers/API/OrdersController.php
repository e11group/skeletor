<?php
namespace Skeletor\Controllers\API;


class OrdersController
{

    public function __construct()
    {

    }
       
    
     public static function find_all() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-Order');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Orders');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Order', $data);

    }

    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Order-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Orders');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Order = new \Skeletor\Entities\API\Orders();
          $setTitle = $Order->setTitle($row->title);
          $setId = $Order->setId($row->id);
          $Orders[] = $Order;
        }
        $data = isset($Orders) ? $Orders : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Order', $data);

    }

     public static function find_settings($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Order-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Orders');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Order = new \Skeletor\Entities\API\Orders();
          $setTitle = $Order->setTitle($row->title);
          $setId = $Order->setId($row->id);
          $Orders[] = $Order;
        }
        $data = isset($Orders) ? $Orders : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Order', $data);

    }


    public static function create() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();


      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Orders;    
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



    public static function update($id) {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Order = new \Skeletor\Entities\API\Orders();

      $Order->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Orders', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Order);

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

      $Order = new \Skeletor\Entities\API\Orders();

      $Order->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Orders', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Order);

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
       $mapper = new \Skeletor\Mappers\API\DbMapper('Orders');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }


}

?>
