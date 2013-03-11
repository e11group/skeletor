<?php
namespace Skeletor\Mappers\API;

class TemplateMapper implements \Skeletor\Interfaces\API\TemplateMapperInterface
{
    protected $template;
    protected $em;
    protected $works = array();

    public function __construct($em) {
    // TODO add these to dependency injection container
      $this->em = $em;
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

    public function run() {

    	try {
    		$this->em->persist($this->template);
    		$data = $this->findAll();
    		foreach ($data as $n => $row) {
    			    $title = $row->title;
    		
    			$template = new \Skeletor\Models\API\TemplateModel($title, 'content');
    			$templates[] = $template;

    		}
    		//$this->em->flush();
            //$this->em->getConnection()->commit();
          
            return $templates;
    		} catch (Exception $e) {
      $this->em->getConnection()->rollback();
      $this->em->close();
      throw $e;
	}

    }

    public function findById($id) {

    	

    }

    public function findAll() {

    	$query = $this->em->createQuery('SELECT u FROM Skeletor\Entities\API\Templates u');
		$users = $query->getResult();

		return $users;
    	
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