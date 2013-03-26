<?php
namespace Skeletor\Controllers\API;


class AccountController
{
   public function __construct()
    {

    }
       

  


    public static function find_by_id($id) {

      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Flight::etag('skeletor-admin-Account-' . $id);
      $mapper = new \Skeletor\Mappers\API\DbMapper('Accounts');
      $users = $mapper->findById($id);
      if (empty($users)) {
        Skeletor\Controllers\API\ResponseController::respond($select, 400);
      }
         foreach ($users as $n => $row) {
          $Account = new \Skeletor\Entities\API\Accounts();
          $setTitle = $Account->setTitle($row->title);
          $setId = $Account->setId($row->id);
          $Accounts[] = $Account;
        }
        $data = isset($Accounts) ? $Accounts : array();
        Print \Skeletor\Views\Client\AdminView::view_item('Account', $data);

    }

     
    public static function view_dashboard() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\AdminView::view_item('Account', $data);

    }

        public static function view_store() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\AdminView::view_item('Account', $data);

    }

        public static function view_cms() {

      \Skeletor\Controllers\API\ResponseController::authenticate();
     \Flight::etag('skeletor-admin-view-template');
     $data = array();
      Print \Skeletor\Views\Client\AdminView::view_item('Account', $data);

    }



    public static function update($id) {
      // set a read-once value on the segment
      \Skeletor\Controllers\API\ResponseController::authenticate();
      \Skeletor\Controllers\API\ResponseController::beginTransaction();

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $Account = new \Skeletor\Entities\API\Accounts();

      $Account->setTitle($title);

      $qb = $em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Accounts', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $em->persist($Account);

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
