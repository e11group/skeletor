<?php
namespace Skeletor\Controllers\API;


class ShippingsController
{

    public function __construct()
    {

    }

     public static function find_settings($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Shipping-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Shippings');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Shipping = new \Skeletor\Entities\API\Shippings();
          $setTitle = $Shipping->setTitle($row->title);
          $setId = $Shipping->setId($row->id);
          $Shippings[] = $Shipping;
        }
        $data = isset($Shippings) ? $Shippings : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Shipping', $data);

    }


    public static function update_settings() {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Shipping = new \Skeletor\Entities\API\Shippings();

      $Shipping->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Shippings', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Shipping);

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

  


}

?>
