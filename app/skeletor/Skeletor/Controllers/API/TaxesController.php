<?php
namespace Skeletor\Controllers\API;


class TaxesController
{

    public function __construct()
    {

    }

     public static function find_settings($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Tax-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Taxes');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Tax = new \Skeletor\Entities\API\Taxes();
          $setTitle = $Tax->setTitle($row->title);
          $setId = $Tax->setId($row->id);
          $Taxes[] = $Tax;
        }
        $data = isset($Taxes) ? $Taxes : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Tax', $data);

    }


    public static function update_settings() {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Tax = new \Skeletor\Entities\API\Taxes();

      $Tax->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Taxes', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Tax);

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
