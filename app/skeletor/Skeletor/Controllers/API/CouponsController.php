<?php
namespace Skeletor\Controllers\API;


class CouponsController
{

    public function __construct()
    {

    }
       

     public static function find_all() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      //caching
      \Flight::etag('skeletor-admin-view-Coupon');
      $mapper = new \Skeletor\Mappers\API\DbMapper('Coupons');
      $data = $mapper->findAll();

      if (empty($data)) {
        \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
        Print \Skeletor\Views\Client\AdminView::view_all('Coupon', $data);

    }

    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Coupon-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Coupons');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Coupon = new \Skeletor\Entities\API\Coupons();
          $setTitle = $Coupon->setTitle($row->title);
          $setId = $Coupon->setId($row->id);
          $Coupons[] = $Coupon;
        }
        $data = isset($Coupons) ? $Coupons : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Coupon', $data);

    }

     public static function find_settings($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Coupon-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Coupons');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Coupon = new \Skeletor\Entities\API\Coupons();
          $setTitle = $Coupon->setTitle($row->title);
          $setId = $Coupon->setId($row->id);
          $Coupons[] = $Coupon;
        }
        $data = isset($Coupons) ? $Coupons : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Coupon', $data);

    }


    public static function create() {
      
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();


      try {
          $body = json_decode($body);

          foreach ($body as $obj) {
            $title = $obj->title;
          }

          $entity = new \Skeletor\Entities\API\Coupons;    
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

      $Coupon = new \Skeletor\Entities\API\Coupons();

      $Coupon->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Coupons', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Coupon);

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

      $Coupon = new \Skeletor\Entities\API\Coupons();

      $Coupon->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Coupons', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Coupon);

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
       $mapper = new \Skeletor\Mappers\API\DbMapper('Coupons');
      if ($select = $mapper->delete($id)) {
          $mapper->commit();
          \Skeletor\Controllers\API\ResponseController::respond($select, 200);
       } else {
          \Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
   
    }


}

?>
