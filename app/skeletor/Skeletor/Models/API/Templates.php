<?php
namespace Skeletor\Models\API;
use \Skeletor\Abstracts;

class Templates extends \Skeletor\Abstracts\AbstractEntity implements \Skeletor\Interfaces\API\TemplateInterface
{
    protected $id;
    public $title;
  

    public function __construct() {
       

    }
    
    public function setId($id) {
        if ($this->id !== null) {
            throw new \BadMethodCallException(
                "The ID for this post has been set already.");
        }
 
        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException("The post ID is invalid.");
        }
 
        $this->id = $id;
        return $this->id;
    }

    public function getId() {
        return $this->id;
    }
    
    public function setTitle($title) {
        if (!is_string($title)
            || strlen($title) < 2
            || strlen($title) > 100) {
            throw new \InvalidArgumentException("The post title is invalid.");
        }
 
        $this->title = htmlspecialchars(trim($title), ENT_QUOTES);
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }
    

}