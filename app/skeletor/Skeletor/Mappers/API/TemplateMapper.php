<?php
namespace Skeletor\Mappers\API;

class TemplateMapper implements \Skeletor\Interfaces\API\TemplateMapperInterface
{
    protected $template;
    protected $em;
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

    	$query = $this->em->createQuery('SELECT u FROM Skeletor\Entities\API\Templates u');
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

    public function update() {

    }

    public function delete($id) {
        if ($id instanceof TemplateInterface) {
            $id = $id->id;
        }

        $this->adapter->delete($this->entityTable, "id = $id");
        return $this->commentMapper->delete("post_id = $id");
    }




}