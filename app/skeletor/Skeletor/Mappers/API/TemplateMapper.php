<?php
namespace Skeletor\Mappers\API;

class TemplateMapper implements \Skeletor\Interfaces\API\TemplateMapperInterface
{
    protected $template;
    protected $em;
    protected $qb;
    protected $works = array();

    public function __construct() {
    // TODO add these to dependency injection container
      $this->em = \Flight::get('em');
      $this->em->getConnection()->beginTransaction(); // suspend auto-commit
      $this->template = new \Skeletor\Entities\API\Templates();
    }

   public function commit() {

      try {  
        $this->em->getConnection()->commit();
      } catch (Exception $e) {
       $this->em->getConnection()->rollback();
       $this->em->close();
       throw $e;
      }


   }

    public function findById($id) {

      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u'))
         ->from('Skeletor\Entities\API\Templates', 'u')
         ->where($qb->expr()->orX(
             $qb->expr()->eq('u.id', $id)
         ));


    $query = $qb->getQuery();
    $query = $this->em->createQuery('SELECT u FROM Skeletor\Entities\API\Templates u WHERE u.id = '.$id);
    $users = $query->getResult();
    foreach ($users as $n => $row) {
          $template = new \Skeletor\Models\API\Templates();
          $setTitle = $template->setTitle($row->title);
          $setId = $template->setId($row->id);
          $templates[] = $template;

        }
    return $templates;
      
    	

    }

    public function findAll() {
      
      $qb = $this->em->createQueryBuilder();

      $qb->select('u')
       ->from('Skeletor\Entities\API\Templates', 'u')
       ->orderBy('u.id', 'ASC');


    $query = $qb->getQuery();
		$users = $query->getResult();
		foreach ($users as $n => $row) {
    			$template = new \Skeletor\Models\API\Templates();
          $setTitle = $template->setTitle($row->title);
          $setId = $template->setId($row->id);
          $templates[] = $template;

    		}
		return $templates;
    	
    }

    public function insert($body) {

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
          throw $e;
      }
    
      return $title; 
  

    }

    public function update($id, $body) {            

      $body = json_decode($body);

      foreach ($body as $obj) {
        $title = $obj->title;
      }

      $this->template->setTitle($title);

      $qb = $this->em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Templates', 'u')
              ->set('u.title', $qb->expr()->literal($title))
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  

      try {  
        $p = $q->execute();  
        $persist = $this->em->persist($this->template);
      } catch (Exception $e) {   
       $this->em->getConnection()->rollback();
       $this->em->close();
       throw $e;
      } 

      return true; 

    }

    public function delete($id) {

      $qb = $this->em->createQueryBuilder();
      $q = $qb->delete('Skeletor\Entities\API\Templates', 'u')
              ->where($qb->expr()->orX(
                $qb->expr()->eq('u.id', $id)
              ))
              ->getQuery();  
      try {  
        $p = $q->execute();  
        $persist = $this->em->persist($this->template);
      } catch (Exception $e) {   
       $this->em->getConnection()->rollback();
       $this->em->close();
       throw $e;
      } 

      return true; 
    }




}