<?php
namespace Skeletor\Entities\API;

/** @Entity **/
class Templates
{
  /** @Id @GeneratedValue @Column(type="integer") **/
    protected $id;
    /** @Column(type="string") **/
    protected $title;
    /** @Column(type="datetime") **/
    protected $datetime;

    public function __construct()
    {
        $this->datetime = new \DateTime(); 
    }

    public function getTitle() {
        return $this->title;
    }


 public function setTitle($title) {
        if (!is_string($title)
            || strlen($title) < 2
            || strlen($title) > 100) {
            throw new \InvalidArgumentException("The post title is invalid.");
        }
 
        $this->_title = htmlspecialchars(trim($title), ENT_QUOTES);
        return $this;
    }
    
    public function getId() {

        return $this->id;

    }

// horrible hack i know

    public function __get($name)
    {
      if(property_exists($this, $name)){
        return $this->$name;
      }
    }

}