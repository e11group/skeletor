<?php
namespace Skeletor\Models\API;
use \Skeletor\Abstracts;

class Customers extends \Skeletor\Abstracts\AbstractEntity
{
    protected $id;
    public $email;
  

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
    
    public function setEmail($email) {
        if (!is_string($email)
            || strlen($email) < 2
            || strlen($email) > 100) {
            throw new \InvalidArgumentException("The post email is invalid.");
        }
 
        $this->email = htmlspecialchars(trim($email), ENT_QUOTES);
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }
    

}