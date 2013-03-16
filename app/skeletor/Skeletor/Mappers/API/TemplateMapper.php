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


    protected function buildWork($work) {
    	$this->works[] = array($work);
    }

     protected function getWork() {

     	return $this->works;

     	/*
     	foreach ($this->works as $work) {
     		print $work;
     	}

     	*/
    }

   public function commit() {

      try {  
        $this->em->getConnection()->commit();
      } catch (Exception $e) {
        throw new Exception( 'Doctrine Commit Error', 0, $e);  
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
          $template = new \Skeletor\Models\API\TemplateModel();
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
    			$template = new \Skeletor\Models\API\TemplateModel();
          $setTitle = $template->setTitle($row->title);
          $setId = $template->setId($row->id);
          $templates[] = $template;

    		}
		return $templates;
    	
    }

    public function insert() {

      
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

      try  
      {  
        
        $p = $q->execute();  
        $persist = $this->em->persist($this->template);

      }  
      catch (Exception $e)  
      {    

        return false;

      } 

      return true; 

    }

    public function delete($id) {
        if ($id instanceof TemplateInterface) {
            $id = $id->id;
        }

        $this->adapter->delete($this->entityTable, "id = $id");
        return $this->commentMapper->delete("post_id = $id");
    }




}