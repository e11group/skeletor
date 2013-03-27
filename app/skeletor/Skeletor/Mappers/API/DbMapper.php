<?php
namespace Skeletor\Mappers\API;

class DbMapper implements \Skeletor\Interfaces\API\TemplateMapperInterface
{
    protected $template;
    protected $em;
    protected $qb;
    protected $works = array();
    protected $resource;

    public function __construct($resource) {

      $this->resource = $resource;
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

      $resource = $this->resource;
      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u'))
       ->from("Skeletor\Entities\API\\$resource", 'u')
         ->where($qb->expr()->orX(
             $qb->expr()->eq('u.id', $id)
         ));

    $query = $qb->getQuery();
    $users = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    return $users;
      

    }

    public function findAll($order = 'ASC') {
      
      $qb = $this->em->createQueryBuilder();

      $resource = $this->resource;
      $qb->select('u')
       ->from("Skeletor\Entities\API\\$resource", 'u')
       ->orderBy('u.id', $order);

    $query = $qb->getQuery();
		$users = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
		return $users;
    }

    public function insert($body) {

     
  

    }

    public function update($id, $body) {            

   

    }

    public function delete($id) {
      $resource = $this->resource;

      $qb = $this->em->createQueryBuilder();
      $q = $qb->delete("Skeletor\Entities\API\\$resource", 'u')
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