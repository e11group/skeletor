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

   public function flush() {

   }

    public function findById($id) {

      $qb = $this->em->createQueryBuilder();
      
      $qb->add('select', new \Doctrine\ORM\Query\Expr\Select(array('u')))
         ->add('from', new \Doctrine\ORM\Query\Expr\From('Skeletor\Entities\API\Templates', 'u'))
         ->add('where', $qb->expr()->orX(
           $qb->expr()->eq('u.id', $id)
         ))
         ->add('orderBy', new \Doctrine\ORM\Query\Expr\OrderBy('u.id', 'ASC'));

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

      $qb->add('select', new \Doctrine\ORM\Query\Expr\Select(array('u')))
         ->add('from', new \Doctrine\ORM\Query\Expr\From('Skeletor\Entities\API\Templates', 'u'))
         ->add('orderBy', new \Doctrine\ORM\Query\Expr\OrderBy('u.id', 'ASC'));

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

    public function update($id) {
      $qb = $this->em->createQueryBuilder();
      $q = $qb->update('Skeletor\Entities\API\Templates', 'u')
              ->set('u.username', $qb->expr()->literal($username))
              ->set('u.email', $qb->expr()->literal($email))
              ->where('u.id = ?1')
              ->setParameter(1, $editId)
              ->getQuery();
      $p = $q->execute();
    $query = "UPDATE  u SET u.password = 'new' WHERE u.id = ".$id;
    $users = $query->getResult();

      return false;

    }

    public function delete($id) {
        if ($id instanceof TemplateInterface) {
            $id = $id->id;
        }

        $this->adapter->delete($this->entityTable, "id = $id");
        return $this->commentMapper->delete("post_id = $id");
    }




}