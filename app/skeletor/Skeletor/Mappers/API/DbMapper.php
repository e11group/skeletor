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



    public function findByAssId($id, $ass) {

      $u_ass = 'u.' . $ass;

      $resource = $this->resource;
      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u'))
       ->from("Skeletor\Entities\API\\$resource", 'u')
         ->where($qb->expr()->orX(
             $qb->expr()->eq($u_ass, $id)
         ));

    $query = $qb->getQuery();
    $users = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    return $users;
      

    }


    public function findByAssIdWithJoin($id, $ass, $join) {

      $u_ass = 'u.' . $ass;
      $j = 'u.'.$join;


      $resource = $this->resource;
      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u', 'c'))
       ->from("Skeletor\Entities\API\\$resource", 'u')
        ->join($j, 'c')
         ->where($qb->expr()->orX(
             $qb->expr()->eq($u_ass, $id)
         ));

    $query = $qb->getQuery();
    $users = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    return $users;
      

    }


    public function findNewById($id, $new) {

      $resource = $this->resource;
      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u'))
       ->from("Skeletor\Entities\API\\$new", 'u')
         ->where($qb->expr()->orX(
             $qb->expr()->eq('u.customers', $id)
         ));

    $query = $qb->getQuery();
    $users = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    return $users;
      

    }


    public function findByIdWithJoin($id, $join) {


      $j = 'u.'.$join;
      $resource = $this->resource;
      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u', 'c'))
       ->from("Skeletor\Entities\API\\$resource", 'u')
       ->join($j, 'c')
         ->where($qb->expr()->orX(
             $qb->expr()->eq('u.id', $id)
         ));

    $query = $qb->getQuery();
    $users = $query->getResult(\Doctrine\ORM\Query::HYDRATE_OBJECT);
    return $users;
      

    }


    public function findByIdWithJoins($id, $join1, $join2) {


      $j = 'u.'.$join1;
      $j2 = 'u.'.$join2;
      $resource = $this->resource;
      $qb = $this->em->createQueryBuilder();
       $qb->select(array('u', 'c', 'd'))
       ->from("Skeletor\Entities\API\\$resource", 'u')
       ->join($j2, 'c')
       ->join($j, 'd')
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